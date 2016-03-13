<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Validator;
use App\Http\Requests;
use File;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'content' => 'required',
            'image_url' =>'required|mimes:jpeg,bmp,png'
        ]);
    }

    public function index()
    {
        $posts = App\Post::all()->reverse();
        return view('post.home', ['posts' => $posts]);
    }

    public function getNewPost(){
        return view('post.new');
    }
    public function postNewPost(Request $request){
       $validator = $this->validator($request->all());

        if ($validator->fails()){
            return redirect('posts/new')->withErrors($validator);
        } else {
            $ext = $request->file('image_url')->getClientOriginalExtension();
            $filename =$request->input('title').'_'.time().'.'.$ext;
            $destination = "uploads/";
            // $request->file('image_url')->move($destination);
            $request->file('image_url')->move($destination, $filename);
            $post = new App\Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->user_id = $request->user()->id;
            $post->image_url = $destination.$filename;

            if ($post->save()){
                return redirect('posts/new')->with('status','Successfully Posted');
            } else {
                abort(500);
            }
        }
    }
}
