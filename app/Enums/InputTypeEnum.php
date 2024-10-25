<?php

namespace App\Enums;

enum InputTypeEnum: string
{
    case INPUT = 'input';
    case TEXTAREA = 'textarea';
    case BUTTON = 'button';
    case IMAGE = 'image';
    case TAG = 'tag';

    public function name(): string
    {
        return str($this->value)->ucfirst()->toString();

    }

}
