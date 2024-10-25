<?php

namespace App\Http\Services\Block;

use App\Models\Block;

interface BlockFieldsStrategyInterface
{
    public function blockProcess(Block $block, array $option): Block;
}
