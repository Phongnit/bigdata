<?php

namespace App\Http\Controllers;

use App\Exports\SubmitExport;
use App\Exports\UsersExport;
use App\Imports\SubmitImport;
use App\Imports\UsersImport;
use App\Models\Country;
use App\Models\Field;
use App\Models\Submit;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
        $field = Field::all();
        $country = Country::all();
        return view('submit.create', compact('field', 'country'));
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

    public function importExportView()
    {
        $field = Field::all();
        $country = Country::all();
        return view('submit.create', compact('field', 'country'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new SubmitExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        try {
            Excel::import(new SubmitImport, request()->file('file'));
            return redirect()->route('submit.list')->with('success', 'Import dữ liệu thành công');
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                if (strpos($e->getMessage(), 'table_submit_phone_unique') !== false) {
                    preg_match("/Duplicate entry '(.+)' for key 'table_submit\.table_submit_phone_unique'/", $e->getMessage(), $matches);
                    if (isset($matches[1])) {
                        $duplicatePhone = $matches[1]; // Lấy số điện thoại bị trùng từ thông báo lỗi
                        // Thực hiện xử lý thông báo hoặc hành động cần thiết
                        return redirect()->back()->with('error', "Số điện thoại $duplicatePhone đã tồn tại trong hệ thống.");
                        // Chuyển hướng ngược lại trang trước đó và chuyển thông báo lỗi dưới dạng biến phiên
                    }
                } elseif (strpos($e->getMessage(), 'table_submit_email_unique') !== false) {
                    preg_match("/Duplicate entry '(.+)' for key 'table_submit\.table_submit_email_unique'/", $e->getMessage(), $matches);
                    if (isset($matches[1])) {
                        $duplicateEmail = $matches[1]; // Lấy email bị trùng từ thông báo lỗi
                        // Thực hiện xử lý thông báo hoặc hành động cần thiết
                        return redirect()->back()->with('error', "Email $duplicateEmail đã tồn tại trong hệ thống.");
                        // Chuyển hướng ngược lại trang trước đó và chuyển thông báo lỗi dưới dạng biến phiên
                    }
                }
            }
        }
        return redirect()->back()->with('error', $e->getMessage());

    }
}
