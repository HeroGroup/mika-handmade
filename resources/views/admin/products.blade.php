@extends('layouts.admin.dashboard', ['pageTitle' => 'Products'])
@section('content')
  <div class="row mb-4">
    <div class="col">
      <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
        data-bs-target="#new-product-modal">
        <i class="mdi mdi-plus btn-icon-prepend"></i> New Product
      </button>
    </div>
    <div class="col">
      <br>
      <label for="category">Filter By:</label>
      <select name="category" id="category" onchange="searchProducts({'category': this.value})">
        <option value="">All</option>
        @foreach ($categories as $key => $value)
          <option value="{{$key}}">{{$value}}</option>
        @endforeach
      </select>
    </div>
    <div class="col">
      <br>
      <label for="sort">Sort By:</label>
      <select name="sort" id="sort" onchange="searchProducts({'sort': this.value})">
        <option value="newest">Newest</option>
        <option value="oldest">Oldest</option>
      </select>
    </div>
    <div class="col">
      @include('layouts.admin.partials.toast')
    </div>
  </div>


  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Products</h4>
          <p class="card-description">
            <b>{{ count($products) }}</b> total products
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <?php  $product_categories = \App\Models\ProductCategory::where('product_id', $product->id)->get(); ?>
                  <tr id="{{ $product->id }}">
                    <td class="py-1">
                      <img src="{{ $product->image_url }}" alt="{{ $product->title }}" />
                    </td>
                    <td>{{ $product->title }}</td>
                    <td>
                      <ul style="margin:0">
                        @foreach ($product_categories as $productCategory)
                          <li>{{$productCategory->category->title}}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                      <label class="switch">
                        <input type="checkbox" name="enabled" id="enabled_{{$product->id}}" @if($product->is_active) checked
                        @endif
                          onchange="toggleEnable('{{$product->id}}', this.checked, '{{route('admin.products.toggleActive')}}')">
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <td>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#edit-product-{{$product->id}}-modal">
                        <i class="mdi mdi-pencil"></i>
                      </a>
                      &nbsp;
                      <a href="#"
                        onclick="removeRecord('{{ route('admin.products.destroy', $product->id) }}', '{{ $product->id }}')">
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

  @foreach ($products as $product)
    <!-- Edit Product Modal -->
    <div class="modal fade" id="edit-product-{{$product->id}}-modal" tabindex="-1" role="dialog"
      aria-labelledby="newProductModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Edit Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('admin.products.update', $product->id) }}"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="title">Title</label>
                  <input class="form-control" name="title" value="{{$product->title}}"
                    placeholder="Enter product title" required>
                </div>
                <div class="col-md-6">
                  <label for="description">Description</label>
                  <input class="form-control" name="description" value="{{$product->description}}"
                    placeholder="Enter product description">
                </div>
              </div>
              <?php  $product_categories = \App\Models\ProductCategory::where('product_id', $product->id)->pluck('category_id', 'id')->toArray(); ?>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="price">Price</label>
                  <input class="form-control" name="price" value="{{$product->price}}"
                    placeholder="Enter product price" required>
                </div>
                <div class="col-md-6">
                  <label for="quantity">Quantity</label>
                  <input class="form-control" name="quantity" value="{{$product->quantity}}"
                    placeholder="Enter product quantity" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="categories">Categories</label>
                  <select name="categories[]" id="categories[]" class="form-control" multiple>
                    @foreach ($categories as $key => $value)
                      <option value="{{$key}}" @if(in_array($key, $product_categories)) selected @endif>
                        {{$value}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <hr />
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3>Variants</h3>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addVariantRow('edit-variant-rows-{{$product->id}}')">Add variant</button>
                  </div>
                  <div id="edit-variant-rows-{{$product->id}}"></div>
                </div>
              </div>
              <hr />
              <div class="form-group row">
                <div class="col-md-6">
                  <label>Change Main Image</label><br>
                  <img src="{{ $product->image_url }}" height="50" />
                  <input type="file" name="image" accept="image/*" />
                </div>
                <div class="col-md-6">
                  <label>More Images</label>
                  <input type="file" name="images[]" accept="image/*" multiple />
                  <div class="row">
                    <?php  $product_images = \App\Models\ProductImage::where('product_id', $product->id)->get(); ?>
                    @foreach ($product_images as $image)
                      <div id="image_{{ $image->id }}" class="col-md-2">
                        <img src="{{ $image->image_url }}" height="50" /><br>
                        <a href="#" onclick="removeImage('{{ $image->id }}')">Remove</a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label>New</label>
                  <label class="switch">
                    <input type="checkbox" name="is_new" id="is_new" @if($product->is_new) checked @endif />
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label>Featured</label>
                  <label class="switch">
                    <input type="checkbox" name="is_featured" id="is_featured" @if($product->is_featured)
                    checked @endif />
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label>Best Seller</label>
                  <label class="switch">
                    <input type="checkbox" name="is_best_seller" id="is_best_seller"
                      @if($product->is_best_seller) checked @endif />
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12" style="text-align:center;">
                  <input type="submit" class="btn btn-success" value="Save and close" />
                </div>
              </div>
              @php
                $existingVariants = $product->attributes()->get()->filter(function ($variant) {
                  return ! (
                    strtolower((string) $variant->attributeValue?->value) === 'default'
                    && strtolower((string) $variant->attributeValue?->attribute?->name) === 'variant'
                  );
                })->map(function ($variant) {
                    $size = '';
                    $color = '';
                    $attributeValue = $variant->attributeValue;
                    if ($attributeValue) {
                    foreach (preg_split('/\s*\/\s*/', $attributeValue->value) as $part) {
                      [$name, $value] = array_pad(explode(':', $part, 2), 2, '');
                      $name = strtolower(trim($name));
                      $value = trim($value);

                      if ($name === 'size') {
                        $size = $value;
                      } elseif ($name === 'color') {
                        $color = $value;
                      }
                        }
                    }

                    return [
                        'size' => $size,
                        'color' => $color,
                        'quantity' => (int) $variant->quantity,
                        'price' => (float) $variant->price,
                    ];
                })->values()->toJson();
              @endphp
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                    renderVariantRows('edit-variant-rows-{{$product->id}}', {!! $existingVariants !!});
                });
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Edit Product Modal -->
  @endforeach

  {{ $products->links() }}

  <!-- Create Product Modal -->
  <div class="modal fade" id="new-product-modal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Add new product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <div class="col-md-6">
                <label for="title">Title</label>
                <input class="form-control" name="title" value="{{old('title')}}" placeholder="Enter product title"
                  required />
              </div>
              <div class="col-md-6">
                <label for="description">Description</label>
                <input class="form-control" name="description" value="{{old('description')}}"
                  placeholder="Enter product description" />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="price">Price</label>
                <input class="form-control" name="price" value="{{old('price')}}" placeholder="Enter product price"
                  required />
              </div>
              <div class="col-md-6">
                <label for="quantity">Quantity</label>
                <input class="form-control" name="quantity" value="{{old('quantity')}}"
                  placeholder="Enter product quantity" required />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="categories">Categories</label>
                <select name="categories[]" id="categories[]" class="form-control" multiple>
                  @foreach ($categories as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>Main Image</label>
                <input type="file" name="image" accept="image/*" />
              </div>
            </div>
            <hr />
            <div class="form-group row">
              <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3>Variants</h3>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addVariantRow('variant-rows')">Add variant</button>
                </div>
                <div id="variant-rows"></div>
              </div>
            </div>
            <hr />
            <div class="form-group row">
              <div class="col-md-3">
                <label>New</label>
                <label class="switch">
                  <input type="checkbox" name="is_new" id="is_new" />
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-md-3">
                <label>Featured</label>
                <label class="switch">
                  <input type="checkbox" name="is_featured" id="is_featured" />
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-md-3">
                <label>Best Seller</label>
                <label class="switch">
                  <input type="checkbox" name="is_best_seller" id="is_best_seller"  />
                  <span class="slider round"></span>
                </label>
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
  <!-- End Create Product Modal -->

  <script type="text/javascript">
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var category = urlParams.get('category');
    var sort = urlParams.get('sort');
    if (category) {
      document.getElementById('category').value = category;
    }
    if (sort) {
      document.getElementById('sort').value = sort;
    }


    function searchProducts(filter) {
      searchBase("{{route('admin.products.index')}}", filter);
    }

    function removeImage(id) {
      var formData = createFormData({
        '_token': '{{csrf_token()}}',
        'id': id
      });

      var params = {
        method: 'POST',
        route: "{{ route('admin.products.removeImage') }}",
        formData,
        successCallback: function () {
          document.getElementById(`image_${id}`).remove();
        }
      };

      sendRequest(params);
    }

    function addVariantRow(containerId, sizeValue, colorValue, quantityValue, priceValue) {
      var container = document.getElementById(containerId);
      if (!container) {
        return;
      }

      var index = container.children.length;
      var row = document.createElement('div');
      row.className = 'row mb-2 variant-row';
      row.innerHTML = `
        <div class="col-md-3">
          <label>Size</label>
          <select name="variants[${index}][size]" class="form-control">
            <option value="">Select size</option>
            @foreach ($sizes as $size)
              <option value="{{ $size->value }}">{{ $size->value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label>Color</label>
          <select name="variants[${index}][color]" class="form-control">
            <option value="">Select color</option>
            @foreach ($colors as $color)
              <option value="{{ $color->value }}">{{ $color->value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Qty</label>
          <input type="number" name="variants[${index}][quantity]" class="form-control" min="0" value="${quantityValue || 0}" />
        </div>
        <div class="col-md-2">
          <label>Price</label>
          <input type="number" step="0.01" name="variants[${index}][price]" class="form-control" value="${priceValue || '{{ old('price') ?? 0 }}'}" />
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.variant-row').remove()">Remove</button>
        </div>
      `;
      container.appendChild(row);

      var sizeSelect = row.querySelector('select[name$="[size]"]');
      var colorSelect = row.querySelector('select[name$="[color]"]');
      if (sizeSelect && sizeValue) {
        sizeSelect.value = sizeValue;
      }
      if (colorSelect && colorValue) {
        colorSelect.value = colorValue;
      }
    }

    function renderVariantRows(containerId, variants) {
      var container = document.getElementById(containerId);
      if (!container) {
        return;
      }

      container.innerHTML = '';
      if (!variants || !variants.length) {
        addVariantRow(containerId);
        return;
      }

      variants.forEach(function (variant) {
        addVariantRow(containerId, variant.size || '', variant.color || '', variant.quantity || 0, variant.price || 0);
      });
    }

    document.addEventListener('DOMContentLoaded', function () {
      addVariantRow('variant-rows');
    });
  </script>
@endsection