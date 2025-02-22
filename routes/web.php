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

Route::get('/home', function () {
    return view('home');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\AdminPanelController::class, 'index'])->name('dashboard')->middleware('auth');
Auth::routes();
Route::post('/logout', [App\Http\Controllers\AdminPanelController::class, 'logout'])->name('logout');

// for calculating bmi on home page...
Route::get('/bmi/{weight}/{height}', [App\Http\Controllers\HomeController::class, 'calculate'])->name('bmi');
Route::get('getplandetails/{id}', [App\Http\Controllers\PlanDetailController::class, 'getPlanDetails']);
// auth check for admin dashboard...
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){

    // dashboard sidebar pages...
    Route::get('/customers', [App\Http\Controllers\PageController::class, 'customers'])->name('pages.customers');

    // dashboarrd Plan details managment...
    Route::get('/plans', [App\Http\Controllers\PlanDetailController::class, 'index'])->name('pages.plans');
    Route::post('admin/plandetails', [App\Http\Controllers\PlanDetailController::class, 'storePlan'])->name('storePlan');
    Route::get('admin/deleteplan/{id}', [App\Http\Controllers\PlanDetailController::class, 'destroy'])->name('deleteplan');
    
    Route::get('admin/updateplan/{name}/{plan_category}/{plan_bmi_range}/{plan_duration}', [App\Http\Controllers\PlanDetailController::class, 'update'])->name('updateplan');

    // dashboard BMI details managment...
    Route::get('/bmidetails', [App\Http\Controllers\BmiDetailsController::class, 'index'])->name('pages.bmidetails');
    Route::get('admin/bmidetails/{min_range}/{max_range}/{category}', [App\Http\Controllers\BmiDetailsController::class, 'storeData'])->name('storeData');
    Route::get('admin/deletebmi/{id}', [App\Http\Controllers\BmiDetailsController::class, 'destroy'])->name('deletebmi');

    // dashboard admin profile managment...
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@edit']);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('admin/createcategory/{category}', [App\Http\Controllers\PlanCategoryController::class, 'store'])->name('storecategory');

});

// user dashboard routes...
Route::middleware(['auth'])->group(function(){

    Route::get('/userdashboard', [App\Http\Controllers\AdminPanelController::class, 'index'])->name('userdashboard')->middleware('auth');
    Route::get('/calculateuserbmi/{weight}/{height}', [App\Http\Controllers\UserController::class, 'calculate'])->name('bmi');

    // dashboard user profile managment...
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@edit']);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

});