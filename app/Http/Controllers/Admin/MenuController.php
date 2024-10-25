<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TemplateTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Http\Services\Block\BlockService;
use App\Models\Menu;
use App\Models\Template;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MenuController extends Controller
{
    public function __construct( protected BlockService $blockService)
    {
    }

    public function index(): View
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create(): View
    {
        return view('admin.menus.create');
    }

    public function store(StoreMenuRequest $request): RedirectResponse
    {
        $menu = Menu::query()->create($request->validated());
        return to_route('admin.menus.edit', compact('menu'));
    }

    public function edit(Menu $menu): View
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu): RedirectResponse
    {
        $menu->update($request->validated());

        $this->blockService->update($request);

        return to_route('admin.menus.edit', compact('menu'));
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return to_route('admin.menus.index');
    }

    public function addBlock(Menu $menu): View
    {
        $templates = Template::query()
            ->whereNull('template_id')
            ->where('type', TemplateTypeEnum::MENU->value)
            ->get();
        return view('admin.menus.add-block', compact('menu', 'templates'));
    }

    public function storeBlock(Menu $menu, Template $template): RedirectResponse
    {
        $menu->blocks()->create([
            'template_id' => $template->getKey(),
        ]);

        return to_route('admin.menus.edit', compact('menu'));
    }
}
