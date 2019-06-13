<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Disease;
use App\model\admin\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        $diseases = Disease::all();
        return view('admin.medicine.list',compact('medicines','diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diseases = Disease::all();
        return view('admin.medicine.create',compact('diseases'));
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
            'name' => 'required',
            'company' => 'required',
            'disease_id' => 'required'
        ]);
        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->company = $request->company;
        $medicine->disease_id = $request->disease_id;
        $medicine->save();

        return redirect(route('admin.medicine.index'))->with('success','Medicine Added Successfully.');

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
        $medicine = Medicine::where('id',$id)->firstOrfail();
        $diseases = Disease::all();
        return view('admin.medicine.update',compact('medicine','diseases'));
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
        $this->validate($request,[
            'name' => 'required',
            'company' => 'required',
            'disease_id' => 'required'
        ]);
        $medicine = Medicine::where('id',$id)->firstOrfail();
        $medicine->name = $request->name;
        $medicine->company = $request->company;
        $medicine->disease_id = $request->disease_id;
        $medicine->save();
        return redirect(route('admin.medicine.index'))->with('success','Medicine Updated Successfully.');
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
