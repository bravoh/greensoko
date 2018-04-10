<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
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

    public function index(){
        $cats = Category::all();
        $users = User::all();
        $posts = Post::all();
        return view('admin',compact('cats','users','posts'));
    }

    public function category(Request $request){
        $c = new Category();
        $c->name = $request->name;
        $c->save();
        $msg = 'Category Created';
        return back()->with($msg);
    }
}
