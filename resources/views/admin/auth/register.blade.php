@extends('layouts.admin.auth', ['pageTitle' => 'Register'])
@section('content')
  <h4>New here?</h4>
  <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
  <form class="pt-3" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
      <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Password">
    </div>
    <div class="mt-3 d-grid gap-2">
      <input type="submit" value="Sign Up" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" />
    </div>
    <div class="text-center mt-4 font-weight-light">
      Already have an account? <a href="/admin/login" class="text-primary">Login</a>
    </div>
  </form>
@endsection