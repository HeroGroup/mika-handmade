<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQ\{StoreFAQRequest, UpdateFAQRequest};
use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        try {
            $faqs = FAQ::all();
            return view('admin.faqs', compact('faqs'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function store(StoreFAQRequest $request)
    {
        try {
            FAQ::create([
                'question' => trim(strip_tags($request->question)), // sanitize
                'answer' => trim(strip_tags($request->answer))  // sanitize
            ]);

            return back()->with('success', 'New faq was created successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function update(UpdateFAQRequest $request, FAQ $faq)
    {
        try {
            $faq->question = $request->question;
            $faq->answer = $request->answer;

            $faq->save();

            return back()->with('success', 'faq updated successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function destroy(FAQ $faq)
    {
        try {
            $faq->delete();
            return $this->success('Removed successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function toggleActive(Request $request)
    {
        try {
            $faq = FAQ::find($request->id);
            if (!$faq)
                return $this->fail("invalid faq!");

            $faq->is_active = $request->is_active;
            $faq->save();

            $status = $faq->is_active ? 'activated' : 'deactivated';

            return $this->success('faq ' . $status . '!');
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
