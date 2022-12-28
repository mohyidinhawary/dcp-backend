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
use App\Http\Controllers\api\UserSubjectController;
use App\Http\Controllers\api\ExpertInboxController;
use App\Http\Controllers\api\ExpertMessageController;
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
// compulsory task1+3
Route::post("user_register",[UserController::class,"Register"]);//done
Route::post("expert_register",[ExpertController::class,"Register"]);//done
Route::post("expert_times_enroll/{id}",[ExpertAvailabilityController::class,"AddTimes"]);//done

// compulsory task2
Route::post("user_login",[UserController::class,"Login"]);//done
Route::post("expert_login",[ExpertController::class,"Login"]);//done

// compulsory task4
Route::get("browse_Consulting",[UserController::class,"BrowseConsultingExperts"]);//done

// the basic task1

Route::post("search",[UserController::class,"search"]);

// the basic task2

Route::get("expert_profile/{id}",[UserController::class,"getExpertDetails"]);//done
Route::get("get",[UserController::class,"getExpertsDetails"]);//done

// the basic task3
Route::post("reservation/{id1}/{id2}",[UserController::class,"Reservation"]);//done
Route::get("availableTime/{id}",[UserController::class,"AvailableTime"]);//done
Route::post("addToWallet",[UserController::class,"addToWallet"]);//done
Route::post("pay/{id}",[UserController::class,"pay"]);//done


// the basic task4
Route::get("show/{id}",[ExpertController::class,"ShowReservations"]);//done
// extra task2
Route::post("rate/{id1}/{id2}",[UserController::class,"rating"]);

// extra task3
Route::get("AddExpert/{id1}/{id2}",[FavoriteController::class,"AddExpert"]);
Route::delete("deleteExpert/{id1}/{id2}",[FavoriteController::class,"deleteExpert"]);

// extra task1
Route::post("Send_user_Massege/{id1}/{id2}",[UserSubjectController::class,"SendMassege"]);
Route::get("get_user_messages_outgoing/{id}",[UserSubjectController::class,"GetMessagesOutgoing"]);//done
Route::get("delete_user_message/{id1}/{id2}",[UserSubjectController::class,"DeleteMessage"]);//done
Route::get("get_user_inbox/{id1}",[UserSubjectController::class,"GetMessages"]);//done
Route::post("user_answer/{id1}/{id2}",[UserSubjectController::class,"UserAnswer"]);
Route::post("Send_expert_Massege/{id1}/{id2}",[ExpertMessageController::class,"SendMassege"]);

Route::get("get_expert_messages_outgoing/{id}",[ExpertMessageController::class,"GetMessagesOutgoing"]);//done

Route::get("delete_expert_message/{id1}/{id2}",[ExpertMessageController::class,"DeleteMessage"]);//done




Route::get("get_expert_inbox/{id1}",[ExpertMessageController::class,"GetMessages"]);//done

Route::post("expert_answer/{id1}/{id2}",[ExpertMessageController::class,"ExpertAnswer"]);

//done


Route::group(["middleware"=>["auth:user-api"]],function(){
    Route::get("user_profile",[UserController::class,"Profile"]);
    // compulsory task2
    Route::get("user_logout",[UserController::class,"Logout"]);//done
// course api routes
// Route::post("course-enroll",[CourseController::class,"CourseEnrollment"]);
// Route::get("total-courses",[CourseController::class,"TotalCourses"]);
// Route::get("delete-course/{id}",[CourseController::class,"DeleteCourse"]);
// product api routes
// Route::post("product-enroll",[ProductController::class,"ProductEnrollment"]);
// Route::get("total-products",[ProductController::class,"TotalProdcts"]);
// Route::get("delete-product/{id}",[ProductController::class,"DeleteProduct"]);

});
Route::group(["middleware"=>["auth:expert-api"]],function(){
    // compulsory task2
    Route::get("expert_logout",[ExpertController::class,"Logout"]);//done
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
