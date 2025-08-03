<?php

namespace App\Enums;

enum CustomerSource: int
{
    case WEBSITE  = 0;
    case ZALO     = 1;
    case FACEBOOK = 2;
    case DATA     = 3;
    case TIKTOK   = 4;
    case SHOPPE   = 5;

    public function lable()
    {
        return match ($this) {
            self::WEBSITE  => 'Website',
            self::ZALO     => 'Zalo',
            self::FACEBOOK => 'Facebook',
            self::DATA     => 'Data Công Ty',
            self::TIKTOK   => 'Tiktok',
            self::SHOPPE   => 'Shoppe',
        };
    }

    public function colorClass()
    {
        return match ($this) {
            self::WEBSITE  => 'bg-primary',
            self::ZALO     => 'bg-info',
            self::FACEBOOK => 'bg-indigo',
            self::DATA     => 'bg-secondary',
            self::TIKTOK   => 'bg-dark',
            self::SHOPPE   => 'bg-warning',
            default        => 'bg-light',
        };
    }
}
