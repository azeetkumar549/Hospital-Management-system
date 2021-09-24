<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Addbranch;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }
        $data['user'] = User::all();
        $data['addbranches'] = Addbranch::all();
        $data['patients'] = Patient::all();
        return view("Admin.admin",$data);
    }
    //add
    public function add_branch(Request $request)
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        if($request->isMethod('POST'))
        {
            $request->validate([
                'branch_name' => 'required',
                'amount' => 'required',

            ]);
            $br = new Addbranch();
            $br->branch_name = $request->input('branch_name');
            $br->amount = $request->input('amount');
            $br->save();

            return redirect()->route('manage_branch');
        }

        return view("Admin.add-branch");
    }
    public function add_Doctor(Request $request)
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        if($request->isMethod('POST'))
        {
            $branch = Auth::user();
            $request->validate([
                'username' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'password' => 'required',
            ]);
            $usr = new User();
            $usr->username = $request->input('username');
            $usr->email = $request->input('email');
            $usr->phone_no = $request->input('phone_no');
            $password = $request->input('password');
            $pass = Hash::make($password);
            $usr->password = $pass;
            $usr->user_type = "doctor";
            $usr->addbranch_id = $request->input('addbranch_id');
            $usr->save();
            return redirect()->route('manage_doctor');
        }

        $data['addbranches'] = Addbranch::all();
        return view("Admin.add-doctor",$data);
    }
    public function add_Staff(Request $request)
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        $branch = Auth::user();
        if($request->isMethod('POST'))
        {
            $request->validate([
                'username' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'password' => 'required',
            ]);
            $usr = new User();
            $usr->username = $request->input('username');
            $usr->email = $request->input('email');
            $usr->phone_no = $request->input('phone_no');
            $password = $request->input('password');
            $pass = Hash::make($password);
            $usr->password = $pass;
            $usr->user_type = "staff";
            $usr->addbranch_id = $request->input('addbranch_id');
            $usr->save();
            return redirect()->route('manage_staff');
        }
        $request->session()->flash('message','Staff Added successfully');
        $data['addbranches'] = Addbranch::all();
        return view("Admin.add-staff",$data);
    }
    public function manage_branch()
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        $data['addbranches'] = Addbranch::all();
         return view("Admin.manage-branch",$data);
    }

    public function manage_staff()
    {   $id = Auth::id();
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        $data['addbrances'] = Addbranch::all();
        $data['user'] = User::where("user_type",'staff')->get();
         return view("Admin.manage-staff",$data);
    }

    public function manage_doctor()
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        $data['addbrances'] = Addbranch::all();
        $data['user'] = User::where("user_type",'doctor')->get();
         return view("Admin.manage-doctor",$data);
    }
    public function manage_admin_patient()
    {
        if(User::where([['id',Auth::id()],['user_type','doctor']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Staff');
        }

        $data['addbrances'] = Addbranch::all();
        $data['patients'] = Patient::all();
         return view("Admin.manage-patient",$data);
    }



    public function destroyuser(Request $request, $id)
    {
        $users = User::find($id);
        $users->delete();
        $request->session()->flash('message','Delete Successfully');
        return redirect()->back();
    }
    public function destroybranch(Request $request, $id)
    {
        $branch = Addbranch::find($id);
        $branch->delete();
        $request->session()->flash('message','Branch delete successfully');
        return redirect()->back();
    }

   


    public function  updateBranch(Request $request, $id){
        if($request->isMethod('POST')){
        $bra =  Addbranch::find($id);
        $bra->branch_name = $request->input('branch_name');
        $bra->amount = $request->input('amount');
        $bra->save();
        return redirect()->route('manage_branch');
        }
        $data['branches']= Addbranch::find($id);
        return view('Admin.edit-branch',$data);
    }
    public function  updatestaff(Request $request, $id){
        if($request->isMethod('POST')){
            $usr =  User::find($id);
            $usr->username = $request->input('username');
            $usr->email = $request->input('email');
            $usr->phone_no = $request->input('phone_no');
            $password = $request->input('password');
            $pass = Hash::make($password);
            $usr->password = $pass;
            $usr->user_type = "staff";
            $usr->addbranch_id = $request->input('addbranch_id');
            $usr->save();

            return redirect()->route('manage_staff');
        }
        $data['staff']=User::find($id);
        $data['addbranches']=Addbranch::all();
        return view('Admin.edit-staff',$data);
    }
    public function  updateDoctor(Request $request, $id){
        if($request->isMethod('POST')){
            $usr =  User::find($id);
            $usr->username = $request->input('username');
            $usr->email = $request->input('email');
            $usr->phone_no = $request->input('phone_no');
            $password = $request->input('password');
            $pass = Hash::make($password);
            $usr->password = $pass;
            $usr->user_type = "doctor";
            $usr->addbranch_id = $request->input('addbranch_id');
            $usr->save();

            return redirect()->route('manage_doctor');
        }
        $data['staff']=User::find($id);
        $data['addbranches']=Addbranch::all();
        return view('Admin.edit-doctor',$data);
    }


}
