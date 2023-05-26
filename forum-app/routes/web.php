<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home',function(){
// return view('home.index', ['name' => 'Lavron Jahms']);
// return view('Home');
// if(View::exists('home.home')){
//     return view('home.index');
// }else{
//     return 'not Found'
// }
// return view('home.index', ['name' => 'Lavron Jahms']);
// });

//Done
Route::get('/', function () {
    return view('home.home');
});
Route::get('/halo', function () {
    return view('welcome');
});

//Forms
Route::get('/form', [PostController::class, 'form'])->name('form')->middleware('auth');
Route::get('/posts/{id?}', [PostController::class, 'post'])->name('posts')->middleware('auth');
Route::post('/addTopic', [PostController::class, 'addTopic'])->name('addTopic')->middleware('auth');
Route::post('/addReply', [ReplyController::class, 'addReply'])->middleware('auth');
Route::get('/deletePost/{id}', [PostController::class, 'deletePost'])->middleware('auth')->name('deletePost');
Route::get('updatePostForm/{id}', [PostController::class, 'updatePostForm'])->middleware('auth');
Route::post('updatePost/{id}', [PostController::class, 'updatePost'])->middleware('auth');
Route::get('updateReplyForm/{id}', [ReplyController::class, 'updateReplyForm'])->middleware('auth');
Route::post('updateReply/{id}', [ReplyController::class, 'updateReply'])->middleware('auth');
Route::get('deleteReply/{id}', [ReplyController::class, 'deleteReply'])->middleware('auth');


// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-auth', [LoginController::class, 'authenticate'])->name('login-auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Registration
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-user', [LoginController::class, 'registerUser'])->name('register-user');
