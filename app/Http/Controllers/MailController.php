<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class MailController extends Controller
{
    public function inbox()
    {
        return view('mailbox.inbox');
    }
    public function create()
    {
        return view('emails.create');
    }
    public function store(Request $request)
    {
        $email = new Email();
        $email->subject = $request->input('subject');
        $email->content = $request->input('content');
        $email->save();

        return redirect()->route('emails.create')->with('success', 'Email saved successfully.');
    }
}
