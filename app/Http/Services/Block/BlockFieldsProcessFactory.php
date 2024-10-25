<?php

namespace App\Http\Services\Block;

use App\Enums\InputTypeEnum;
use App\Http\Services\Block\Strategies\ButtonFieldStrategy;
use App\Http\Services\Block\Strategies\DefaultFieldStrategy;
use App\Http\Services\Block\Strategies\ImageFieldStrategy;
use App\Http\Services\Block\Strategies\TagFieldStrategy;

class BlockFieldsProcessFactory
{
    public  static  function getStrategy(InputTypeEnum $type) {
        return match($type) {
            InputTypeEnum::IMAGE => resolve(ImageFieldStrategy::class),
            InputTypeEnum::BUTTON => resolve(ButtonFieldStrategy::class),
            InputTypeEnum::TAG => resolve(TagFieldStrategy::class),
            default => resolve(DefaultFieldStrategy::class)
        };
    }

}
