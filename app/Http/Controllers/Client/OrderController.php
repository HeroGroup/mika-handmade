<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Request $request, OrderService $orderService, int $order)
    {
        $orderData = $orderService->findForUser($request->user(), $order);

        return view('client.order-summary', ['order' => $orderData]);
    }
}
