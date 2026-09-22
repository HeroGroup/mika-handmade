<?php

namespace App\Services;

use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Models\Payment;

class PaymentService
{
    public function process(
        int $orderId,
        string $amount,
        PaymentMethod $method = PaymentMethod::Manual
    ): Payment
    {
        $payment = Payment::create([
            'order_id' => $orderId,
            'amount' => $amount,
            'method' => $method,
            'status' => PaymentStatus::Succeeded,
            'transaction_id' => null,
            'payload' => null,
            'paid_at' => now(),
        ]);

        return $payment;
    }
}