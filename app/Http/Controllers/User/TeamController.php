<?php

namespace App\Http\Controllers\User;

use App\model\admin\team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index(){
        $teams = team::limit(3)->get();
//        $products = Product::orderBy('id','desc')->limit(5)->get();
        return view('user.team',compact('teams'));
    }
}
