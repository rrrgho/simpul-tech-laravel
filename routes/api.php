<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\api\v1\GroupController;
use App\Http\Controllers\api\v1\ChatController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::post('oauth/client', [UserController::class, 'Login']);
    Route::middleware('cors')->group(function () {
        Route::middleware('auth:api')->group(function(){
            Route::get('groups', [GroupController::class, 'Groups']);
            Route::get('group/member', [GroupController::class, 'GroupMember']);
            Route::get('chat-room', [ChatController::class, 'ChatRoom']);
            Route::post('send-message', [ChatController::class, 'SendMessage']);
        });
    });
});
