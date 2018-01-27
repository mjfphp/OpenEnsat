<?php

namespace App\Http\Controllers;

use App\Course;

use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home')

            ->with('cours',Course::all())
            ->with('categories',Category::all());
    }

    public function category($id){
      //  $id=decrypt($id);
        $categories=Category::all();
        return view('home')
            ->with('categories',$categories)
            ->with('cours',Course::Where('category_id','=',$id));
    }

    public function course($id){
        return view('posts')->withCour(Course::Where('id','=',$id)->first());
    }

    public function post($id){
        $p=Post::Where('id','=',$id)->first();
        return view('post')
            ->with('categories',Category::all());

    }
}
