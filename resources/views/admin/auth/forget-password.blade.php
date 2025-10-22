@extends('layouts.admin.auth', ['pageTitle' => 'Forget Password'])
@section('content')
  <h6 class="font-weight-light">Enter your email to continue.</h6>
  <form class="pt-3" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
      <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="mt-3 d-grid gap-2">
      <input type="submit" value="Continue" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" />
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
      <a href="/admin/login" class="auth-link text-black">Back to Login</a>
    </div>
  </form>
@endsection