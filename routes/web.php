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

Route::group(['middleware' => ['web']], function (){

    /* BLOG */

    Route::get('/', 'BlogController@index');

    Route::get('/blog/{id}', 'BlogController@post_unique')->where('id', '[0-9]+');

    Route::get('/categorie/{id}', 'CategorieController@categorie_unique')->where('id', '[0-9]+');

    Route::get('/nouveau', 'BlogController@nouveau_blog')->middleware('auth');
    Route::post('/creation', 'BlogController@creation_blog');

    Route::get('/edition/{id}', 'BlogController@edition_post')->middleware('auth')->where('id', '[0-9]+');
    Route::put('/edit/{id}', 'BlogController@edition_valider');

    Route::get('/suppression/{id}', 'BlogController@suppression_post')->where('id', '[0-9]+');

    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    /* USER */

    Route::get('/user/', 'UserController@index')->middleware('auth', 'perm');

    Route::get('/user/nouveau', 'UserController@nouveau_user')->middleware('auth', 'perm');
    Route::post('/user/creation', 'UserController@creation_user');

    Route::get('/user/edition/{id}', 'UserController@edition_user')->middleware('auth', 'perm')->where('id', '[0-9]+');
    Route::put('/user/edit/{id}', 'UserController@edition_valid_user');

    Route::get('/user/suppression/{id}', 'UserController@suppression_user')->where('id', '[0-9]+');
});
