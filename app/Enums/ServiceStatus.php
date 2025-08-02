<?php

namespace App\Enums;

enum ServiceStatus: int
{
    case ACTIVE   = 0;
    case INACTIVE = 1;

    public function lable()
    {
        return match ($this) {
            self::ACTIVE   => 'Hoạt động',
            self::INACTIVE => 'Không hoạt động',
        };
    }

    public function colorClass()
    {
        return match ($this) {
            self::ACTIVE   => 'bg-success',
            self::INACTIVE => 'bg-danger',
        };
    }
}
