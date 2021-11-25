<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('user', [UserController::class, 'current']);

    Route::patch('settings/profile', [ProfileController::class, 'update']);
    Route::patch('settings/password', [PasswordController::class, 'update']);

    
    /*
    *   Role and permission Controller
    */
    Route::apiResource('role', RoleController::class);
    Route::apiResource('permission',PermissionController::class);

 
    /*
    *   Role and permission Controller
    */
    Route::apiResource('team', TeamController::class);
    Route::post('/team/delete-selected', [TeamController::class, 'delete_teams']);
    Route::get('/team-search/{query}', [TeamController::class, 'search']);


    /*
    *   Tag Controller
    */
    Route::apiResource('tag', TagController::class);
    Route::post('/tag/delete_tags', [TagController::class, 'delete_tags']);
    Route::get('/tag-search/{query}', [TagController::class, 'search']);


    /*
    *   Activity Log Controller
    */
    Route::apiResource('/activity-log', ActivityController::class);
    Route::get('/activaty-log-clear', [ActivityController::class, 'clear']);

});

Route::group(['middleware' => 'guest:api'], function () {

    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);

    Route::post('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend']);

    Route::post('oauth/{driver}', [OAuthController::class, 'redirect']);
    Route::get('oauth/{driver}/callback', [OAuthController::class, 'handleCallback'])->name('oauth.callback');

});
