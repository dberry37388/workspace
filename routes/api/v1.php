<?php

use App\Http\Controllers\Api\v1\Project\DeleteProjectApiController;
use App\Http\Controllers\Api\v1\Project\ListProjectApiController;
use App\Http\Controllers\Api\v1\Project\ShowProjectApiController;
use App\Http\Controllers\Api\v1\Project\StoreProjectApiController;
use App\Http\Controllers\Api\v1\Project\UpdateProjectApiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum', 'verified'])->name('api.v1.')->group(function () {

    // section Project
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', ListProjectApiController::class)->name('list');
        Route::post('/', StoreProjectApiController::class)->name('store');
        Route::get('{project}', ShowProjectApiController::class)->name('show');
        Route::match(['put', 'patch'], '{project}', UpdateProjectApiController::class)->name('update');
        Route::delete('{project}', DeleteProjectApiController::class)->name('destroy');
    });
});
