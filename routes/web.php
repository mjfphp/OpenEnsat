<?php




use TCG\Voyager\Models\Post;
use  \Illuminate\Support\Facades\Redis;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/facebook', ['as' => 'auth/facebook' , 'uses' => 'Auth\LoginController@redirectToProvider' ]);
Route::get('auth/facebook/callback', ['as' => 'auth/facebook/callback' , 'uses' => 'Auth\LoginController@handleProviderCallback' ]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['middleware' => ['isVerified']], function () {
    // …
});

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
  $r=Redis::incr('v');
  echo $r;
   /*  $c=\App\Comment::all();
   foreach ($c as $com)
       echo $com->comment." par ".$com->user()->name;
   */
});
Route::get('/s',function (){
   $p=Post::all();
   foreach ($p as $po){

       echo "<h1>".$po->title."</h1><br>";
       echo $po->body."<br>";
       echo "<img src=\"/storage/app/public/".$po->image."\" /> <br>";
   }

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
