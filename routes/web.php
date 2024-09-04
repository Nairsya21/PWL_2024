<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\PhotoController; 

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return 'Selamat Datang';
});
// Route::get('/hello', function () { 
//     return 'Hello World';
// });

Route::get('/world', function () { 
    return 'World';
});

Route::get('/about', function () {
    return '2241760076 -Nairsya Syauqi Ghasila';
});
Route::get('/user/{name}', function ($name) { 
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
    });
Route::get('/articles/{id}', function ($Idku) {
    return 'Halaman Artikel dengan ID '.$Idku;
    });
Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

    
Route::get('/home', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/articles/{id}', ArticleController::class);

Route::resource('photos', PhotoController::class); 

Route::resource('photos', PhotoController::class)->only([ 
    'index', 'show' 
    ]); 
    Route::resource('photos', PhotoController::class)->except([ 
    'create', 'store', 'update', 'destroy' 
    ]); 

    // Route::get('/greeting', function () { 
    //     return view('hello', ['name' => 'Sasa']); 
    //     }); 
    // Route::get('/greeting', function () { 
    //     return view('blog.hello', ['name' => 'Sasa']); 
    //     });
    Route::get('/greeting', [WelcomeController::class, 
    'greeting']); 


// Route untuk Halaman Home
Route::get('/home', [HomePageController::class, 'index']);

// Route dengan prefix /category untuk Halaman Products
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// Route dengan parameter untuk Halaman User
Route::get('/user/{id}/name/{name}', [UserController::class, 'showProfile']);

// Route untuk Halaman Penjualan
Route::get('/sales', [SalesController::class, 'index']);