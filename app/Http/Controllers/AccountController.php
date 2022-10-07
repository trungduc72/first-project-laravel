<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use Auth;

class AccountController extends Controller
{
    private $account;
    public function __construct(){
        $this->account = new Accounts();
    }  

    public function showFormRegister(){
        $title= 'Register';

        return view('clients.account.register', compact('title'));
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required | min:5',
            'c-password' => 'required | min:5',
            'phone' => 'required'
        ]);
        
        $dataInsert = [
            $request->username,
            bcrypt($request->password),
            $request->phone
        ];

        $this->account->addAccount($dataInsert);

        // $acc = new Accounts();
        // $acc->username = $request->username;            
        // $acc->password = bcrypt($request->password);            
        // $acc->phone = $request->phone;            

        // $acc->save();    

        return redirect()->route('login');
    }

    public function showFormLogin(){
        $title= 'Login';

        return view('clients.account.login', compact('title'));
    }

    public function postLogin(Request $request){
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        $array = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($array)){
            return redirect()->route('users');
        }
        else return redirect()->route('login');
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('home');
    }
}
