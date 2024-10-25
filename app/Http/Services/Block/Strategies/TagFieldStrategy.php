<?php

namespace App\Http\Services\Block\Strategies;

use App\Http\Services\Block\BlockFieldsStrategyInterface;
use App\Models\Block;
use App\Models\Page;

class TagFieldStrategy implements BlockFieldsStrategyInterface
{

    public function blockProcess(Block $block, array $option): Block
    {
        $tagId = $block->fields[$option['name']];
        $block->pages = Page::query()
            ->whereHas('tags', function ($query) use ($tagId) {
                $query->where('tags.id', $tagId);
            })->get();

        return $block;
    }
}
