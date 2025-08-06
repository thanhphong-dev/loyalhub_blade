<?php

namespace App\Enums;

enum CustomerStatus: int
{
    case NEW        = 0;
    case CONTACTED  = 1;
    case INTERESTED = 2;
    case BOOKED     = 3;
    case SERVICED   = 4;
    case CLOSED     = 5;

    public function lable()
    {
        return match ($this) {
            self::NEW        => 'Khách hàng mới',
            self::CONTACTED  => 'Đã liên hệ',
            self::INTERESTED => 'Quan tâm dịch vụ',
            self::BOOKED     => 'Đã lên lịch hẹn',
            self::SERVICED   => 'Đã sử dụng dịch vụ',
            self::CLOSED     => 'Đã đóng',
        };
    }

    public function colorClass()
    {
        return match ($this) {
            self::NEW        => 'bg-secondary',
            self::CONTACTED  => 'bg-info',
            self::INTERESTED => 'bg-primary',
            self::BOOKED     => 'bg-warning',
            self::SERVICED   => 'bg-success',
            self::CLOSED     => 'bg-danger',
            default          => 'bg-light',
        };
    }

    public static function groupNew()
    {
        return [
            self::NEW,
            self::CONTACTED,
        ];
    }

    public static function groupContacted()
    {
        return [
            self::CONTACTED,
            self::INTERESTED,
            self::BOOKED,
        ];
    }

    public static function groupBooked(){
        return [
            self::BOOKED,
        ];
    }

}
