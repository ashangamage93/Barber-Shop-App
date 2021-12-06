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

Route::prefix('/admin/adpost')->group(function () {
	Route::get('/', [\App\Http\Controllers\AdPostController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\AdPostController::class, 'insert']);
	Route::get('/view/{adPostId}', [\App\Http\Controllers\AdPostController::class, 'view']);
	Route::get('/edit/{adPostId}', [\App\Http\Controllers\AdPostController::class, 'edit']);
	Route::get('/delete/{adPostId}', [\App\Http\Controllers\AdPostController::class, 'delete']);
	Route::post('/insert_adpost', [\App\Http\Controllers\AdPostController::class, 'postInsert']);
	Route::post('/edit_adpost', [\App\Http\Controllers\AdPostController::class, 'postEdit']);
	Route::post('/delete_adpost', [\App\Http\Controllers\AdPostController::class, 'postDelete']);
});

Route::prefix('/admin/appointment')->group(function () {
	Route::get('/', [\App\Http\Controllers\AppointmentController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\AppointmentController::class, 'insert']);
	Route::get('/view/{appointmentId}', [\App\Http\Controllers\AppointmentController::class, 'view']);
	Route::get('/edit/{appointmentId}', [\App\Http\Controllers\AppointmentController::class, 'edit']);
	Route::get('/delete/{appointmentId}', [\App\Http\Controllers\AppointmentController::class, 'delete']);
	Route::post('/insert_appointment', [\App\Http\Controllers\AppointmentController::class, 'postInsert']);
	Route::post('/edit_appointment', [\App\Http\Controllers\AppointmentController::class, 'postEdit']);
	Route::post('/delete_appointment', [\App\Http\Controllers\AppointmentController::class, 'postDelete']);
});


Route::prefix('/admin/service')->group(function () {
	Route::get('/', [\App\Http\Controllers\ServiceController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\ServiceController::class, 'insert']);
	Route::get('/view/{serviceId}', [\App\Http\Controllers\ServiceController::class, 'view']);
	Route::get('/edit/{serviceId}', [\App\Http\Controllers\ServiceController::class, 'edit']);
	Route::get('/delete/{serviceId}', [\App\Http\Controllers\ServiceController::class, 'delete']);
	Route::post('/insert_service', [\App\Http\Controllers\ServiceController::class, 'postInsert']);
	Route::post('/edit_service', [\App\Http\Controllers\ServiceController::class, 'postEdit']);
	Route::post('/delete_service', [\App\Http\Controllers\ServiceController::class, 'postDelete']);
});

Route::prefix('/admin/category')->group(function () {
	Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\CategoryController::class, 'insert']);
	Route::get('/view/{categoryId}', [\App\Http\Controllers\CategoryController::class, 'view']);
	Route::get('/edit/{categoryId}', [\App\Http\Controllers\CategoryController::class, 'edit']);
	Route::get('/delete/{categoryId}', [\App\Http\Controllers\CategoryController::class, 'delete']);
	Route::post('/insert_category', [\App\Http\Controllers\CategoryController::class, 'postInsert']);
	Route::post('/edit_category', [\App\Http\Controllers\CategoryController::class, 'postEdit']);
	Route::post('/delete_category', [\App\Http\Controllers\CategoryController::class, 'postDelete']);
});

Route::prefix('/admin/sub_category')->group(function () {
	Route::get('/', [\App\Http\Controllers\SubCategoryController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\SubCategoryController::class, 'insert']);
	Route::get('/view/{subCategoryId}', [\App\Http\Controllers\SubCategoryController::class, 'view']);
	Route::get('/edit/{subCategoryId}', [\App\Http\Controllers\SubCategoryController::class, 'edit']);
	Route::get('/delete/{subCategoryId}', [\App\Http\Controllers\SubCategoryController::class, 'delete']);
	Route::post('/insert_sub_category', [\App\Http\Controllers\SubCategoryController::class, 'postInsert']);
	Route::post('/edit_sub_category', [\App\Http\Controllers\SubCategoryController::class, 'postEdit']);
	Route::post('/delete_sub_category', [\App\Http\Controllers\SubCategoryController::class, 'postDelete']);
});

Route::prefix('/admin/event')->group(function () {
	Route::get('/', [\App\Http\Controllers\EventController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\EventController::class, 'insert']);
	Route::get('/view/{eventId}', [\App\Http\Controllers\EventController::class, 'view']);
	Route::get('/edit/{eventId}', [\App\Http\Controllers\EventController::class, 'edit']);
	Route::get('/delete/{eventId}', [\App\Http\Controllers\EventController::class, 'delete']);
	Route::post('/insert_event', [\App\Http\Controllers\EventController::class, 'postInsert']);
	Route::post('/edit_event', [\App\Http\Controllers\EventController::class, 'postEdit']);
	Route::post('/delete_event', [\App\Http\Controllers\EventController::class, 'postDelete']);
});

Route::prefix('/admin/post')->group(function () {
	Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\PostController::class, 'insert']);
	Route::get('/view/{postId}', [\App\Http\Controllers\PostController::class, 'view']);
	Route::get('/edit/{postId}', [\App\Http\Controllers\PostController::class, 'edit']);
	Route::get('/delete/{postId}', [\App\Http\Controllers\PostController::class, 'delete']);
	Route::post('/insert_post', [\App\Http\Controllers\PostController::class, 'postInsert']);
	Route::post('/edit_post', [\App\Http\Controllers\PostController::class, 'postEdit']);
	Route::post('/delete_post', [\App\Http\Controllers\PostController::class, 'postDelete']);
});

Route::prefix('/admin/customer')->group(function () {
	Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\CustomerController::class, 'insert']);
	Route::get('/view/{customerId}', [\App\Http\Controllers\CustomerController::class, 'view']);
	Route::get('/delete/{customerId}', [\App\Http\Controllers\CustomerController::class, 'delete']);
	Route::post('/insert_customer', [\App\Http\Controllers\CustomerController::class, 'postInsert']);
	Route::post('/delete_customer', [\App\Http\Controllers\CustomerController::class, 'postDelete']);
});

Route::prefix('/admin/user')->group(function () {
	Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\UserController::class, 'insert']);
	Route::get('/view/{userId}', [\App\Http\Controllers\UserController::class, 'view']);
	Route::get('/edit/{userId}', [\App\Http\Controllers\UserController::class, 'edit']);
	Route::get('/delete/{userId}', [\App\Http\Controllers\UserController::class, 'delete']);
	Route::post('/insert_user', [\App\Http\Controllers\UserController::class, 'postInsert']);
	Route::post('/edit_user', [\App\Http\Controllers\UserController::class, 'postEdit']);
	Route::post('/delete_user', [\App\Http\Controllers\UserController::class, 'postDelete']);
});

Route::prefix('/admin/contact')->group(function () {
	Route::get('/', [\App\Http\Controllers\ContactController::class, 'index']);
	Route::get('/view/{contactId}', [\App\Http\Controllers\ContactController::class, 'view']);
	Route::get('/delete/{contactId}', [\App\Http\Controllers\ContactController::class, 'delete']);
	Route::post('/delete_contact', [\App\Http\Controllers\ContactController::class, 'postDelete']);
});


Route::prefix('/admin/images')->group(function () {
	Route::get('/', [\App\Http\Controllers\ImageController::class, 'index']);
	Route::get('/insert', [\App\Http\Controllers\ImageController::class, 'insert']);
	Route::get('/view/{imageId}', [\App\Http\Controllers\ImageController::class, 'view']);
	Route::get('/delete/{imageId}', [\App\Http\Controllers\ImageController::class, 'delete']);
	Route::post('/insert_image', [\App\Http\Controllers\ImageController::class, 'postInsert']);
	Route::post('/delete_image', [\App\Http\Controllers\ImageController::class, 'postDelete']);
});

Route::prefix('/admin/report')->group(function () {
	Route::get('/appointment/pdf', [\App\Http\Controllers\ReportController::class, 'appointment']);
	Route::get('/service/pdf', [\App\Http\Controllers\ReportController::class, 'service']);
	Route::get('/customer/pdf', [\App\Http\Controllers\ReportController::class, 'customer']);
	Route::get('/user/pdf', [\App\Http\Controllers\ReportController::class, 'user']);
});

Route::prefix('/admin/')->group(function () {
	Route::get('/index', [\App\Http\Controllers\DashboardController::class, 'index']);
});

Route::prefix('/shop/')->group(function () {
    Route::get('/account', [\App\Http\Controllers\ShopController::class, 'account']);
    Route::get('/appointment/insert', [\App\Http\Controllers\ShopController::class, 'insert']);
    Route::get('/appointment/view/{appointmentId}', [\App\Http\Controllers\ShopController::class, 'view']);
    Route::get('/appointment/edit/{appointmentId}', [\App\Http\Controllers\ShopController::class, 'edit']);
    Route::get('/appointment/delete/{appointmentId}', [\App\Http\Controllers\ShopController::class, 'delete']);
    Route::post('/appointment/insert_appointment', [\App\Http\Controllers\ShopController::class, 'postInsert']);
    Route::post('/appointment/edit_appointment', [\App\Http\Controllers\ShopController::class, 'postEdit']);
    Route::post('/appointment/delete_appointment', [\App\Http\Controllers\ShopController::class, 'postDelete']);
});

Route::prefix('/auth')->group(function () {
	Route::get('/sign_in', [\App\Http\Controllers\AuthController::class, 'sign_in'])->name('sign_in');
	Route::get('/sign_up', [\App\Http\Controllers\AuthController::class, 'sign_up']);
	Route::post('/sign_in_post', [\App\Http\Controllers\AuthController::class, 'sign_in_post']);
	Route::post('/sign_up_post', [\App\Http\Controllers\AuthController::class, 'sign_up_post']);
	Route::post('/sign_out_post', [\App\Http\Controllers\AuthController::class, 'sign_out_post']);
});

Route::get('/', [\App\Http\Controllers\WebController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\WebController::class, 'about']);
Route::get('/gallery', [\App\Http\Controllers\WebController::class, 'gallery']);
Route::get('/contact', [\App\Http\Controllers\WebController::class, 'contact']);
Route::get('/blog', [\App\Http\Controllers\WebController::class, 'blog']);
Route::get('/services', [\App\Http\Controllers\WebController::class, 'services']);
Route::post('/contact_post', [\App\Http\Controllers\WebController::class, 'contact_post']);
