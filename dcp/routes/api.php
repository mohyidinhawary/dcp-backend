<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ExpertController;
use App\Http\Controllers\api\ExpertDetailsController;
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
Route::post("expert-register",[ExpertController::class,"Register"]);//done
Route::post("user-login",[UserController::class,"Login"]);//done
Route::post("expert-login",[ExpertController::class,"Login"]);
Route::post("expert-details-enroll",[ExpertDetailsController::class,"ExpertDetailsEnroll"]);
Route::group(["middleware"=>["auth:api"]],function(){
    Route::get("user_profile",[UserController::class,"Profile"]);
    Route::get("user-logout",[UserController::class,"Logout"]);//done

// course api routes
Route::post("course-enroll",[CourseController::class,"CourseEnrollment"]);
Route::get("total-courses",[CourseController::class,"TotalCourses"]);
Route::get("delete-course/{id}",[CourseController::class,"DeleteCourse"]);
// product api routes
Route::post("product-enroll",[ProductController::class,"ProductEnrollment"]);
Route::get("total-products",[ProductController::class,"TotalProdcts"]);
Route::get("delete-product/{id}",[ProductController::class,"DeleteProduct"]);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
