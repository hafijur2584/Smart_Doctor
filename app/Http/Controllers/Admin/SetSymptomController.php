<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Disease;
use App\model\admin\Disease_Sysmtom;
use App\model\admin\Sysmtom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetSymptomController extends Controller
{
    public function index($id){

        $symptoms = Sysmtom::orderBy('id','desc')->get();
        $disease= Disease::all();
        $disease_symptoms = Disease_Sysmtom::where('disease_id',$id)->orderBy('id','desc')->get();
        return view('admin.disease.set_symptom',compact('symptoms','disease_symptoms','id','disease'));
    }

    public function deleteSymptom($id){
        Disease_Sysmtom::where('id',$id)->delete();
        return back()->with('success','Symptom is removed.');
    }

    public function updateSymptom(Request $request, $id){
        $keys = [];
        foreach ($request->all() as  $key => $req){
            $keys[] = $key;
        }
        unset($keys[0]);
        unset($keys[1]);
        foreach ($keys as $k){
            if(strpos($k,"electSymptom")){
                $tid = explode('_',$k)[1];
                $test = Disease_Sysmtom::where('symptom_id',$tid)->where('disease_id',$id)->first();
                if(!$test){
                    $test = new Disease_Sysmtom();
                }
                $test->disease_id = $id;
                $test->symptom_id = $tid;
                $test->save();
            }
        }

        return back();
    }
}
