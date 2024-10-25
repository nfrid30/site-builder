<?php

namespace App\Http\Services\Block\Strategies;

use App\Http\Services\Block\BlockFieldsStrategyInterface;
use App\Models\Block;

class ImageFieldStrategy implements BlockFieldsStrategyInterface
{

    public function blockProcess(Block $block, array $option): Block
    {
        $fields = $block->fields;
        $fields[$option['name']] = asset('storage/' . $fields[$option['name']]);
        $block->fields = $fields;
        return $block;
    }
}
