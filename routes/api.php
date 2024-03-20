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

//前Q&A
Route::get('/fnqa', [ApiController::class, 'fnqa']);
//前催收成功案例
Route::get('/fncase', [ApiController::class, 'fncase']);
//前債務催收文章
Route::get('/fnarticle/{category}/{pagenow}', [ApiController::class, 'fnarticle']);
Route::get('/fnarticlemore/{id}', [ApiController::class, 'fnarticlemore']);
Route::post('/fnknowledgemessage', [ApiController::class, 'fnknowledgemessage']);
  
//後台登入
Route::post('/balogin', [ApiController::class, 'balogin']);
Route::group(['middleware' =>'jwt:jwt'], function () {
  //登入人資訊
  Route::get('/bauserinfo', [ApiController::class, 'bauserinfo']);
  //後管理員
  Route::get('/bamanager/{id?}', [ApiController::class, 'bamanager']);
  Route::post('/bamanageradd', [ApiController::class, 'bamanageradd']);
  Route::get('/bamanageredit/{id}', [ApiController::class, 'bamanageredit']);
  Route::post('/bamanagereditpost/{id}', [ApiController::class, 'bamanagereditpost']);
  Route::post('/bamanagerpassword', [ApiController::class, 'bamanagerpassword']);
  Route::get('/bamanagerdelete/{id}', [ApiController::class, 'bamanagerdelete']);
  //後催收成功案例
  Route::get('/bacase/{id?}', [ApiController::class, 'bacase']);
  Route::get('/bacasesort', [ApiController::class, 'bacasesort']);
  Route::post('/bacaseadd', [ApiController::class, 'bacaseadd']);
  Route::get('/bacaseedit/{id}', [ApiController::class, 'bacaseedit']);
  Route::post('/bacaseeditpost/{id}', [ApiController::class, 'bacaseeditpost']);
  Route::get('/bacasedelete/{id}', [ApiController::class, 'bacasedelete']);
  //後Q&A
  Route::get('/baqa/{id?}', [ApiController::class, 'baqa']);
  Route::get('/baqasort', [ApiController::class, 'baqasort']);
  Route::post('/baqaadd', [ApiController::class, 'baqaadd']);
  Route::get('/baqaedit/{id}', [ApiController::class, 'baqaedit']);
  Route::post('/baqaeditpost/{id}', [ApiController::class, 'baqaeditpost']);
  Route::get('/baqadelete/{id}', [ApiController::class, 'baqadelete']);
  //後全部文章
  Route::get('/baarticle/{id?}', [ApiController::class, 'baarticle']);
  Route::get('/baarticlesort', [ApiController::class, 'baarticlesort']);
  Route::get('/baarticleassort', [ApiController::class, 'baarticleassort']);
  Route::post('/baarticleadd', [ApiController::class, 'baarticleadd']);
  Route::get('/baarticleedit/{id}', [ApiController::class, 'baarticleedit']);
  Route::post('/baarticleeditpost/{id}', [ApiController::class, 'baarticleeditpost']);
  Route::get('/baarticledelete/{id}', [ApiController::class, 'baarticledelete']);
  //後文章類別
  Route::get('/baarticleclass/{id?}', [ApiController::class, 'baarticleclass']);
  Route::get('/baarticleclasssort', [ApiController::class, 'baarticleclasssort']);
  Route::post('/baarticleclassadd', [ApiController::class, 'baarticleclassadd']);
  Route::get('/baarticleclassedit/{id}', [ApiController::class, 'baarticleclassedit']);
  Route::post('/baarticleclasseditpost/{id}', [ApiController::class, 'baarticleclasseditpost']);
  Route::get('/baarticleclassdelete/{id}', [ApiController::class, 'baarticleclassdelete']);
});

