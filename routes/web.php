<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\mailsendController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserController;
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




Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ContactUs
Route::get('/ContactUs', [mailsendController::class, 'create'])->name('ContactUs');
Route::post('receiveContact',[mailsendController::class, 'received'])->name('receiveContact');
Route::post('',[mailsendController::class, 'show'])->name('');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');




Route::group(['prefix' => 'Dashboard','middleware' => ['verified']], function () {
    Route::group(
        ['prefix' => 'Cars',], function () {
        Route::get('car-index', [CarController::class, 'index'])->name('car-index');
        Route::get('AddCar', [CarController::class, 'create'])->name('AddCar');
        Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');
        Route::get('CarDetails/{id}', [CarController::class, 'show'])->name('CarDetails');
        Route::get('editCar/{id}', [CarController::class, 'edit'])->name('editCar');
        Route::put('/UpdateCar/{id}', [CarController::class, 'update'])->name('UpdateCar');
        Route::get('delete-Cars/{id}', [CarController::class, 'destroy'])->name('delete-Cars');
    });
    Route::group(
        ['prefix' => 'Categories',], function () {
        Route::get('Categories-index', [CategoryController::class, 'index'])->name('Categories');
        Route::get('AddCategory', [CategoryController::class, 'create'])->name('AddCategory');
        Route::post('storeCategory',[CategoryController::class, 'store'])->name('storeCategory');
        Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
        Route::put('/UpdateCategory/{id}', [CategoryController::class, 'update'])->name('UpdateCategory');
        Route::get('/delete-Category/{categoryId}', [CategoryController::class, 'destroy'])->name('delete-Category');
       
    });

    Route::group(
        ['prefix' => 'Testimonials',], function () {
        Route::get('Testimonials-index', [TestimonialController::class, 'index'])->name('Testimonials-index');
        Route::get('AddTestimonials', [TestimonialController::class, 'create'])->name('AddTestimonials');
        Route::post('storeTestimonials',[TestimonialController::class, 'store'])->name('storeTestimonials');
        Route::get('/editTestimonials/{id}', [TestimonialController::class, 'edit'])->name('editTestimonials');
        Route::get('/TestimonialDetails/{id}', [TestimonialController::class, 'show'])->name('TestimonialDetails');
        Route::put('/UpdateTestimonials/{id}', [TestimonialController::class, 'update'])->name('UpdateTestimonials');
        Route::get('deleteTestimonials/{id}', [TestimonialController::class, 'destroy'])->name('deleteTestimonials');
    });
    Route::group(
        ['prefix' => 'Messages',], function () {
        Route::get('Messages', [mailsendController::class, 'index'])->name('Messages');
        Route::get('/showMessage/{id}', [mailsendController::class, 'show'])->name('showMessage');
        Route::get('deleteMessages/{id}', [mailsendController::class, 'destroy'])->name('deleteMessages');
    });
    Route::group(
        ['prefix' => 'Users',], function () {
        Route::get('Users', [UserController::class, 'index'])->name('Users');
        Route::get('AddUser', [UserController::class, 'create'])->name('AddUser');
        Route::post('storeUser',[UserController::class, 'store'])->name('storeUser');
        Route::get('UserDetails/{id}', [UserController::class, 'show'])->name('UserDetails');
        Route::get('editUser/{id}', [UserController::class, 'edit'])->name('editUser');
        Route::put('/UpdateUser/{id}', [UserController::class, 'update'])->name('UpdateUser');
        Route::get('deleteUser/{id}', [UserController::class, 'destroy'])->name('deleteUser');
    });


});



Route::group(['prefix' => 'Website','middleware' => ['verified']], function () {
    Route::group(
        ['prefix' => '',], function () {
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
Route::get('/index', [WebsiteController::class, 'index'])->name('index');
Route::get('/listing', [WebsiteController::class, 'listing'])->name('listing');
Route::get('/single', [WebsiteController::class, 'single'])->name('single');
Route::get('/testimonials', [WebsiteController::class, 'testimonials'])->name('testimonials');
 
   
});
});














// Route::get('Categories', [CategoryController::class, 'index'])->middleware('verified');





// Route::group(['prefix' => 'admin','middleware' => ['verified']], function () {
//     Route::group(
//         ['prefix' => 'testimonials',], function () {
//         Route::get('index', [TestimonialController::class, 'index'])->name('testimonials');
//         Route::get('create', [TestimonialController::class, 'create'])->name('createTestimonial');
//         Route::post('store', [TestimonialController::class, 'store'])->name('storeTestimonial');
//         Route::get('show/{id}', [TestimonialController::class, 'show'])->name('showTestimonial');
//         Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('editTestimonial');
//         Route::put('update/{id}', [TestimonialController::class, 'update'])->name('updateTestimonial');
//         Route::get('destroy/{id}', [TestimonialController::class, 'destroy'])->name('destroyTestimonial');
//     });
// });




