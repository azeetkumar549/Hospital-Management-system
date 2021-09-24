<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','admin']])->exists())
        {
            return redirect()->route('admin');
        }
        $data['patient'] = Patient::all();
        return view("Doctor.doctor",$data);
    }
    public function line_graph()
    {
        if(User::where([['id',Auth::id()],['user_type','staff']])->exists())
        {
            return redirect()->route('Doctor');
        }
        elseif(User::where([['id',Auth::id()],['user_type','admin']])->exists())
        {
            return redirect()->route('admin');
        }


        $patients = Patient::distinct()->get(['created_at']);
        $ps = $patients->toArray();
        $patient = array_map(function($patient) {
            return $patient['created_at'];
        }, $ps);

        $a = Patient::whereDate('created_at','=', Carbon::today()->subDays(2))->get();

        $b = Patient::whereDate('created_at','=', Carbon::today()->subDays(2))->get();

        $c = Patient::whereDate('created_at','=', Carbon::today()->subDays(1))->get();

        $d = Patient::whereDate('created_at','=', Carbon::today()->subDays(0))->get();




        return view("Doctor.line-graph", compact(['patient','a','b','c','d']));
    }

}
