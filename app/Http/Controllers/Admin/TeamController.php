<?php

namespace App\Http\Controllers\Admin;

use App\model\admin\team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = team::all();
        return view('admin.team.list',compact('teams'));
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
        //
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
        $team = team::where('id',$id)->firstOrfail();
        return view('admin.team.update',compact('team'));
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
//        dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'institution' => 'required',
            'fb' => 'required',
            'tw' => 'required',
            'lin' => 'required'
        ]);
        $team = team::where('id',$id)->firstOrfail();
        $team->name = $request->name;
        $team->title = $request->title;
        $team->description = $request->description;
        $team->institution = $request->institution;
        $team->fb = $request->fb;
        $team->tw = $request->tw;
        $team->lin = $request->lin;

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = 'sd' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images');
//            dd($location);
            //add new photo
            $image->move($location, $filename);
            $location = public_path('images/' . $filename);
            Image::make($location)->fit(380, 380)->save($location);


            if (strlen($team->images) > 5 && file_exists(base_path() . '/public/images/' . $team->images)) {
                unlink(base_path() . '/public/images/' . $team->images);
            }

            $team->images = $filename;
        }
        $team->save();
        return redirect(route('admin.team.index'))->with('success','Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
