<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $messages = Contact::orderByDesc('created_at')->get();
            return view('admin.messages.index', compact('messages'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->has_seen = true;
            $contact->save();
            return view('admin.messages.show', compact('contact'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            return $this->success('Removed successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function reply(Request $request)
    {
        try {
            // Mail::to($request->email)->send(new Support($request->reply_message));
            return back()->with('success','Email was sent successfully');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }
}
