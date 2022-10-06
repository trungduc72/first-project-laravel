<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Accounts extends Model
{
    use HasFactory;

    public function addAccount($data){
        DB::insert('insert into accounts (username, password, phone) values (?, ?, ?)', $data);
    }
}
