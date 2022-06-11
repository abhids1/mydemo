<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;

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




// Route::group( [ 'prefix' => 'admin','as' => 'admin' ,'middleware' => ['admin:1','auth']], function(){
//     die("test");
//     Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
//     Route::group(['prefix'=>'users','as'=>'users'], function(){
//         Route::get('create', [UsersController::class, 'create']);
//         Route::post('store', [UsersController::class, 'create'])->name('user.store');;
//     });
// });

// Route::prefix('/admin')->group(function(){
//     die("admin");
// });
//Route::get('products', [ProductController::class, 'index'])->name('products.index');
//Route::get('/products/getProducts',[ProductController::class,'getProducts'])->name('products.getProducts');
//Route::get('products/create-step-one', [ProductController::class,'createStepOne'])->name('products.create.step.one');
//Route::post('products/create-step-one', [ProductController::class,'postCreateStepOne'])->name('products.create.step.one.post');
//Route::get('products/create-step-two', [ProductController::class,'createStepTwo'])->name('products.create.step.two');
//Route::post('products/create-step-two', [ProductController::class,'postCreateStepTwo'])->name('products.create.step.two.post');
//Route::get('products/create-step-three', [ProductController::class,'createStepThree'])->name('products.create.step.three');
//Route::post('products/create-step-three', [ProductController::class,'postCreateStepThree'])->name('products.create.step.three.post');

Route::group(['as' => 'admin.', 'prefix' => 'admin','middleware' => ['admin:1','auth']], function () {
    Route::get('home', [HomeController::class, 'adminHome']);
    Route::group(['prefix'=>'users','as'=>'users.'], function(){
        Route::get('/', [UsersController::class, 'index']);
        Route::get('create', [UsersController::class, 'create']);
        Route::get('edit/{id}', [UsersController::class, 'edit']);
        Route::post('update/{id}', [UsersController::class, 'update']);
        Route::post('store', [UsersController::class, 'store']);        
        Route::get('form', [UsersController::class, 'form']);        
        Route::post('form', [UsersController::class, 'formSubmit'])->name('formSubmit');        
    });   
    Route::group(['prefix'=>'products','as'=>'products.'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('index'); 
        Route::get('/index_yajra', [ProductController::class, 'index_yajra']); 
        Route::get('getProducts',[ProductController::class,'getProducts'])->name('list');     
        Route::get('view_details/{id}',[ProductController::class,'view_details']);     
        //Route::get('create-step-one', [ProductController::class,'createStepOne'])->name('stepone'); 
    });  
});

Route::get('/', function () {    
   // die("fdd");
    return view('welcome');
});






// Route::middleware(['auth', 'admin:0'])->group(function () {
//     Route::get('/index', [HomeController::class, 'index'])->name('user.home');
// });

require __DIR__.'/auth.php';
