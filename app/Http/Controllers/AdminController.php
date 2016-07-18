<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Category;
use Validator;
use App;
use App\Http\Controllers\Controller;
use DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

      $categories = DB::table('categories')->get();
      return view('admin.home', ['categories' => $categories]);
    }

    public function newCategory(){
      return view('admin.newCategory');
    }

    public function saveNewCategory(Request $request){
      $validator = Validator::make($request->all(), [
        'title' => 'required'
      ]);
      if($validator->fails()){
        return redirect('/admin/new-category')->withInput()->withErrors($validator);
      }
      $Category = new Category();
      $Category->saveCategory($request->all());

      return redirect('/admin');

    }

    public function newPicture(){
      return view('admin.newPicture');
    }

    public function saveNewPicture(){

    }
}
