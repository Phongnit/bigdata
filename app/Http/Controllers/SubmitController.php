<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function list()
    {
        return view('submit.list');
    }
    public function create()
    {
        return view('submit.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
    public function edit()
    {
        return view('submit.edit');
    }
    public function show()
    {
        return view('submit.detail');
    }
    public function update()
    {
        
    }   
    public function delete()
    {
        
    }
}
