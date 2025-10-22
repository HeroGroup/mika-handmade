<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\{StoreAboutRequest, UpdateAboutRequest};
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $abouts = About::all();
            return view('admin.abouts', compact('abouts'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function store(StoreAboutRequest $request)
    {
        try {
            $image_url = "";
            if ($request->hasFile('image')) {
                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/abouts/", $file_name);
                $image_url = "/resources/assets/images/abouts/" . $file_name;
            }

            About::create([
                'title' => trim(strip_tags($request->title)), // sanitize
                'description' => trim(strip_tags($request->description)),  // sanitize
                'image_url' => $image_url
            ]);

            return back()->with('success', 'New about was created successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function update(UpdateAboutRequest $request, About $about)
    {
        try {
            $about->title = $request->title;
            $about->description = $request->description;

            if ($request->hasFile('image')) {
                if ($about->image_url)
                    unlink(public_path().$about->image_url);

                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/abouts/", $file_name);
                $about->image_url = "/resources/assets/images/abouts/" . $file_name;
            }

            $about->save();

            return back()->with('success', 'about updated successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function destroy(about $about)
    {
        try {
            if ($about->image_url)
                unlink(public_path().$about->image_url);
            
            $about->delete();
            return $this->success('Removed successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function toggleActive(Request $request)
    {
        try {
            $about = About::find($request->id);
            if (!$about)
                return $this->fail("invalid about!");

            $about->is_active = $request->is_active;
            $about->save();

            $status = $about->is_active ? 'activated' : 'deactivated';

            return $this->success('about ' . $status . '!');
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
