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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/about/{name}',function($name){
    return 'name is '.$name;
});

Route::resource('posts', 'PostsController');
Route::resource('articles', 'ArticlesController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/email', 'MailController@email')->name('SendEmail');

//Comment Route
Route::resource('comments', 'CommentsController');

//AutoComplete Route
Route::any('/categorysearch', 'AutocompleteController@CategorySearch');

