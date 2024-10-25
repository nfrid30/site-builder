<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\StoreTemplateRequest;
use App\Http\Services\TemplateService;
use App\Models\Block;
use App\Models\Template;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralTemplateController extends Controller
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
            ->where('is_general', true)
            ->get();


        return view('admin.general-templates.index', compact('templates'));
    }

    public function create(): View
    {
        return view('admin.general-templates.create');
    }
    public function store(StoreTemplateRequest $request): RedirectResponse
    {
        $properties = $request->validated();
        $properties['is_general'] = true;
        $image = $request->file('cover');

        $template = $this->service->create($properties, $image);
        $template->blocks()->create([
            'is_general' => true,
            'blockable_type' => Template::class,
            'blockable_id' => $template->getKey(),
        ]);


        return to_route('admin.templates.edit', compact('template'));
    }
}
