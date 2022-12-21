<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ExpertController;
use App\Http\Controllers\api\ExpertDetailsController;
use App\Http\Controllers\api\ExpertAvailabilityController;
use App\Http\Controllers\api\FavoriteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("user-register",[UserController::class,"Register"]);//done
Route::post("user-login",[UserController::class,"Login"]);//done
Route::post("expert-register",[ExpertController::class,"Register"]);//done
Route::post("expert-login",[ExpertController::class,"Login"]);//done
Route::post("expert-times-enroll/{id}",[ExpertAvailabilityController::class,"AddTimes"]);

Route::post("addToWallet",[UserController::class,"addToWallet"]);

Route::post("pay/{id}",[UserController::class,"pay"]);

Route::get("availableTime/{id}",[UserController::class,"AvailableTime"]);

Route::get("show/{id}",[ExpertController::class,"ShowAvailableTimes"]);

Route::post("reservation/{id1}/{id2}",[UserController::class,"Reservation"]);

Route::post("search",[UserController::class,"search"]);


Route::post("expert-details-enroll",[ExpertDetailsController::class,"ExpertDetailsEnroll"]);//done
Route::get("expert_profile",[UserController::class,"ExpertProfile"]);
Route::group(["middleware"=>["auth:user-api"]],function(){
    Route::get("user_profile",[UserController::class,"Profile"]);
    Route::get("user-logout",[UserController::class,"Logout"]);//done
    Route::get("browse-Consulting",[UserController::class,"BrowseConsultingExperts"]);
    Route::get("expert-profile/{id}",[UserController::class,"getExpertDetails"]);
    Route::post("favorite-experts",[FavoriteController::class,"AddExpert"]);
// course api routes
Route::post("course-enroll",[CourseController::class,"CourseEnrollment"]);
Route::get("total-courses",[CourseController::class,"TotalCourses"]);
Route::get("delete-course/{id}",[CourseController::class,"DeleteCourse"]);
// product api routes
Route::post("product-enroll",[ProductController::class,"ProductEnrollment"]);
Route::get("total-products",[ProductController::class,"TotalProdcts"]);
Route::get("delete-product/{id}",[ProductController::class,"DeleteProduct"]);

});
Route::group(["middleware"=>["auth:expert-api"]],function(){
    
    Route::get("expert-logout",[ExpertController::class,"Logout"]);//done
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
