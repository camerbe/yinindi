<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\MembreController;
use App\Http\Controllers\API\V1\PasswordController;

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
//Route::post('login','AuthController@login');
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot', [PasswordController::class, 'forgot']);
Route::post('reset', [PasswordController::class, 'reset']);

Route::group(['middleware'=>'auth:api'],function () {

    Route::post('admin/logout', [AuthController::class, 'logout']);
    Route::apiResource('admin/membres',MembreController::class);
    Route::apiResource('admin/users',UserController::class);
    Route::apiResource('admin/roles',RoleController::class);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
