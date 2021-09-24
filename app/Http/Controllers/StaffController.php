<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Addbranch;
use App\Models\Patient;

class StaffController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(User::where([['id',Auth::id()],['user_type','doctoe']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','admin']])->exists())
        {
            return redirect()->route('admin');
        }
        $data['patients'] = Patient::all();
        $data['addbranche'] = Addbranch::all();
        return view("staff.Staff",$data);
    }
    public function addPatient(Request $request)
    {   $user = Auth::user();
        if(User::where([['id',Auth::id()],['user_type','doctoe']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','admin']])->exists())
        {
            return redirect()->route('admin');
        }

        if($request->isMethod('POST'))
        {
            $request->validate([
                'name' => 'required',
                'phone_no' => 'required',
                'city' => 'required',
                'state' => 'required',
                'age' => 'required',
            ]);
            $usr = new Patient();
            $usr->name = $request->input('name');
            $usr->phone_no = $request->input('phone_no');
            $usr->city = $request->input('city');
            $usr->state = $request->input('state');
            $usr->age = $request->input('age');
            $usr->user_id = $user->id;
            $usr->save();
            return redirect()->route('manage_patient');
        }
        return view("staff.add-patient");
    }
    public function manage_patient()
    {
        if(User::where([['id',Auth::id()],['user_type','doctoe']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','admin']])->exists())
        {
            return redirect()->route('admin');
        }
        $data['patient'] = Patient::where('user_id',Auth::id())->get();
        return view("staff.manage-patient",$data);
    }
    public function destroy($id)
    {
        if(User::where([['id',Auth::id()],['user_type','doctoe']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','admin']])->exists())
        {
            return redirect()->route('admin');
        }

        $pat = Patient::find($id);
        $pat->delete();
        return redirect()->back();
    }

    
    public function updatePatient(Request $request, $id){
        if($request->isMethod('POST')){
        $pat =  Patient::find($id);
        $pat->name = $request->input('name');
        $pat->phone_no = $request->input('phone_no');
        $pat->city = $request->input('city');
        $pat->state = $request->input('state');
        $pat->age = $request->input('age');
        $pat->save();
        return redirect()->route('manage_patient');
        }
        $data['patients']= Patient::find($id);
        return view('staff.edit-patient',$data);
    }
}
