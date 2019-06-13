<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Hospital;
use App\model\admin\HospitalService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin.hospital.list',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hospital.create');
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
            'address' => 'required',
            'logo' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'images' => 'required'
        ]);
        $hospital = new Hospital();
        $hospital->name = $request->name;
        $hospital->title = $request->title;
        $hospital->address = $request->address;
        $hospital->description = $request->description;
        $hospital->discount = $request->discount;
        $hospital->slug = $request->slug;

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $hospital ->logo = $filename;
        }
        //save for image
        if($request->hasFile('images')){
            $image = $request->file('images');
            $filename = 'hbd'.time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $hospital ->images = $filename;
        }

        $hospital->save();

        foreach ($request->group_a as $ser){
            if (isset($ser['service'])){
                $service = new HospitalService();
                $service->service = $ser['service'];
                $service->hospital_id = $hospital->id;
                $service->save();
            }

        }
        return redirect(route('admin.hospitals.index'))->with('success','Hospital Created Successfully.');
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
        $hospital = Hospital::find($id);
        if(strlen($hospital->logo) > 5 && file_exists(base_path().'/public/images/'.$hospital->logo)) {
            unlink(base_path().'/public/images/'.$hospital->logo);
        }
        if(strlen($hospital->images) > 5 && file_exists(base_path().'/public/images/'.$hospital->images)) {
            unlink(base_path().'/public/images/'.$hospital->images);
        }
        $hospital->delete();
        $hospital_service = HospitalService::where('hospital_id',$hospital->id)->get();
        foreach($hospital_service as $service){
            $service->delete();
    }

        return redirect(route('admin.hospitals.index'))->with('success','Deleted Successfully!!');
    }
}
