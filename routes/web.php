<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ArticleController@allArticles');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


// User List
Route::prefix('admin')->group(function () {
    // dashboard
    Route::get('/users/lists', 'User\UserController@index')->middleware('is_super_admin');

    Route::get('/users/create', 'User\UserController@create')->middleware('is_super_admin');
    Route::get('/users/show/{id?}', 'User\UserController@show')->middleware('is_super_admin');
    Route::post('/users/store/{id?}', 'User\UserController@store')->middleware('is_super_admin');
    Route::get('/users/delete/{id?}', 'User\UserController@destroy')->middleware('is_super_admin');
    ////
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('/category/create', 'CategoryController@create')->name('category/create');
    Route::get('/category/show/{id?}', 'CategoryController@show')->name('category/show');
    Route::post('/category/store/{id?}', 'CategoryController@store')->name('category/store');
    Route::get('/category/delete/{id?}', 'CategoryController@destroy')->name('category/delete');
    ////
    Route::get('/articles/published', 'ArticleController@published')->name('articles/published');
    Route::get('/articles/publish/{id?}', 'ArticleController@makePubish')->name('admin/articles/publish');

    Route::get('/articles', 'ArticleController@index')->name('articles');
    Route::get('/articles/create', 'ArticleController@create')->name('articles/create');
    Route::get('/articles/show/{id?}', 'ArticleController@show')->name('articles/show');
    Route::post('/articles/store/{id?}', 'ArticleController@store')->name('articles/store');
    Route::get('/articles/delete/{id?}', 'ArticleController@destroy')->name('articles/delete');
    // content
    // Role
    Route::get('/role/lists', 'RoleController@index')->name('role/lists');

});


Route::get('/all/articles', 'ArticleController@allArticles')->name('/');
Route::get('/articles/entertainments', 'ArticleController@entertainment')->name('articles/entertainments');
Route::get('/articles/sports', 'ArticleController@sports')->name('articles/sports');
Route::get('/articles/technologies', 'ArticleController@technology')->name('articles/technologies');
Route::get('/articles/socials', 'ArticleController@social')->name('articles/socials');

// view detail
Route::get('view/article/detail/{id?}', 'ArticleController@getArticle_detail')->name('view/article/detail');
// Search Article
Route::any('articles/search', 'ArticleController@searchArticle')->name('view/article/lists');

Route::get('error/403', function () {
    return view('errors.error');
});
