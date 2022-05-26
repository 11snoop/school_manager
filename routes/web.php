<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookingController;

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
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index']);

Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('bookings', BookingController::class);
Route::post('booking_apply', [App\Http\Controllers\BookingController::class, 'booking_apply'])->name('booking_apply');
Route::get('booking_confirm', [App\Http\Controllers\BookingController::class, 'booking_confirm'])->name('booking_confirm');
Route::get('booking_complete', [App\Http\Controllers\BookingController::class, 'booking_complete'])->name('booking_complete');
Route::post('payment', [App\Http\Controllers\BookingController::class, 'payment'])->name('payment');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
