<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService) {}

    public function index()
    {
        $orders = $this->orderService->getForAdmin();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $order)
    {
        $orderData = $this->orderService->findForAdmin($order);

        return view('admin.orders.show', ['order' => $orderData]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::enum(OrderStatus::class)],
        ]);

        $this->orderService->updateStatus($order, OrderStatus::from($validated['status']));

        return back()->with('success', 'Order status updated successfully.');
    }
}
