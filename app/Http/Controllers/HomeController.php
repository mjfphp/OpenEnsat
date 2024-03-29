<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use App\Course;
use App\Comment;

use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\User;

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

            ->with('cours',Course::all());
    }

    public function category($id){
        return view('home')
            ->with('cours',Course::all()->where('category_id','=',$id));
    }

    public function course($id){
        return view('posts')->withCour(Course::Where('id','=',$id)->first());
    }

    public function post($id){
        $post = Post::Where('id','=',$id)->first();
        $postOwner = User::Where('id','=',$post->author_id)->first();
        $categories = Category::all();
        $commentsNumber = $post->comments()->count();
        $comments = $post->comments();
        return view('post')
            ->with([
              'post' => $post,
              'postOwner' => $postOwner,
              'commentsNumber' => $commentsNumber,
              'comments' => $comments
            ])
            ->with('coursp',Course::inRandomOrder()->take(5)->get());

    }

    public function comment($id){

        $comment = new Comment;
        $comment->comment   = Input::get('text');
        $comment->user_id   = Input::get('user_id');
        $comment->posts_id  = $id;
        $comment->save();

        return $this->post($id);
    }
}
