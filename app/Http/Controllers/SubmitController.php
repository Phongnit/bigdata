<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Field;
use App\Models\Submit;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class SubmitController extends Controller
{
    public function list(Request $request)
    {
        $submits = Submit::orderBy('id', 'desc')->paginate(10);
        // $field = Field::all();
        // $country = Country::all();
        return view('submit.list', compact('submits'));
    }
    public function create()
    {
        return view('submit.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $submit = new Submit();
        $submit->name = $data['name'];
        $submit->email = $data['email'];
        $submit->phone = $data['phone'];
        $submit->description = $data['description'];
        $submit->fld_id = $data['fld_id'];
        $submit->cty_id = $data['cty_id'];
        $submit->save();
        return redirect()->route('submit.list');

        // dd($data);
    }
    public function show($id)
    {
        $submits = Submit::find($id);
        return view('submit.detail',compact('submits'));
    }
    public function edit(Request $request, $id)
    {
        $submits = Submit::find($id);
        $field = Field::all();
        $country = Country::all();
        return view('submit.edit', compact('submits', 'field', 'country'));
    }
    public function update(Request $request, $id)
    {
        $submit = Submit::find($id);
        $submit->update($request->all());
        return redirect()->route('submit.list');
    }
    public function delete($id)
    {
        $submit = Submit::find($id);
        $submit->delete();
        return redirect()->route('submit.list');
    }
}
