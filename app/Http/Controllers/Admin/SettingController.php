<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TemplateTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Http\Services\Block\BlockService;
use App\Models\Setting;
use App\Models\Template;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class SettingController extends Controller
{
    public function __construct( protected BlockService $blockService)
    {
    }

    public function index(): View
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function create(): View
    {
        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request): RedirectResponse
    {
        $setting = Setting::query()
            ->create($request->validated());
        return to_route('admin.settings.edit', compact('setting'));
    }

    public function edit(Setting $setting): View
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->validated());

        $this->blockService->update($request);

        return to_route('admin.settings.edit', compact('setting'));
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        $setting->delete();
        return to_route('admin.settings.index');
    }

    public function addBlock(Setting $setting): View
    {
        $templates = Template::query()
            ->whereNull('template_id')
            ->where('type', TemplateTypeEnum::SETTING->value)
            ->get();
        return view('admin.settings.add-block', compact('setting', 'templates'));
    }

    public function storeBlock(Setting $setting, Template $template): RedirectResponse
    {
        $setting->blocks()->create([
            'template_id' => $template->getKey(),
        ]);

        return to_route('admin.settings.edit', compact('setting'));
    }
}
