<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\CustomerController;

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
//     return view('welcome');
// });

// Route::resource('/', CustomerController::class);
// admin setting , custumor route
Route::prefix('admin')->group(function () {
Route::resource('customer', CustomerController::class);
// Route::get('apartment/show',['apartment', CustomerController::class,'show'])->name('admin.custshow');
Route::resource('setting', SettingController::class);
});
Route::post('Upload_attachment', [CustomerController::class,'Upload_attachment'])->name('Upload_attachment');
Route::get('Download_attachment/{fname}/{filename}', [CustomerController::class,'Download_attachment'])->name('Download_attachment');
Route::post('Delete_attachment', [CustomerController::class, 'Delete_attachment'])->name('Delete_attachment');

