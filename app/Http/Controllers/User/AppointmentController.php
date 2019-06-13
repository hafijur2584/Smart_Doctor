<?php

namespace App\Http\Controllers\User;

use App\model\admin\Doctor;
use App\model\admin\DoctorAvailability;
use App\model\admin\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index($id){
        $doctor = Doctor::where('id',$id)->firstOrfail();
        $hospitals = Hospital::all();
        $availability = DoctorAvailability::where('doctor_id',$doctor->id)->get();
//        dd($id);
        return view('user.appointment',compact('doctor','hospitals','availability'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
