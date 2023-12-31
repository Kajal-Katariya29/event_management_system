<?php

use App\Http\Controllers\admin\banner\BannerController;
use App\Http\Controllers\admin\city\CityController;
use App\Http\Controllers\admin\country\CountryController;
use App\Http\Controllers\admin\event\eventCategory\EventCategoryController;
use App\Http\Controllers\admin\event\EventController;
use App\Http\Controllers\admin\organizer\OrganizerController;
use App\Http\Controllers\admin\permission\PermissionController;
use App\Http\Controllers\admin\permission\RolePermissionController;
use App\Http\Controllers\admin\role\RoleController;
use App\Http\Controllers\admin\role\RoleUserController;
use App\Http\Controllers\admin\sponser\SponserController;
use App\Http\Controllers\admin\user\UserController;
use App\Http\Controllers\admin\venue\VenueController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\front\homePage\HomePageController;

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

Route::get('/login', function () {
    return view('welcome');
});

//Routes for authentication system
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/post-login',[AuthController::class,'postLogin'])->name('login.post');
Route::get('/registration',[AuthController::class,'registration'])->name('register');
Route::post('/post-registration',[AuthController::class,'postRegistration'])->name('register.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//Routes for admin side

Route::group(['middleware' => ['admin']],function(){
    Route::prefix('admin')->group(function () {

        //Route for user
        Route::resource('/user',UserController::class);

        //Route for role
        Route::resource('/role',RoleController::class);

        //Route for banner
        Route::resource('/banner',BannerController::class);

        //Route for country
        Route::resource('/countries',CountryController::class);

        //Route for city
        Route::resource('/cities',CityController::class);

        //Route for Event Category
        Route::resource('/event-categories',EventCategoryController::class);

        //Routes for Organizer
        Route::resource('/organizer',OrganizerController::class);

        //Routes for Sponser
        Route::resource('/sponser',SponserController::class);

        //Routes for Venue
        Route::resource('/venue',VenueController::class);
        Route::post('/fetch-cities',[VenueController::class,'fetchCities']);

        //Route for Event
        Route::resource('/event',EventController::class);
        Route::post('/delete-image/{id}',[EventController::class,'deleteImage'])->name('event.delete.image');

        //Route for Permission
        Route::resource('/permission',PermissionController::class);

        //Route for Role-User
        Route::resource('/role-user',RoleUserController::class);

        //Route for Role-permission
        Route::resource('/role-permission',RolePermissionController::class);
    });
});

//Route for user side

//Route for HomePage
Route::group(['middleware' => ['user']], function(){
    Route::get('/home-page',[HomePageController::class,'index'])->name('homePage.index');
});
