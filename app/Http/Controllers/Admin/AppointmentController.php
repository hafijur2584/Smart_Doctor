<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Apoentment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Apoentment::orderBy('id','desc')->get();
        return view('admin.appointment.list',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'doctor_name' => 'required',
            'availability' => 'required',
            'hospital_name' => 'required',
            'user_name' => 'required',
            'user_email' => 'required',
            'user_id' => 'required',
            'doctor_id' => 'required'
        ]);
        $appointment = new Apoentment();
        $appointment->doctor_name = $request->doctor_name;
        $appointment->availability = $request->availability;
        $appointment->hospital_name = $request->hospital_name;
        $appointment->user_name = $request->user_name;
        $appointment->user_email = $request->user_email;
        $appointment->user_id = $request->user_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->code = $val = rand(100000,200000);
        $appointment->save();
        return redirect(route('homepage'))->with('success','Appointment Successfully. Your Code is '.$val);
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
        //
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
        $delete = Apoentment::where('id',$id);
        $delete->delete();
        return redirect(route('admin.appointment.index'))->with('success','Appointment Delete Successfully.');
    }
}
