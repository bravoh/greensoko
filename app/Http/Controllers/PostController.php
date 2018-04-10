<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->isMethod('post')){
            $p = new Post();
            $p->name = $request->name;
            $p->category = $request->category;
            $p->details = $request->details;
            $p->user_id = Auth::user()->id;
            $p->price = $request->price;
            $p->location = $request->location;
            if (Auth::user()->admin){
                $p->approved = true;
            }
            $p->save();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $p->image = \Storage::disk('uploads')->put('posts', $image);
                $p->update();
            }
            $msg = 'Post Saved';
            return back()->with($msg);
        }
        $cats = Category::all();
        return view('post',compact('cats'));
    }

    public function myposts(){
        $posts = Post::whereUser_id(Auth::user()->id)->get();
        return view('myposts',compact('posts'));
    }

}
