<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Field;
use App\Models\Submit;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailController extends Controller
{
    use SoftDeletes;
    public function index(Request $request)
    {
        $search = $request->input('search');
        $emails = Email::query();

        if ($search) {
            $emails->where(function ($query) use ($search) {
                $query->where('subject', 'LIKE', "%$search%");
            });
        }
        $emails = $emails->orderBy('created_at','desc')->where('status',1)->get();
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
        $email->status = $request->input('status');
        $email->user_id = $request->input('user_id');
        $email->save();
        if($request->input('status') == 1){
            return redirect()->route('emails.index')->with('success', 'Đã tạo mới email.');
        }else{
            return redirect()->route('emails.draft')->with('success', 'Đã Lưu bản nháp');
        }
    }
    public function edit($id)
    {
        $emails = Email::find($id);
        return view('emails.edit',compact('emails'));
    }
    public function update(Request $request, $id)
    {
        $emails = Email::find($id);
        $emails->subject = $request->input('subject');
        $emails->content = $request->input('content');
        $emails->status = $request->input('status');
        $emails->user_id = $request->input('user_id');
        $emails->update();
        
        if($request->input('status') == 1){
            return redirect()->route('emails.index')->with('success', 'Đã lưu lại thay đổi.');
        }else{
            return redirect()->route('emails.draft')->with('success', 'Đã Lưu bản nháp');
        }
    }
    public function show($id)
    {
        $emails = Email::find($id);
        return view('emails.detail',compact('emails'));
    }
    public function delete($id)
    {
        $emails = Email::find($id);
        if($emails){
            $emails->delete();
        }else{
            $emails = Email::withTrashed()->find($id);
            $emails->forceDelete() ;
        }
        return redirect()->back()->with('success', 'Đã xóa thành công !');
    }
    public function send(Request $request,$id)
    {
        $search = $request->input('search');
        $filters = $request->only(['country', 'field']);
        // $submits = Submit::orderBy('id', 'desc');
        $countries = Country::all();
        $fields = Field::all();
        $submits = Submit::query();
        $emails = Email::find($id);

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
            return view('emails.send', compact('submits', 'countries', 'fields','emails'));
        }

        return view('emails.send', compact('submits', 'countries', 'fields','emails'));

    }
    public function sendmore(Request $request,$id)
    {
        return redirect()->route('emails.index')->with('success', 'Gửi mail thành công');
    }
    public function sendall(Request $request)
    {
        return redirect()->route('emails.index')->with('success', 'Gửi mail thành công.');
    }
    public function trashed()
    {
        $emails = Email::onlyTrashed()->orderBy('created_at','desc')->get();
        return view('emails.trashed', compact('emails'));
    }
    public function return($id){
        $emails = Email::withTrashed()->where('id', $id)->first();
        $emails->deleted_at = null;
        $emails->save();
        return redirect()->route('emails.trashed')->with('success', 'Đã hoàn lại emails');
    }
    public function draft(){
        $emails = Email::query();
        $emails = $emails->where('status', 0)->orderBy('created_at','desc')->get();
        return view('emails.draft', compact('emails'));
    }
}
