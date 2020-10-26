<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


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
//     return view('frontend/index');
// });


//Route::resource('categories', 'CategoryController');

//resource binding
Route::resources([
    'categories' => 'CategoryController',
    'posts' => 'PostController',
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//frontend controller
Route::get('/','FrontendController@index');
Route::get('/frontend','FrontendController@index');
Route::get('/frontend/{id}','FrontendController@show');
Route::get('/frontend/categoryposts/{id}','FrontendController@showcategoryposts');
Route::post('/frontend/getsearch','FrontendController@getsearch');

