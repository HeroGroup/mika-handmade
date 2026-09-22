<?php

namespace App\Enums;

enum OrderPaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
}