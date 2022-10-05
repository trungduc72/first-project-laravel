<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(){

    }

    // Hien thi - Get
    public function index(){
        return view('clients/categories/list');
    }

    //Lay 1 chuyen muc-category theo id - Get
    public function getCategory($id){
        return view('clients/categories/edit');
    }

    //Sua 1 chuyen muc - Post
    public function updateCategory($id){
        return 'Submit sua chuyen muc: '.$id;
    }

    //Show form them du lieu - Post
    public function addCategory(){        
        return view('clients/categories/add');
    }

    //Them du lieu vao chuyen muc - Post
    public function handleAddCategory(){
        return 'Submit them chuyen muc';
    }

    //Xoa du lieu - Delete
    public function deleteCategory(){
        return 'Submit xoa chuyen muc';
    }
}
