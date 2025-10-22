@extends('layouts.admin.dashboard', ['pageTitle' => 'Categories'])
@section('content')
<div class="mb-4" style="display: flex; justify-content: space-between;">
  <div>
    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#new-category-modal">
      <i class="mdi mdi-plus btn-icon-prepend"></i> New Category
    </button>
  </div>
  @include('layouts.admin.partials.toast')
</div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Categories</h4>
          <p class="card-description">
            <b>{{ count($categories) }}</b> total categories
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Main Cat.</th>
                  <th>Products</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr id="{{ $category->id }}">
                  <td class="py-1">
                    <img src="{{ $category->image_url }}" alt="{{ $category->title }}" />
                  </td>
                  <td>{{ $category->title }}</td>
                  <td>{{ $category->main_category->title ?? '-' }}</td>
                  <td>{{ count($category->products) }}</td>
                  <td>
                    <label class="switch">
                      <input type="checkbox" name="enabled" id="enabled_{{$category->id}}" @if($category->is_active) checked @endif onchange="toggleEnable('{{$category->id}}', this.checked, '{{route('admin.categories.toggleActive')}}')">
                      <span class="slider round"></span>
                    </label>
                  </td>
                  <td style="font-size: 18px;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-category-{{$category->id}}-modal">
                      <i class="mdi mdi-pencil"></i>
                    </a>
                    &nbsp;
                    <a href="#" onclick="removeRecord('{{ route('admin.categories.destroy', $category) }}', '{{ $category->id }}')">
                      <i class="mdi mdi-trash-can"></i>
                    </a>
                  </td>
                </tr>
                <!-- Edit Category Modal -->
                  <div class="modal fade" id="edit-category-{{$category->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Edit Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                              <div class="col-md-6">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categoriesList as $key => $value)
                                <option value="{{$key}}" @if($key==$category->category_id) selected @endif>{{$value}}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="title">Title</label>
                                    <input class="form-control" name="title" value="{{$category->title}}" placeholder="Enter category title" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="description">Description</label>
                                    <input class="form-control" name="description" value="{{$category->description}}" placeholder="Enter category description" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                  <label>Change Image</label><br>
                                  <img src="{{ $category->image_url }}" height="50" />
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
                <!-- End Edit Category Modal -->
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Category Modal -->
  <div class="modal fade" id="new-category-modal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5">Add new category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="category_id">Category</label>
                          <select name="category_id" id="category_id" class="form-control">
                          @foreach ($categoriesList as $key => $value)
                          <option value="{{$key}}">{{$value}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-6">
                              <label for="title">Title</label>
                              <input class="form-control" name="title" value="{{old('title')}}" placeholder="Enter category title" required>
                          </div>
                          <div class="col-md-6">
                              <label for="description">Description</label>
                              <input class="form-control" name="description" value="{{old('description')}}" placeholder="Enter category description" >
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
  <!-- End Create Category Modal -->

@endsection