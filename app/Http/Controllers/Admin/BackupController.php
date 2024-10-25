<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backup\StoreBackupRequest;
use App\Http\Requests\Backup\StoreFromFileBackupRequest;
use App\Http\Requests\Backup\UpdateBackupRequest;
use App\Http\Services\BackupService;
use App\Models\Backup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Spatie\DbDumper\Databases\MySql;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use ZipArchive;

class BackupController extends Controller
{

    public function __construct(
        protected BackupService $service
    ) {
    }
    public const TABLES = ['blocks', 'taggables', 'pages', 'menus', 'settings', 'tags', 'templates'];

    public function index(): View
    {
        $backups = Backup::query()
            ->latest()
            ->get();

        return view('admin.backups.index', compact('backups'));
    }

    public function create(): View
    {
        return view('admin.backups.create');
    }

    public function store(StoreBackupRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return to_route('admin.backups.index');
    }


    public function edit(Backup $backup): View
    {
        return view('admin.backups.edit', compact('backup'));
    }

    public function update(UpdateBackupRequest $request, Backup $backup): RedirectResponse
    {
        $backup->update($request->validated());
        return to_route('admin.backups.index');
    }


    public function destroy(Backup $backup): RedirectResponse
    {
        $backup->delete();

        File::deleteDirectory(storage_path('backups/' . $backup->getKey()));

        return to_route('admin.backups.index');
    }

    public function restore(Backup $backup)
    {
        if (!file_exists(storage_path('backups/' . $backup->getKey() . '/sql/dump.sql'))) {
            return to_route('admin.backups.index');
        }

        if (!File::exists(storage_path('backups/' . $backup->getKey() . '/storage'))) {
            return to_route('admin.backups.index');
        }

        try {
            File::copyDirectory(
                storage_path('backups/' . $backup->getKey() . '/storage'),
                public_path('storage')
            );

            foreach (self::TABLES as $table) {
                Schema::dropIfExists($table);
            }

            DB::unprepared(file_get_contents(storage_path('backups/' . $backup->getKey() . '/sql/dump.sql')));
        } catch (\Exception $e) {

        }

        return to_route('admin.backups.index');
    }

    public function download(Backup $backup): BinaryFileResponse
    {
        try {
            $zip_file = 'backup-' . $backup->created_at?->format('Y-m-d') . '.zip';
            $zip = new ZipArchive();
            $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

            $path = storage_path('backups/' . $backup->getKey());
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($path) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
        } catch (\Exception $e) {

        }
        return response()->download($zip_file);
    }

    public function createFromFile(): View
    {
        return view('admin.backups.create-from-file');
    }

    public function storeFromFile(StoreFromFileBackupRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $backup = Backup::query()->create($request->validated() + ['from_file' => true]);

            if ($file = $request->file('archive')) {
                $zip = new ZipArchive;

                if ($zip->open($file->path()) === TRUE) {
                    $zip->extractTo(storage_path('backups/' . $backup->getKey()));
                    $zip->close();
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();

        return to_route('admin.backups.index');
    }
}
