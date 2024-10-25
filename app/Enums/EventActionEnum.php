<?php

namespace App\Enums;

enum EventActionEnum:int
{
    case CREATE = 1;
    case UPDATE = 2;
    case DELETE = 3;

    public function color(): string
    {
        return match ($this) {
            self::CREATE => 'green',
            self::UPDATE => 'yellow',
            self::DELETE => 'red',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::CREATE => 'fa-plus',
            self::UPDATE => 'fa-save',
            self::DELETE => 'fa-trash',
        };

    }
}
