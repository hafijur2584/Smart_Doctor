<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Doctor;
use App\model\admin\DoctorAvailability;
use App\model\admin\DoctorAward;
use App\model\admin\DoctorEducation;
use App\model\admin\DoctorWorkExperience;
use App\model\admin\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.list',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        return view('admin.doctor.create',compact('hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'hospital_id' => 'required',
            'name' => 'required',
            'images' => 'required',
            'title' => 'required',
            'email' => 'required',
            'specialist' => 'required',
            'qualification' => 'required',
            'description' => 'required',
        ]);
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->title = $request->title;
        $doctor->email = $request->email;
        $doctor->specialist = $request->specialist;
        $doctor->qualification = $request->qualification;
        $doctor->description = $request->description;
        $doctor->fb = $request->fb;
        $doctor->tw = $request->tw;
        $doctor->ins = $request->ins;
        $doctor->phone = $request->phone;
        $doctor->hospital_id = $request->hospital_id;
        //save for image
        if($request->hasFile('images')){
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $doctor ->images = $filename;
        }
        $doctor->save();

        foreach ($request->group_a as $av){
            $experience = new DoctorWorkExperience();
            $experience->doctor_id = $doctor->id;
            $experience->year = $av['year'];
            $experience->designation = $av['designation'];
            $experience->institution = $av['institution'];
            $experience->save();
        }

        foreach ($request->group_b as $av){
            $award = new DoctorAward();
            $award->doctor_id = $doctor->id;
            $award->year = $av['year'];
            $award->award = $av['award'];
            $award->institution = $av['institution'];
            $award->save();
        }
        foreach ($request->group_c as $av){
            $education = new DoctorEducation();
            $education->doctor_id = $doctor->id;
            $education->year = $av['year'];
            $education->certification = $av['certification'];
            $education->institution = $av['institution'];
            $education->save();
        }
        foreach ($request->group_d as $av){
            if(isset($av['day'])){
                if(isset($av['av_id'])){
                    if(!empty($av['av_id'])){
                        $availability = DoctorAvailability::where('id',$av['av_id'])->first();
                    } else {
                        $availability = new DoctorAvailability();
                    }
                } else {
                    $availability = new DoctorAvailability();
                }
                $availability->doctor_id = $doctor->id;
                $availability->day = $av['day'];
                $availability->from = $av['from'];
                $availability->to = $av['to'];
                $availability->save();
            }
        }

        return redirect(route('admin.doctor.index'))->with('success','Doctor Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospitals = Hospital::all();
        $doctor = Doctor::where('id',$id)->firstOrfail();
        return view('admin.doctor.update',compact('hospitals','doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
