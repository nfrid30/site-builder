<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TemplateTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Http\Services\Block\BlockService;
use App\Models\Block;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class PageController extends Controller
{
    public function __construct(protected BlockService $blockService)
    {
    }

    public function index(): View
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create(): View
    {
        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        $page = Page::query()->create($request->validated());
        return to_route('admin.pages.index');
    }

    public function edit(Page $page): View
    {
        $page->load(['tags', 'blocks.template.template','blocks.blocks.template' ,'blocks.template.generalBlock']);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        $properties = $request->validated();

        if($image = $request->file('meta_image')) {
            $filename = $image->getClientOriginalName();
            $path = 'pages';
            Storage::putFileAs($path, $image, $filename);
            $properties['meta_image'] = $path . '/' . $filename;
        }

        $page->update($properties);
        $page->tags()->sync($request->tags);

        $this->blockService->update($request);

        return to_route('admin.pages.edit', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();
        return to_route('admin.pages.index');
    }

    public function addBlock(Page $page): View
    {
        $templates = Template::query()
            ->whereNull('template_id')
            ->where('type', TemplateTypeEnum::PAGE->value)
            ->get();
        return view('admin.pages.add-block', compact('page', 'templates'));
    }

    public function storeBlock(Page $page, Template $template): RedirectResponse
    {
        $blocksCount = Block::query()
            ->where('blockable_id', $page->id)
            ->where('blockable_type', Page::class)
            ->orderBy('sort', 'desc')
            ->value('sort');

        $page->blocks()->create([
            'template_id' => $template->getKey(),
            'sort' => ++$blocksCount,
        ]);

        return to_route('admin.pages.edit', compact('page'));
    }
}
