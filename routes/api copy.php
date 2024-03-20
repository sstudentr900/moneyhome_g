<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  AuthController,
  ApiController,
  BamanagerController,
  BaController,
  FnController,
};
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('test', [BamanagerController::class,'test'])->name('test');
// Route::post('bamanager_deleteAll', [BamanagerController::class,'bamanager_deleteAll'])->name('bamanager_deleteAll');

//後台登入
Route::get('/foreveryone', [ApiController::class, 'forEveryone']);

//測試登入
Route::post('/jwt1',   [ApiController::class, 'jwt1']);
Route::post('/jwt2',   [ApiController::class, 'jwt2']);

//middleware寫法1 
// Route::group(['middleware' => ['auth.jwt1','auth:jwt1']], function () {
//middleware寫法2 
// Route::group(['middleware' =>'auth.jwt1:jwt1'], function () {
//middleware寫法3 
Route::group(['middleware' =>'jwt:jwt1'], function () {
  Route::get('/foreveryone1', [ApiController::class, 'forEveryone1']);
});

// Route::group(['middleware' => ['auth.jwt2','auth:jwt2']], function () {
// Route::group(['middleware' => 'auth.jwt2:jwt2'], function () {
Route::group(['middleware' => 'jwt:jwt2'], function () {
  Route::get('/foreveryone2', [ApiController::class, 'forEveryone2']);
});


// Route::group([
//   'middleware' => 'api',
//   // 'prefix' => 'auth',
//   // 'middleware' => 'auth:api'
// ], function ($router) {
//   Route::post('/register',    [AuthController::class, 'register']);       // 使用者註冊
//   Route::post('/login',       [AuthController::class, 'login']);          // 使用者登入 (回傳 JWT token 及使用者資訊)
//   Route::get('/user-profile', [AuthController::class, 'userProfile']);    // 以 JWT token 取得使用者資訊
//   Route::post('/refresh',     [AuthController::class, 'refresh']);        // 更新 JWT token
//   Route::post('/logout',      [AuthController::class, 'logout']);         // 使用者登出，移除 JWT token

//   Route::get('/manager',         [BamanagerController::class, 'all']);       
//   Route::get('/manager/{id}',    [BamanagerController::class, 'find']);       
//   Route::post('/manager',        [BamanagerController::class, 'create']);       
//   Route::put('/manager/{id}',    [BamanagerController::class, 'update']);       
//   Route::delete('/manager/{id}', [BamanagerController::class, 'delete']);       
// });


//不須登入
// Route::get('/news',         [BanewsController::class, 'all']);       
// Route::get('/news/{id}',    [BanewsController::class, 'find']);       
// Route::post('/news',        [BanewsController::class, 'create']);       
// Route::put('/news/{id}',    [BanewsController::class, 'update']);       
// Route::delete('/news/{id}', [BanewsController::class, 'delete']);    
// Route::get('/manager',         [BamanagerController::class, 'all']);       
// Route::get('/manager/{id}',    [BamanagerController::class, 'find']);       
// Route::post('/manager',        [BamanagerController::class, 'create']);       
// Route::put('/manager/{id}',    [BamanagerController::class, 'update']);       
// Route::delete('/manager/{id}', [BamanagerController::class, 'delete']);       
