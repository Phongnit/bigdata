<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Field;
use App\Models\SMS;
use App\Models\Submit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsController extends Controller
{
    use SoftDeletes;
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sms = SMS::query();

        if ($search) {
            $sms->where(function ($query) use ($search) {
                $query->where('subject', 'LIKE', "%$search%");
            });
        }
        $sms = $sms->orderBy('created_at','desc')->where('status',1)->get();
        return view('sms.index', compact('sms'));
    } 
    public function create()
    {
        return view('sms.create');
    }
    public function store(Request $request)
    {
        $sms = new SMS();
        $sms->subject = $request->input('subject');
        $sms->content = $request->input('content');
        $sms->status = $request->input('status');
        $sms->user_id = $request->input('user_id');
        $sms->save();
        if($request->input('status') == 1){
            return redirect()->route('sms.index')->with('success', 'Đã tạo mới SMS.');
        }else{
            return redirect()->route('sms.draft')->with('success', 'Đã Lưu bản nháp');
        }
    }
    public function edit($id)
    {
        $sms = SMS::find($id);
        return view('sms.edit',compact('sms'));
    }
    public function update(Request $request, $id)
    {
        $sms = SMS::find($id);
        $sms->subject = $request->input('subject');
        $sms->content = $request->input('content');
        $sms->status = $request->input('status');
        $sms->user_id = $request->input('user_id');
        $sms->update();
        
        if($request->input('status') == 1){
            return redirect()->route('sms.index')->with('success', 'Đã lưu lại thay đổi.');
        }else{
            return redirect()->route('sms.draft')->with('success', 'Đã Lưu bản nháp');
        }
    }
    public function show($id)
    {
        $sms = SMS::find($id);
        return view('sms.detail',compact('sms'));
    }
    public function delete($id)
    {
        $sms = SMS::find($id);
        if($sms){
            $sms->delete();
        }else{
            $sms = SMS::withTrashed()->find($id);
            $sms->forceDelete() ;
        }
        return redirect()->back()->with('success', 'Đã xóa thành công !');
    }
    // giao diện gửi chọn customer gửi mail 
    public function send(Request $request,$id)
    {
        $search = $request->input('search');
        $filters = $request->only(['country', 'field']);
        // $submits = Submit::orderBy('id', 'desc');
        $countries = Country::all();
        $fields = Field::all();
        $submits = Submit::query();
        $sms = SMS::find($id);

        if ($search) {
            $submits->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('SMS', 'LIKE', "%$search%")
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
            return view('sms.send', compact('submits', 'countries', 'fields','sms'));
        }

        return view('sms.send', compact('submits', 'countries', 'fields','sms'));

    }
    // gửi sms theo bộ lọc 
    public function sendmore(Request $request,$id)
    {

        return redirect()->route('sms.index')->with('success', 'Gửi mail thành công');
    }
    // gửi sms cho tất cả 
    public function sendall(Request $request)
    {
        return redirect()->route('sms.index')->with('success', 'Gửi mail thành công.');
    }
    // xem thùng rác 
    public function trashed()
    {
        $sms = SMS::onlyTrashed()->orderBy('created_at','desc')->get();
        return view('sms.trashed', compact('sms'));
    }
    // hoàn lại SMS đã xóa 
    public function return($id){
        $sms = SMS::withTrashed()->where('id', $id)->first();
        $sms->deleted_at = null;
        $sms->save();
        return redirect()->route('sms.trashed')->with('success', 'Đã hoàn lại SMS');
    }
    // xem thùng bản nháp 
    public function draft(){
        $sms = SMS::query();
        $sms = $sms->where('status', 0)->orderBy('created_at','desc')->get();
        return view('sms.draft', compact('sms'));
    }
}
