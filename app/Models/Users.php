<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers(){
        $users = DB::select('select * from users');

        return $users;
    }

    public function addUser($data){
        DB::insert('insert into users (name, email) values (?, ?)', $data);
    }

    public function getDetails($id){
        return DB::select('select * from '.$this->table.' where id = ?', [$id]);
    }

    public function editUser($data){
        DB::update('update users set name=?, email=? where id = ?', $data);
    }

    public function deleteUser($id){
        return DB::delete('delete from users where id = ?', [$id]);
    }
}
