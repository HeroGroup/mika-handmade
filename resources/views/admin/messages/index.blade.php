@extends('layouts.admin.dashboard', ['pageTitle' => 'Messages'])
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Messages</h4>

            <p class="card-description">
              <b>{{ count($messages) }}</b> total messages 
            </p>
            @include('layouts.admin.partials.toast')

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Sender</th>
                  <th>Email</th>
                  <th>Recieved At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($messages as $message)
                <tr id="{{ $message->id }}" @unless($message->has_seen) class="table-success" @endunless>
                  <td>{{ $message->name }}</td>
                  <td>{{ $message->email }}</td>
                  <td>{{ $message->created_at }}</td>
                  <td style="font-size: 18px;">
                    <a href="{{ route('admin.messages.show', $message->id) }}">
                      <i class="mdi mdi-eye"></i>
                    </a>
                    &nbsp;
                    <a href="#" onclick="removeRecord('{{ route('admin.messages.destroy', $message->id) }}', '{{ $message->id }}')">
                      <i class="mdi mdi-trash-can"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection