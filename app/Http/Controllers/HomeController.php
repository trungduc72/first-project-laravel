<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    public $data= [];
    public function index(){
        $title = 'Home';
        $users = DB::select('SELECT * FROM users');
        // dd($users);

        return view('clients.blocks.home', compact('title'));
    }
}
