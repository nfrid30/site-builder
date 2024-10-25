<?php

namespace App\Http\Services\Block\Strategies;

use App\Http\Services\Block\BlockFieldsStrategyInterface;
use App\Models\Block;
use App\Models\Page;

class ButtonFieldStrategy implements BlockFieldsStrategyInterface
{

    public function blockProcess(Block $block, array $option): Block
    {
        $fields = $block->fields;
        $fields[$option['name']]['link'] = Page::query()
            ->where('id', $fields[$option['name']]['link'])
            ->value('path');
        $block->fields = $fields;
        return $block;
    }
}
