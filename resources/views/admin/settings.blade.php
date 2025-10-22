@extends('layouts.admin.dashboard', ['pageTitle' => 'Settings'])
@section('content')
<div class="mb-4" style="display: flex; justify-content: space-between;">
  <div>
    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#new-setting-modal">
      <i class="mdi mdi-plus btn-icon-prepend"></i> New Setting
    </button>
  </div>
  @include('layouts.admin.partials.toast')
</div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Settings</h4>
          <p class="card-description">
            <b>{{ count($settings) }}</b> total settings
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Key</th>
                  <th>Value</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($settings as $setting)
                <tr id="{{ $setting->id }}">
                  <td>{{ $setting->key }}</td>
                  <td>{{ $setting->value }}</td>
                  <td style="font-size: 18px;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-setting-{{$setting->id}}-modal">
                      <i class="mdi mdi-pencil"></i>
                    </a>
                  </td>
                </tr>
                <!-- Edit Setting Modal -->
                  <div class="modal fade" id="edit-setting-{{$setting->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="newSettingModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Edit Setting</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('admin.settings.update', $setting) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="key">Key</label>
                                    <input class="form-control" name="key" value="{{$setting->key}}" placeholder="Enter setting key" required disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="value">Value</label>
                                    <input class="form-control" name="value" value="{{$setting->value}}" placeholder="Enter setting value" required>
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
                <!-- End Edit Setting Modal -->
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Setting Modal -->
  <div class="modal fade" id="new-setting-modal" tabindex="-1" role="dialog" aria-labelledby="newSettingModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5">Add new setting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="{{route('admin.settings.store')}}">
                      @csrf
                      <div class="form-group row">
                          <div class="col-md-6">
                              <label for="key">Key</label>
                              <input class="form-control" name="key" value="{{old('key')}}" placeholder="Enter setting key" required />
                          </div>
                          <div class="col-md-6">
                              <label for="value">Value</label>
                              <input class="form-control" name="value" value="{{old('value')}}" placeholder="Enter setting value" required />
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
  <!-- End Create Setting Modal -->

@endsection