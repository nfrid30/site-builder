<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\StoreTemplateRequest;
use App\Http\Requests\Template\UpdateTemplateRequest;
use App\Http\Services\TemplateService;
use App\Models\Block;
use App\Models\Template;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function __construct(
        protected TemplateService  $service
    )
    {
    }

    public function index(): View
    {
        $templates = Template::query()
            ->whereNull('template_id')
            ->where('is_general', false)
            ->get();

        $types = [];
        foreach ($templates as $template) {
            $types[$template->type->name][] = $template;
        }

        return view('admin.templates.index', compact('types'));
    }



    public function create(): View
    {
        return view('admin.templates.create');
    }



    public function store(StoreTemplateRequest $request): RedirectResponse
    {
        $properties = $request->validated();
        $image = $request->file('cover');

        $template = $this->service->create($properties, $image);

        return to_route('admin.templates.edit', compact('template'));
    }

    public function edit(Template $template): View
    {
        $template->load('template');
        return view('admin.templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemplateRequest $request, Template $template): RedirectResponse
    {


        DB::beginTransaction();
        try {

            $template->update([
                'name' => $request->name,
                'slug' => $request->slug
            ]);

            foreach ($request->templates ?? [] as $oneTemplate) {
                Template::query()
                    ->where('id', $oneTemplate['id'])
                    ->update(['options' => $oneTemplate['options'] ?? []]);
            }
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();

        return to_route('admin.templates.edit', compact('template'));
    }


    public function destroy(Template $template): RedirectResponse
    {
        $template->delete();
        Storage::delete($template->cover);

        if($template->is_general) {
            Block::query()
                ->where('is_general', true)
                ->where('template_id', $template->getKey())
                ->delete();

            return to_route('admin.templates.general');
        }
        return to_route('admin.templates.index');
    }

    public function addLevel(Template $template): RedirectResponse
    {
        Template::query()->create([
            'name' => $template->name,
            'slug' => 'sub-' . $template->slug,
            'cover' => 'cover',
            'template_id' => $template->getKey()
        ]);

        return to_route('admin.templates.edit', compact('template'));
    }
}
