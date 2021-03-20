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

//Clear route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/', function () {
    return view('website.home');
});
Route::get('/category', function () {
    return view('website.category');
});
Route::get('/category-list', function () {
    return view('website.category_list');
});
Route::get('/details', function () {
    return view('website.details');
});
// Route::get('/login', function () {
//     return view('website.login');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => 'admin'],function(){

	Route::get('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'login'])->name('admin.login.submit');
	Route::get('/logout', [App\Http\Controllers\AdminLogin\LoginController::class, 'logout'])->name('admin.logout');

	Route::post('/password/email', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
	Route::get('/password/reset', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
	Route::post('/password/reset', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

	Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/all-customer', [App\Http\Controllers\Admin\CustomerController::class, 'allcustomer']);
    Route::POST('/get-all-customer', [App\Http\Controllers\Admin\CustomerController::class, 'getallcustomer']);
    Route::get('/delete-customer/{id}/{status}', [App\Http\Controllers\Admin\CustomerController::class, 'deletecustomer']);


    Route::get('/post-ads', [App\Http\Controllers\Admin\PostController::class, 'postads']);
    Route::POST('/get-post-ads', [App\Http\Controllers\Admin\PostController::class, 'getpostads']);
    Route::get('/delete-post-ads/{id}/{status}', [App\Http\Controllers\Admin\PostController::class, 'deletepostads']);
	

    Route::get('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'changepassword']);
    Route::POST('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'updatechangepassword']);

    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings']);
    Route::POST('/update-settings', [App\Http\Controllers\Admin\SettingsController::class, 'updatesettings']);

    Route::get('/about-us', [App\Http\Controllers\Admin\SettingsController::class, 'aboutus']);
    Route::POST('/update-about-us', [App\Http\Controllers\Admin\SettingsController::class, 'updateaboutus']);


    //category
	Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'category']);
    Route::POST('/save-category', [App\Http\Controllers\Admin\CategoryController::class, 'savecategory']);
    Route::POST('/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'updatecategory']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editcategory']);
	Route::get('/delete-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletecategory']);


    //subcategory
	Route::get('/subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'subcategory']);
    Route::POST('/save-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'savesubcategory']);
    Route::POST('/update-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'updatesubcategory']);
    Route::get('/edit-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editsubcategory']);
	Route::get('/delete-subcategory/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletesubcategory']);
    
});



Route::group(['prefix' => 'customer'],function(){
	Route::get('/dashboard', [App\Http\Controllers\customerController::class, 'dashboard'])->name('customer.dashboard');

	Route::get('/profileSetting', [App\Http\Controllers\customerController::class, 'profileSetting'])->name('customer.profileSetting');

	Route::get('/my-ads', [App\Http\Controllers\User\PostController::class, 'myads']);

    //post-ads
    Route::get('/new-post-ads', [App\Http\Controllers\User\PostController::class, 'newpostads']);
    Route::POST('/save-post-ads', [App\Http\Controllers\User\PostController::class, 'savepostads']);
    Route::POST('/update-post-ads', [App\Http\Controllers\User\PostController::class, 'updatepostads']);
    Route::get('/edit-post-ads/{id}', [App\Http\Controllers\User\PostController::class, 'editpostads']);
    Route::get('/delete-post-ads/{id}/{status}', [App\Http\Controllers\User\PostController::class, 'deletepostads']);
    Route::get('/delete-post-image/{id}', [App\Http\Controllers\User\PostController::class, 'deletepostimge']);

	Route::get('/chat', [App\Http\Controllers\customerController::class, 'chat'])->name('customer.chat');

	Route::get('/packages', [App\Http\Controllers\customerController::class, 'packages'])->name('customer.packages');

	Route::get('/favorite', [App\Http\Controllers\customerController::class, 'favorite'])->name('customer.favorite');

	Route::get('/accountPrivacy', [App\Http\Controllers\customerController::class, 'accountPrivacy'])->name('customer.accountPrivacy');
});