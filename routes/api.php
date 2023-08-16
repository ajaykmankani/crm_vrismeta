<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\RolesPermissionsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::prefix('v1')->group(function () {
    // Route::middleware('sanctum.auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('users', [UserController::class, 'users']);
    Route::post('assign-role', [RolesPermissionsController::class, 'assignRole']);
    Route::post('user-role', [RolesPermissionsController::class, 'userRoles']);
    Route::get('leads', [LeadController::class, 'show']);
    Route::get('roles', [RegisterController::class, 'roles']);
    Route::post('adminUserRegister', [RegisterController::class, 'userRegister']);
    Route::post('delete_user', [UserController::class, 'destroy']);
    Route::post('update_user', [RegisterController::class, 'update']);
    Route::get('user/{id}', [UserController::class, 'getUser']);
    Route::post('create_lead', [LeadController::class, 'store']);

    // });
});
