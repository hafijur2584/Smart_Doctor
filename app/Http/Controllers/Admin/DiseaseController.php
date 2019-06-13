<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Disease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::all();
        return view('admin.disease.list',compact('diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disease.create');
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
            'name' => 'required'
        ]);
        $disease = new Disease();
        $disease->name = $request->name;
        $disease->save();
        return redirect(route('admin.disease.index'))->with('success','Disease Created Successfully.');
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
        $disease = Disease::where('id',$id)->firstOrfail();
        return view('admin.disease.update',compact('disease'));
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
            'name' => 'required'
        ]);
        $disease = Disease::where('id',$id)->firstOrfail();
        $disease->name = $request->name;
        $disease->save();
        return redirect(route('admin.disease.index'))->with('success','Disease Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disease = Disease::where('id',$id)->firstOrfail();
        $disease->delete();
        return redirect(route('admin.disease.index'))->with('success','Deleted Updated Successfully.');
    }
}
