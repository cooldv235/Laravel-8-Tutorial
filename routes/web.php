<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Models\Profiles;
use App\Models\User;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', function () {
    $user = User::find(1);
    $profile = new Profiles;
    $profile->address = "New Delhi";

    // SAVE FROM ONE TO ONE RELATIONSHIP IN USER
    $user->profiles()->save($profile);

    // TO RETURN A PROPERTY OF THE USER 
    // return $user->profile
    // return $user->profile->address
});

Route::get('/get-user',function(){
    // ONE TO ONE INVERSE RELATIONSHIP
    return Profiles::find(1)->user;
});

// EXAMPLE ROUTE
// Route::get('/test-route',function(){
//     return "This is a Test Route";
// });

// EXAMPLE ROUTE TO A TEST CONTROLLER
// SENDS REQUEST TO TestController
Route::get('/test-controller',[TestController::class,'test'])->name('test-route');

// ROUTE TO A CONTROLLER FUNCTION THAT RETURNS A VIEW
Route::get('/test-view',[TestController::class,'view_test'])->name('test-view');

// ROUTE WITH PARAMETERS
// THIS TYPE OF ROUTE PASSES PARAMETER(S) = {Param(s)} TO THE CONTROLLER FUNCTION
Route::get('/test-param/{msg}',[TestController::class,'params_test']);

// ROUTE GROUP
// IF YOU HAVE ROUTES LIKE THESE
// Route::get('/account/register',[TestController::class,'register']);
// Route::get('/account/login',[TestController::class,'login']);
// YOU CAN GROUP THEM UNDER ONE NAME TO AVOID REPETITIONS
Route::group(['prefix' => 'account'],function(){
    Route::get('/register',[TestController::class,'register']);
    Route::get('login',[TestController::class,'login']);
});

// ROUTE TO A CONTROLLER FUNCTION THAT PASSES DATA TO A VIEW
// Route::group(['prefix' => 'test-controller'],function(){
//     Route::get('pass-data/{data}',[TestController::class,'pass_data']);
//     Route::get('products',[TestController::class,'products']);
// });

Route::get('products/',[TestController::class,'products']);

// ROUTES TO A CONTROLLER FUNCTION TO SUBMIT A FORM
Route::group(['prefix' => 'test-submit'],function(){
    Route::get('create',[TestController::class,'create']);
    Route::post('store',[TestController::class,'store'])->name('store');
});


// POST ROUTES
Route::get('posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('posts',[PostController::class,'index'])->name('posts.index');
Route::get('posts/many',[PostController::class,'many'])->name('posts.many');
Route::get('post/{id}',[PostController::class,'show'])->name('post.show');
Route::get('post/update/{id}',[PostController::class,'update']);
Route::get('post/delete/{id}',[PostController::class,'destroy']);
Route::get('post/show/{id}',[PostController::class,'getPost']);






































