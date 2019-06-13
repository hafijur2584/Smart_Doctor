<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('admin.work.list',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work.create');
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
            'title' => 'required',
            'number' => 'required',
            'description' => 'required',
            'images' => 'required'
        ]);

        $work = new Work();
        $work->title = $request->title;
        $work->number = $request->number;
        $work->description = $request->description;
        if($request->hasFile('images')){
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $work ->images = $filename;
        }
        $work->save();
        return redirect(route('admin.work.index'))->with('success','Created Successfully.');
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
        $work = Work::where('id',$id)->firstOrfail();
        return view('admin.work.update',compact('work'));
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
            'title' => 'required',
            'number' => 'required',
            'description' => 'required'
        ]);
        $work = Work::where('id',$id)->firstOrfail();
        $work->title = $request->title;
        $work->number = $request->number;
        $work->description = $request->description;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = 'sd' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images');
//            dd($location);
            //add new photo
            $image->move($location, $filename);
            $location = public_path('images/' . $filename);
            Image::make($location)->fit(380, 380)->save($location);


            if (strlen($work->images) > 5 && file_exists(base_path() . '/public/images/' . $work->images)) {
                unlink(base_path() . '/public/images/' . $work->images);
            }

            $work->images = $filename;
        }
        $work->save();
        return redirect(route('admin.work.index'))->with('success','Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::where('id',$id)->firstOrfail();
        if(strlen($work->images) > 5 && file_exists(base_path().'/public/images/'.$work->images)) {
            unlink(base_path().'/public/images/'.$work->images);
        }
        $work->delete();
        return redirect(route('admin.work.index'))->with('success','Deleted Successfully!!');
    }
}
