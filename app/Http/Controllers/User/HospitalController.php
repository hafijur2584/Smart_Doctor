<?php

namespace App\Http\Controllers\User;

use App\model\admin\Disease;
use App\model\admin\Disease_Sysmtom;
use App\model\admin\Doctor;
use App\model\admin\DoctorAvailability;
use App\model\admin\DoctorAward;
use App\model\admin\DoctorEducation;
use App\model\admin\DoctorWorkExperience;
use App\model\admin\Hospital;
use App\model\admin\HospitalService;
use App\model\admin\Medicine;
use App\model\admin\Sysmtom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class HospitalController extends Controller
{
    public function index(){
        $hospitals = Hospital::all();
        return view('user.hospital',compact('hospitals'));
    }
    public function hospital($slug){
        $hospital = Hospital::where('slug',$slug)->firstOrfail();
        $service = HospitalService::where('hospital_id',$hospital->id)->get();
        $doctors = Doctor::where('hospital_id',$hospital->id)->orderBy('id','desc')->get();
        return view('user.hospital_details',compact('hospital','doctors','service'));
    }
    public function doctor($id){
        $doctor = Doctor::where('id',$id)->firstOrfail();
        $awards = DoctorAward::where('doctor_id',$doctor->id)->get();
        $educations = DoctorEducation::where('doctor_id',$doctor->id)->get();
        $experiences = DoctorWorkExperience::where('doctor_id',$doctor->id)->get();
        $availability = DoctorAvailability::where('doctor_id',$doctor->id)->get();
        return view('user.doctor_profile',compact('doctor','awards','educations','experiences','availability'));
    }
    public function disease(){
        $symptoms = Sysmtom::orderBy('id','desc')->get();
        return view('user.search_deagese',compact('symptoms'));
    }
    public function contact(){
        return view('user.contact');
    }
    public function findDisease(Request $request){
        $symtroms = explode(',',$request->tests);
        $diseses = [];
        foreach ($symtroms as $symtrom){
            $diseses_symtrom = Disease_Sysmtom::where('symptom_id',$symtrom)->get();
            foreach ($diseses_symtrom as $d){
                $diseses[] = [
                    'name' => $d->disease->name,
                    'id'   => $d->disease->id
                ];
            }
        }
        $output = [];
        $dnid = [];
        foreach ($diseses as $disese){
            if(isset($output[$disese['name']])){
                $output[$disese['name']]++;
                $dnid[$disese['id']] = true;
            } else {
                $output[$disese['name']] = 1;
                $dnid[$disese['id']] = true;
            }
        }
        $total = count($diseses);
        foreach ($output as $key=>$o){
            $output[$key] = round(($o*100)/$total,2).' %';
        }

        $medicines = [];
        foreach ($dnid as $key=>$dn){
            $medicines[] = Medicine::where('disease_id',$key)->get();
        }
//        $pdf = PDF::loadView('user.findDisease');
//        return $pdf->download('user.findDisease');

        $doctors = Doctor::all();
        $hospitals = Hospital::all();
        $diseases =Disease::all();
        return view('user.findDisease',compact('output','medicines','doctors','hospitals','diseases'));
    }
}
