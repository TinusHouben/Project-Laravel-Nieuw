<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create([
            'user_id' => Auth::id(),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact.create')->with('status', 'Je bericht is verstuurd.');
    }

    public function index()
    {
        $messages = ContactMessage::with('user')->latest()->get();
        return view('admin.contactIndex', compact('messages'));
    }
}
