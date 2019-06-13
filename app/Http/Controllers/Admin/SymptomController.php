<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Sysmtom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symptoms = Sysmtom::orderBy('id','desc')->get();
        return view('admin.symptom.list',compact('symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.symptom.create');
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
            'symptom' => 'required'
        ]);
        $symptom = new Sysmtom();
        $symptom->symptom = $request->symptom;
        $symptom->save();

        return redirect(route('admin.symptom.index'))->with('success','symptom Created Successfully.');

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
        $symptom = Sysmtom::where('id',$id)->firstOrfail();
        return view('admin.symptom.update',compact('symptom'));
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
            'symptom' => 'required'
        ]);
        $symptom = Sysmtom::where('id',$id)->firstOrfail();
        $symptom->symptom = $request->symptom;
        $symptom->save();

        return redirect(route('admin.symptom.index'))->with('success','symptom Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $symptom = Sysmtom::where('id',$id);
        $symptom->delete();
        return redirect(route('admin.symptom.index'))->with('success','Deleted Successfully!!');
    }
}
