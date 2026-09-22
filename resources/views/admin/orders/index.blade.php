@extends('layouts.admin.dashboard', ['pageTitle' => 'Orders'])
@section('content')
  <div class="mb-4" style="display: flex; justify-content: space-between;">
    <div></div>
    @include('layouts.admin.partials.toast')
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Orders</h4>

          <p class="card-description">
            <b>{{ $orders->total() }}</b> total orders
          </p>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Client</th>
                  <th>Total Price ({{ env('CURRENCY') }})</th>
                  <th>Date Added</th>
                  <th>Status</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($orders as $order)
                  <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                      <span @class([
                        'text-muted' => $order->status === \App\Enums\OrderStatus::Pending,
                        'text-warning' => $order->status === \App\Enums\OrderStatus::Processing,
                        'text-primary' => $order->status === \App\Enums\OrderStatus::Accepted,
                        'text-success' => $order->status === \App\Enums\OrderStatus::Delivered,
                        'text-danger' => $order->status === \App\Enums\OrderStatus::Canceled,
                      ])>
                        {{ ucfirst($order->status?->value ?? '') }}
                      </span>
                    </td>
                    <td>
                      <span @class([
                        'text-muted' => $order->payment_status === \App\Enums\OrderPaymentStatus::Pending,
                        'text-success' => $order->payment_status === \App\Enums\OrderPaymentStatus::Paid,
                      ])>
                        {{ ucfirst($order->payment_status?->value ?? '') }}
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('admin.orders.show', $order) }}" title="View order">
                        <i class="mdi mdi-eye"></i>
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center">No orders found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{ $orders->links() }}
@endsection
