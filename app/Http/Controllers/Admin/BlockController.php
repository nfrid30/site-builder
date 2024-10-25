<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Block\AddSubBlocksRequest;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\Block;
use Illuminate\Http\RedirectResponse;

class BlockController extends Controller
{
    public function addSubBlocks(Block $block, AddSubBlocksRequest $request): RedirectResponse
    {
        $blocks = [];

        for ($i = 0; $i < $request->number; $i++) {
            $blocks[] = [
                'blockable_type' => Block::class,
                'blockable_id' => $block->getKey(),
                'template_id' => $block->template->template->getKey()
            ];
        }

        Block::query()->insert($blocks);

        return back();

    }


    public function destroy(Block $block): RedirectResponse
    {
        $block->delete();
        return back();
    }
}
