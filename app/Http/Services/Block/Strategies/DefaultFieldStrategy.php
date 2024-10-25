<?php

namespace App\Http\Services\Block\Strategies;

use App\Http\Services\Block\BlockFieldsStrategyInterface;
use App\Models\Block;

class DefaultFieldStrategy implements BlockFieldsStrategyInterface
{

    public function blockProcess(Block $block, array $option): Block
    {
        return $block;
    }
}
