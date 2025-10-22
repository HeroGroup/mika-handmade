@extends('layouts.admin.dashboard', ['pageTitle' => 'Users'])
@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Users</h4>

            <p class="card-description">
              <b>{{ count($users) }}</b> total users 
            </p>
            @include('layouts.admin.partials.toast')

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <label class="switch">
                      <input type="checkbox" name="enabled" id="enabled_{{$user->id}}" @if($user->is_active) checked @endif onchange="toggleEnable('{{$user->id}}', this.checked, '{{route('admin.users.toggleActive')}}')">
                      <span class="slider round"></span>
                    </label>
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

  {{ $users->links() }}

@endsection