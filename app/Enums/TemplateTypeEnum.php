<?php

namespace App\Enums;

enum TemplateTypeEnum: int
{
    case PAGE = 1;
    case MENU = 2;
    case SETTING = 3;

    public function name(): string
    {
        return str($this->name)->lower()->ucfirst()->toString();

    }
}
