@extends('layouts.admin.dashboard', ['pageTitle' => 'Profile'])
@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">My Profile</h4>
          <form method="POST" action="{{ route('admin.updateProfile') }}">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" value="{{ $user->email }}" type="email" class="form-control" id="email" disabled />
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="name" />
            </div>
            <div class="form-group">
              <label for="currentPassword">Current Password</label>
              <input name="current_password" type="password" class="form-control" id="currentPassword" placeholder="Current Password">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
            </div>
            <div class="form-group">
              <label for="passwordConfirmation">Confirm Password</label>
              <input name="password_confirmation" type="password" class="form-control" id="passwordConfirmation" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a class="btn btn-light" href="{{ route('admin.dashboard') }}">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection