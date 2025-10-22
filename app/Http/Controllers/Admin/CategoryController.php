<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\{StoreCategoryRequest, UpdateCategoryRequest};
use App\Models\{Category, ProductCategory};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();
            $categoriesList = Category::where('is_active', 1)->get()->pluck('title','id')->toArray();
            return view('admin.categories', compact('categories', 'categoriesList'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $image_url = "";
            if ($request->hasFile('image')) {
                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/categories/", $file_name);
                $image_url = "/resources/assets/images/categories/" . $file_name;
            }

            Category::create([
                'title' => trim(strip_tags($request->title)), // sanitize
                'description' => trim(strip_tags($request->description)),  // sanitize
                'image_url' => $image_url,
                'category_id' => $request->category_id
            ]);

            return back()->with('success', 'New category was created successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->title = $request->title;
            $category->description = $request->description;
            $category->category_id = $request->category_id;

            if ($request->hasFile('image')) {
                if ($category->image_url)
                    unlink(public_path().$category->image_url);

                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/categories/", $file_name);
                $category->image_url = "/resources/assets/images/categories/" . $file_name;
            }

            $category->save();

            return back()->with('success', 'category updated successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function destroy(Category $category)
    {
        try {
            ProductCategory::where('category_id', $category->id)->delete();
            
            if ($category->image_url)
                unlink(public_path().$category->image_url);
            
            $category->delete();
            return $this->success('Removed successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function toggleActive(Request $request)
    {
        try {
            $category = Category::find($request->id);
            if (!$category)
            {
                return $this->fail("invalid category!");
            }

            $category->is_active = $request->is_active;
            $category->save();

            $status = $category->is_active ? 'activated' : 'deactivated';

            return $this->success('category ' . $status . '!');
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
