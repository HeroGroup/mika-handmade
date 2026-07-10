<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
  public function store(Request $request)
  {
    try {
      ProductAttribute::create($request->all()); 
    } catch (\Exception $e) {
      //
    }
  }

  public function update(Request $request, ProductAttribute $productAttribute)
  {
    try {
      $productAttribute->update($request->all());
    } catch (\Exception $e) {
      //
    }
  }

  public function destroy(ProductAttribute $productAttribute)
  {
    try {
      $productAttribute->delete();
    } catch (\Exception $e) {
      //
    }
  }
}
