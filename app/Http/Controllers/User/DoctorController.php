<?php

namespace App\Http\Controllers\User;

use App\model\admin\Doctor;
use App\model\admin\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::orderBy('id','desc')->get();
        $hospitals = Hospital::all();
        return view('user.doctor',compact('doctors','hospitals'));
    }
}
