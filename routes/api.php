<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/**
 * route with sanctum
 */
Route::group(['middleware' => 'auth:sanctum', 'auth:api'], static function () {

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resource('/personal', PersonalInformationController::class)->except(['index', 'destroy']);
    Route::resource('/languages', LanguageController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/educations', EducationController::class);
    Route::resource('/experiences', ExperienceController::class);
    Route::post('/add-language', [UserController::class, 'storeLanguageUser']);
    Route::post('/add-skill', [UserController::class, 'storeSkillUser']);

    Route::post('/delete-language', [UserController::class, 'deleteLanguageUser']);
    Route::post('/delete-skill', [UserController::class, 'deleteSkillUser']);
});
