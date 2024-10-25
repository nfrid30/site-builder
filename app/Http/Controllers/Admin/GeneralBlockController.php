<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\CommonHasBlockRequest;
use App\Http\Services\Block\BlockService;
use App\Models\Block;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GeneralBlockController extends Controller
{
    public function __construct(protected BlockService $blockService)
    {
    }

    public function index(): View
    {

        $blocks = Block::query()
            ->where('is_general', true)
            ->get();

        return view('admin.general-blocks.index', compact('blocks'));
    }

    public function update(CommonHasBlockRequest $request): RedirectResponse
    {
        $this->blockService->update($request);

        return to_route('admin.general-blocks.index');

    }
}
