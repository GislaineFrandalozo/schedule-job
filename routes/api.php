<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/rules-enabled', function (Request $request) {
   $user = $request->user();
    return [
    'user' => $user
];
})->middleware(['auth:sanctum', 'ability:app-admin,app-user']);
Route::get('/teste', function (Request $request) {
    
 
    return [];
});
Route::post('/tokens/create', function (Request $request) {
    
    $user = User::where('name', $request->header('user'))->first();
    $token = $user->createToken($request->header('user'), ['app-user']);
    return ['token' => $token->plainTextToken];
});
