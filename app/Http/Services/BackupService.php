<?php

namespace App\Http\Services;

use App\Http\Controllers\Admin\BackupController;
use App\Models\Backup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\DbDumper\Databases\MySql;

class BackupService
{
    public function create(array $data)
    {
//        try {
        DB::beginTransaction();
        $backup = Backup::query()
            ->create($data);

        if(!File::exists(public_path('sql'))) {
            File::makeDirectory(public_path('sql'), 0755, true);
        }

        MySql::create()
            ->setHost('db')
            ->setDbName('site-builder')
            ->setUserName('root')
            ->setPassword('site-builder')
            ->includeTables(BackupController::TABLES)
            ->dumpToFile('sql/dump.sql');

        File::copyDirectory(
            public_path('sql'),
            storage_path('backups/' . $backup->getKey() . '/sql')
        );

        File::deleteDirectory(public_path('sql'));

        File::copyDirectory(
            public_path('storage'),
            storage_path('backups/' . $backup->getKey() . '/storage'));
//        } catch (\Exception $e) {
//            Log::info($e->getMessage());
//            DB::rollBack();
//        }

        DB::commit();
    }
}
