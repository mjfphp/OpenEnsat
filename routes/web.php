<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use TCG\Voyager\Models\Post;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/c',function(){
    $c=\App\Course::all();
    foreach ($c as $cs){
        echo $cs->title." : <br> mes postes : <br>";
       foreach ($cs->posts() as $p){
         echo   $p->title;
       }
    }
});
Route::get('/s',function (){
   $p=Post::all()->where('course_id','=',1);
   foreach ($p as $po){
       echo $po->title;
   }

});

