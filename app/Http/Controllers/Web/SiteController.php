<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Block\BlockService;
use App\Http\Services\MenuService;
use App\Http\Services\PageService;
use App\Http\Services\SettingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(
        protected SettingService $settingService,
        protected BlockService $blockService,
        protected MenuService $menuService,
        protected PageService $pageService,
    ) {
    }


    public function index(Request $request): View
    {
//        $slug = '/' . $request->slug;
//        if(is_null($request->slug)) {
//            $slug = '/';
//        }

        $page = $this->pageService->getByUri($request->getRequestUri());


//        $blocks = $this->blockService->processFields($page->showBlocks);

        $menus = $this->menuService->getParsed();
        $settings = $this->settingService->getParsed();
        return view('web.index', compact('page', 'menus', 'settings'));
    }
}
