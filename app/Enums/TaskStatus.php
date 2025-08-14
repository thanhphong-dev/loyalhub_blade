<?php

namespace App\Enums;

enum TaskStatus: int
{
    case PENDING     = 0;
    case IN_PROGRESS = 1;
    case COMPLETED   = 2;
    case OVERDUE     = 3;

    public function lable()
    {
        return match ($this) {
            self::PENDING     => 'Chưa xử lý',
            self::IN_PROGRESS => 'Đang tiến hành',
            self::COMPLETED   => 'Đã hoàn thành',
            self::OVERDUE     => 'Đã quá hạn',
        };
    }

    public function colorClass(): string
    {
        return match ($this) {
            self::PENDING     => 'bg-primary',
            self::IN_PROGRESS => 'bg-warning',
            self::COMPLETED   => 'bg-success',
            self::OVERDUE     => 'bg-danger',
        };
    }

    public static function groupPending(): array
    {
        return [
            self::PENDING,
        ];
    }
}
