<?php




use TCG\Voyager\Models\Post;
use  \Illuminate\Support\Facades\Redis;
use App\Comment;
use Illuminate\Support\Facades\Input;


Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category');
Route::get('course/{id}', 'HomeController@course');
Route::get('post/{id}', 'HomeController@post');
Route::post('post/{id}', 'HomeController@comment');
Route::delete('post/{post}/{id}', function($post,$id){
  Comment::destroy($id);
  return Redirect::to("/post/".$post);
});

Route::put('post/{post}/{id}', function($post,$id){
  $comment = Comment::find($id);
  $comment->comment = Input::get('text');
  $comment->save();
  return Redirect::to("/post/".$post);
});

Route::get('login/facebook','Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback' );

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['middleware' => ['isVerified']], function () {
    // …
});
Route::get('/welcome',function (){
    return view('welcome');
})->name('welcome');
Route::get('/verify/{token}','VerifyController@verify')->name('verify');

Route::get('/c',function(){
   /* $c=\App\Course::all();
    foreach ($c as $cs){
        echo $cs->title." : <br> mes postes : <br>";
       foreach ($cs->posts() as $p){
         echo   "post : ".$p->title."<br>";
         echo "comments : <br>";
         foreach ($p->comments() as $com){
             echo "comment : ";
             echo $com->comment." ";
             foreach ($com->user() as $u){
                 echo "it is ok ";
                 echo "commenteur : ".$u->name;
             }
         }
       }
       echo "<br>";
    } */
 $c=\App\Course::all();
    foreach ($c as $cs) {
        echo $cs->category_id ."  <br> ";
    }
    echo "Selon Categories : <br>";
    $i=0;
    $css=\App\Course::all()->where('category_id','=',4);
    foreach ($css as $cs) {
        echo $cs->categoy_id . " : <br> ";
        $i++;
        echo $cs->posts()->count();
    }
    echo $i;


});

Route::get('/s',function (){
   $p=Post::all();
   foreach ($p as $po){

       echo "<h1>".$po->title."</h1><br>";
       echo $po->body."<br>";
       echo "<img src=\"/storage/app/public/".$po->image."\" /> <br>";
   }

});

Route::get('/cs',function (){
    $c=\TCG\Voyager\Models\Category::Where('id','=',3);
    foreach ($c->courses() as $cs)
    {
        echo $cs->title."<br>";
    }
});
