<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Field;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $emails = Email::query();

        if ($search) {
            $emails->where(function ($query) use ($search) {
                $query->where('subject', 'LIKE', "%$search%");
            });
        }
        $emails = $emails->orderBy('created_at','desc')->get();
        return view('emails.index', compact('emails'));
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

        return redirect()->route('emails.index')->with('success', 'Email saved successfully.');
    }
    public function edit()
    {
        return view('emails.edit');
    }
    public function update()
    {
        
    }
    public function show($id)
    {
        $emails = Email::find($id);
        return view('emails.detail',compact('emails'));
    }
    public function delete()
    {
       
    }
}
