<?php

namespace App\Enums;

enum CustomerStatusPayment: int
{
    case PROCESSING        = 0;
    case FIRST_PAYMENT     = 1;
    case SECOND_PAYMENT    = 2;
    case THREE_PAYMENT     = 3;
    case COMPLETED_PAYMENT = 4;
    case OVERDUE           = 5;

    public function lable(): string
    {
        return match ($this) {
            self::PROCESSING        => 'Đang xử lý',
            self::FIRST_PAYMENT     => 'Thanh toán lần 1',
            self::SECOND_PAYMENT    => 'Thanh toán lần 2',
            self::THREE_PAYMENT     => 'Thanh toán lần 3',
            self::COMPLETED_PAYMENT => 'Thanh toán hoàn thành',
            self::OVERDUE           => 'Đã quá hạn',
        };
    }

    public function colorClass(): string
    {
        return match ($this) {
            self::PROCESSING        => 'bg-primary',
            self::FIRST_PAYMENT     => 'bg-info',
            self::SECOND_PAYMENT    => 'bg-warning',
            self::THREE_PAYMENT     => 'bg-secondary',
            self::COMPLETED_PAYMENT => 'bg-success',
            self::OVERDUE           => 'bg-danger',
        };
    }

    public static function groupProcessing()
    {
        return [
            self::PROCESSING,
        ];
    }
}
