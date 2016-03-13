<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use App;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'content' => 'required',
            'image_url' =>'mimes:jpeg,bmp,png'
        ]);
    }

    public function index(){
      $posts = App\Post::all()->reverse();
      return view('admin.home', ['posts' => $posts]);
    }

    public function removePost($id){
      if(App\Post::destroy($id)){
          return redirect('admin')->with('status', 'You have successfully removed post.');
      }

      abort('500');

    }

    public function getEditPost($id){
      $post = App\Post::find($id);
      return view('admin.edit', ['post' => $post]);
    }

    public function postEditPost($id , Request $request){
       $validator = $this->validator($request->all());

        if ($validator->fails()){
            return redirect('admin/edit/'.$id)->withErrors($validator);
        } else {
            $post = App\Post::find($id);
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->user_id = $request->user()->id;

            if(!empty($request->file('image_url'))){
              unlink($post->image_url);
              $ext = $request->file('image_url')->getClientOriginalExtension();
              $filename =$request->input('title').'_'.time().'.'.$ext;
              $destination = "uploads/";
              // $request->file('image_url')->move($destination);
              $request->file('image_url')->move($destination, $filename);
              $post->image_url = $destination.$filename;

            }

            if ($post->save()){
                return redirect('admin/edit/'.$id)->with('status','Successfully Edited');
            } else {
                abort(500);
            }
        }
    }
}
