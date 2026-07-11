@extends('layouts.admin.dashboard', ['pageTitle' => 'Users'])
@section('content')
  <div class="mb-4" style="display: flex; justify-content: space-between;">
    <div>
      <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#new-user-modal">
        <i class="mdi mdi-plus btn-icon-prepend"></i> New Admin User
      </button>
    </div>
    @include('layouts.admin.partials.toast')
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Users</h4>

          <p class="card-description">
            <b>{{ count($users) }}</b> total users
          </p>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr id="{{ $user->id }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <label class="switch">
                        <input type="checkbox" name="enabled" id="enabled_{{$user->id}}" @if($user->is_active) checked @endif onchange="toggleEnable('{{$user->id}}', this.checked, '{{route('admin.users.toggleActive')}}')">
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <td style="font-size: 18px;">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#edit-user-{{$user->id}}-modal">
                        <i class="mdi mdi-pencil"></i>
                      </a>
                    </td>
                  </tr>

                  <div class="modal fade" id="edit-user-{{$user->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5">Edit Admin User</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                              <div class="col-md-6">
                                <label for="name">Name</label>
                                <input class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter admin user name" required>
                              </div>
                              <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter admin user email" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current password">
                              </div>
                              <div class="col-md-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-12" style="text-align:center;">
                                <input type="submit" class="btn btn-success" value="Save and close" />
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="new-user-modal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Add new admin user</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group row">
              <div class="col-md-6">
                <label for="name">Name</label>
                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter admin user name" required>
              </div>
              <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter admin user email" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
              </div>
              <div class="col-md-6">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12" style="text-align:center;">
                <input type="submit" class="btn btn-success" value="Save and close" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{ $users->links() }}

@endsection