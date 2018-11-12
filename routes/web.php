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

Route::get('/', 'BlogController@index');

Route::get('/blog/{id}', 'BlogController@post_unique')->where('id', '[0-9]+');

Route::get('/categorie/{id}', 'CategorieController@categorie_unique')->where('id', '[0-9]+');

Route::get('ounoustrouver',function(){
   return "Ceci est la page ou nous trouver";
});

Route::get('utilisateur/{id}', function ($id){
    return 'Utilisateur n°' . $id;
})->where('id', '[0-9]+');


Route::group(['middleware' => ['web']], function (){

    Route::get('/nouveau', 'BlogController@nouveau_blog');
    Route::post('/creation', 'BlogController@creation_blog');

});