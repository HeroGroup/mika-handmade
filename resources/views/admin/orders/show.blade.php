@extends('layouts.admin.dashboard', ['pageTitle' => 'Order #' . $order->id])
@section('content')
  @php
    $orderStatuses = \App\Enums\OrderStatus::cases();
    $address = $order->shipping_address_snapshot ?? [];
    $payment = $order->payment->first();
    $subtotal = $order->items->sum(fn ($item) => (float) $item->subtotal);
  @endphp

  <div class="mb-4" style="display: flex; justify-content: space-between;">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-light">
      <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back to orders
    </a>
    @include('layouts.admin.partials.toast')
  </div>

  <div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Order #{{ $order->id }}</h4>
            <form id="order-status-form" method="POST" action="{{ route('admin.orders.updateStatus', $order) }}">
              @csrf
              @method('PUT')
              <label for="order-status" class="visually-hidden">Order status</label>
              <select id="order-status" name="status" class="form-select" data-current-status="{{ $order->status?->value }}">
                @foreach ($orderStatuses as $status)
                  <option value="{{ $status->value }}" @selected($order->status === $status)>
                    {{ ucfirst($status->value) }}
                  </option>
                @endforeach
              </select>
            </form>
          </div>

          <p class="card-description">Added {{ $order->created_at?->format('d M, Y H:i') }}</p>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Name / Variant</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($order->items as $item)
                  <tr>
                    <td>
                      @if ($item->product?->image_url)
                        <img src="{{ $item->product->image_url }}" alt="{{ $item->title }}" style="width: 60px; height: 60px; object-fit: cover;">
                      @else
                        <span class="text-muted">No image</span>
                      @endif
                    </td>
                    <td>
                      <div>{{ $item->title }}</div>
                      @if ($item->productAttribute?->attributeValue)
                        <small class="text-muted">
                          {{ $item->productAttribute->attributeValue->attribute?->title ?? 'Option' }}:
                          {{ $item->productAttribute->attributeValue->value }}
                        </small>
                      @endif
                      @if ($item->product?->images?->isNotEmpty())
                        <div class="mt-2">
                          @foreach ($item->product->images as $image)
                            <img src="{{ $image->image_url }}" alt="{{ $item->title }}" style="width: 32px; height: 32px; object-fit: cover; margin-right: 4px;">
                          @endforeach
                        </div>
                      @endif
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format((float) $item->unit_price, 2) }} {{ env('CURRENCY') }}</td>
                    <td>{{ number_format((float) $item->subtotal, 2) }} {{ env('CURRENCY') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">No items found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="row justify-content-end mt-4">
            <div class="col-md-5">
              <div class="d-flex justify-content-between">
                <span>Subtotal</span>
                <strong>{{ number_format($subtotal, 2) }} {{ env('CURRENCY') }}</strong>
              </div>
              <div class="d-flex justify-content-between">
                <span>Discount</span>
                <strong>{{ number_format((float) $order->discount_amount, 2) }} {{ env('CURRENCY') }}</strong>
              </div>
              <hr>
              <div class="d-flex justify-content-between">
                <strong>Total</strong>
                <strong>{{ number_format((float) $order->total_amount, 2) }} {{ env('CURRENCY') }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Client details</h4>
          <h5>{{ $order->user?->name }}</h5>
          <p class="mb-1"><strong>Email:</strong> {{ $order->user?->email }}</p>
          <p><strong>Phone:</strong> {{ $order->user?->phone ?? 'Not provided' }}</p>

          <hr>
          <h4 class="card-title">Payment</h4>
          <p class="mb-1"><strong>Method:</strong> {{ ucfirst($payment?->method?->value ?? 'Not available') }}</p>
          <p class="mb-1"><strong>Status:</strong>
            <span @class([
              'text-muted' => $order->payment_status === \App\Enums\OrderPaymentStatus::Pending,
              'text-success' => $order->payment_status === \App\Enums\OrderPaymentStatus::Paid,
            ])>
              {{ ucfirst($order->payment_status?->value ?? '') }}
            </span>
          </p>
          @if ($payment?->transaction_id)
            <p><strong>Transaction:</strong> {{ $payment->transaction_id }}</p>
          @endif

          <hr>
          <h4 class="card-title">Delivery address</h4>
          <address>
            {{ $address['first_name'] ?? '' }} {{ $address['last_name'] ?? '' }}<br>
            @if (!empty($address['company']))
              {{ $address['company'] }}<br>
            @endif
            {{ $address['address_1'] ?? '' }}<br>
            {{ $address['city'] ?? '' }} {{ $address['post_code'] ?? '' }}<br>
            {{ $address['state'] ?? '' }}, {{ $address['country'] ?? '' }}
          </address>

          @if ($order->discount_code)
            <hr>
            <p class="mb-0"><strong>Discount code:</strong> {{ $order->discount_code }}</p>
          @endif
          @if ($order->notes)
            <hr>
            <h4 class="card-title">Order notes</h4>
            <p class="mb-0">{{ $order->notes }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="status-confirmation-modal" tabindex="-1" aria-labelledby="statusConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="statusConfirmationLabel">Confirm status change</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
        </div>
        <div class="modal-body">
          You are about to change the order status to <strong id="new-order-status"></strong>. Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cancel-status-change">Cancel</button>
          <button type="button" class="btn btn-primary" id="confirm-status-change">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const statusForm = document.getElementById('order-status-form');
      const statusSelect = document.getElementById('order-status');
      const confirmationModal = new bootstrap.Modal(document.getElementById('status-confirmation-modal'));
      const newStatusLabel = document.getElementById('new-order-status');
      const resetStatus = () => {
        statusSelect.value = statusSelect.dataset.currentStatus;
      };

      statusSelect.addEventListener('change', function () {
        newStatusLabel.textContent = this.options[this.selectedIndex].text;
        confirmationModal.show();
      });

      document.getElementById('cancel-status-change').addEventListener('click', resetStatus);
      document.getElementById('confirm-status-change').addEventListener('click', function () {
        statusForm.submit();
      });
      document.getElementById('status-confirmation-modal').addEventListener('hidden.bs.modal', resetStatus);
    });
  </script>
@endsection
