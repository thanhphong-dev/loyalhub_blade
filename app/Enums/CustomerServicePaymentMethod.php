<?php

namespace App\Enums;

enum CustomerServicePaymentMethod: int
{
    case BRANK_PAYMENT = 0;
    case PAYMENT_CASH  = 1;
    case SWIPE_CARD    = 2;

    public function lable(): string
    {
        return match ($this) {
            self::BRANK_PAYMENT => 'Chuyển khoản',
            self::PAYMENT_CASH  => 'Tiền mặt',
            self::SWIPE_CARD    => 'Quẹt thẻ',
        };
    }

    public function colorClass(): string
    {
        return match ($this) {
            self::BRANK_PAYMENT => 'bg-primary',
            self::PAYMENT_CASH  => 'bg-danger',
            self::SWIPE_CARD    => 'bg-warning'
        };
    }
}
