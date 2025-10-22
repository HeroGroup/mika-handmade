@extends('layouts.admin.dashboard', ['pageTitle' => 'Abouts'])
@section('content')
<div class="mb-4" style="display: flex; justify-content: space-between;">
  <div>
    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#new-about-modal">
      <i class="mdi mdi-plus btn-icon-prepend"></i> New About
    </button>
  </div>
  @include('layouts.admin.partials.toast')
</div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Abouts</h4>

            <p class="card-description">
              <b>{{ count($abouts) }}</b> total abouts 
            </p>
            @include('layouts.admin.partials.toast')

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>About</th>
                  <th>Title</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($abouts as $about)
                <tr id="{{ $about->id }}">
                  <td class="py-1">
                    <img src="{{ $about->image_url }}" alt="{{ $about->title }}" />
                  </td>
                  <td>{{ $about->title }}</td>
                  <td>
                    <label class="switch">
                      <input type="checkbox" name="enabled" id="enabled_{{$about->id}}" @if($about->is_active) checked @endif onchange="toggleEnable('{{$about->id}}', this.checked, '{{route('admin.abouts.toggleActive')}}')">
                      <span class="slider round"></span>
                    </label>
                  </td>
                  <td style="font-size: 18px;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-about-{{$about->id}}-modal">
                      <i class="mdi mdi-pencil"></i>
                    </a>
                    &nbsp;
                    <a href="#" onclick="removeRecord('{{ route('admin.abouts.destroy', $about) }}', '{{ $about->id }}')">
                      <i class="mdi mdi-trash-can"></i>
                    </a>
                  </td>
                </tr>
                <!-- Edit About Modal -->
                  <div class="modal fade" id="edit-about-{{$about->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="newAboutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Edit About</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('admin.abouts.update', $about) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="title">Title</label>
                                    <input class="form-control" name="title" value="{{$about->title}}" placeholder="Enter about title" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="description">Description</label>
                                    <input class="form-control" name="description" value="{{$about->description}}" placeholder="Enter about description" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                  <label>Change Image</label><br>
                                  <img src="{{ $about->image_url }}" height="50" />
                                  <input type="file" name="image" accept="image/*" />
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
                <!-- End Edit About Modal -->
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Create About Modal -->
  <div class="modal fade" id="new-about-modal" tabindex="-1" role="dialog" aria-labelledby="newAboutModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5">Add new about</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="{{route('admin.abouts.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                          <div class="col-md-6">
                              <label for="title">Title</label>
                              <input class="form-control" name="title" value="{{old('title')}}" placeholder="Enter about title" required />
                          </div>
                          <div class="col-md-6">
                              <label for="description">Description</label>
                              <input class="form-control" name="description" value="{{old('description')}}" placeholder="Enter about description" required />
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-6">
                            <label>Image upload</label>
                            <input type="file" name="image" accept="image/*"/>
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
  <!-- End Create About Modal -->
@endsection