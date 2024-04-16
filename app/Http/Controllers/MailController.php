<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function inbox()
    {
        return view('mailbox.inbox');
    }
}
