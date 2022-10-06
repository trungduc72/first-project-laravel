<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Users;

class UsersController extends Controller
{
    private $user;
    public function __construct(){
        $this->user = new Users();
    }   
        
    public function index(){
        $title = 'Users list';

        $user = new Users();
        $users = $user->getAllUsers();
        
        return view('clients.users.list', compact('users', 'title'));
    }

    public function addUser(){
        $title = 'Add User';

        return view('clients.users.add', compact('title'));
    }

    public function postAddUser(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email'
        ], 
        // [
        //     'name.required' => 'Insert your name',
        //     'name.min' => 'Too short',
        //     'email.required' => 'Insert your email',
        //     'email.email' => 'Enter the correct email'
        // ]
    );

        $dataInsert = [
            $request->name,
            $request->email
        ];

        $user = new Users();
        // dd($dataInsert);
        $this->user->addUser($dataInsert);

        // DB::insert('insert into users (name, email) values(?, ?)', $dataInsert);

        return redirect()->route('users')->with('msg', 'Done');
    }

    public function editUser($id=0){
        $title = 'Edit User';

        if(!empty($id)){
            $userDetail = $this->user->getDetails($id); 
            
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
            }
            else{
            return redirect()->route('clients.users.list');
            }
        }else{
            return redirect()->route('clients.users.list');
        }

        return view('clients.users.edit', compact('title', 'userDetail'));
    }

    public function postEditUser(Request $request, $id=0){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email'
        ], [
            'name.required' => 'Insert your name',
            'name.min' => 'Too short',
            'email.required' => 'Insert your email',
            'email.email' => 'Enter the correct email'
        ]);

        $dataUpdate = [
            $request->name,
            $request->email
        ];

        $dataUpdate = array_merge($dataUpdate, [$id]);

        $this->user->editUser($dataUpdate);

        // DB::update('update users set name=?, email=? where id = ?', $dataUpdate);

        return back()->with('msg', 'Done');
    }

    public function delete($id=0 ){
        if(!empty($id)){
            $userDetail = $this->user->deleteUser($id);
            
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
            }
            else{
            // return redirect()->route('users');
            }
        }else{
            // return redirect()->route('users');
        }

        return redirect()->route('users')->with('msg', 'Done');
    }
}
