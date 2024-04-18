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
        $search = $request->input('search');
        $filters = $request->only(['country', 'field']);
        // $submits = Submit::orderBy('id', 'desc');
        $countries = Country::all();
        $fields = Field::all();
        $submits = Submit::query();

        if ($search) {
            $submits->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%");
            });
        }
        if (isset($filters['country'])) {
            $submits->where('cty_id', $filters['country']);
        }
        if (isset($filters['field'])) {
            $submits->where('fld_id', $filters['field']);
        }

        $submits = $submits->get();
        // $submits = $submits->paginate(5);

        if ($request->ajax()) {
            return view('submit.list', compact('submits', 'countries', 'fields'));
        }

        return view('submit.list', compact('submits', 'countries', 'fields'));
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
        return view('submit.detail', compact('submits'));
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
