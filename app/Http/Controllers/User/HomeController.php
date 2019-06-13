<?php

namespace App\Http\Controllers\User;

use App\model\admin\Doctor;
use App\model\admin\Hospital;
use App\model\admin\Work;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        $works = Work::all();
        $hospitals = Hospital::all();
        return view('user.homepage',compact('doctors','works','hospitals'));
    }

    public function pdf(){
        $data = ['Radoan'];
        $pdf = PDF::loadView('pdf.layout',$data);
        return $pdf->download('pdf.layout.pdf');
    }
}
