<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;

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
        
        $dataInsert = [
            $request->username,
            bcrypt($request->password),
            $request->phone
        ];

        $this->account->addAccount($dataInsert);

        // $this->account->username = $request->username;            
        // $this->account->password = bcrypt($request->password);            
        // $this->account->phone = $request->phone;            

        // $this->account->save();    

        return redirect()->route('login');
    }

    public function showFormLogin(){
        $title= 'Login';

        return view('clients.account.login', compact('title'));
    }
}
