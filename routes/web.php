<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  TestController,
  BamanagerController,
  BanewsController,
  BapagesController,
  BaController,
  FnController,
};

//後台----------------------------------------------------------
// Route::get('balogin', [BaController::class,'balogin_get'])->name('balogin');
// Route::post('balogin', [BaController::class,'balogin_post'])->name('balogin');
// Route::group(['middleware'=>['auth.baadmin']], function(){
//   //後台管員 首頁
//   Route::get('bamanager/{id?}', [BamanagerController::class,'bamanager_search'])->name('bamanager');
//   Route::get('bamanager_add', [BamanagerController::class,'bamanager_add'])->name('bamanager_add');
//   Route::post('bamanager_add', [BamanagerController::class,'bamanager_addpost'])->name('bamanager_addpost');
//   Route::get('bamanager_update/{id?}/{pageId?}', [BamanagerController::class,'bamanager_update'])->name('bamanager_update');
//   Route::post('bamanager_update/{id?}/{pageId?}', [BamanagerController::class,'bamanager_updatepost'])->name('bamanager_updatepost');
//   // Route::get('bamanager_passord/{id?}/{pageId?}/{value?}', [BamanagerController::class,'bamanager_password'])->name('bamanager_passord');
//   Route::post('bamanager_deleteAll', [BamanagerController::class,'bamanager_deleteAll'])->name('bamanager_deleteAll');
//   //最新消息
//   Route::get('banews/{id?}', [BanewsController::class,'search'])->name('banews');
//   Route::get('banews_add', [BanewsController::class,'add'])->name('banews_add');
//   Route::post('banews_add', [BanewsController::class,'addpost'])->name('banews_addpost');
//   Route::get('banews_update/{id?}/{pageId?}', [BanewsController::class,'update'])->name('banews_update');
//   Route::post('banews_update/{id?}/{pageId?}', [BanewsController::class,'updatepost'])->name('banews_updatepost');
//   Route::get('banews_delete/{id?}/{pageId?}', [BanewsController::class,'delete'])->name('banews_delete');
//   Route::post('banews_deleteAll', [BanewsController::class,'deleteAll'])->name('banews_deleteAll');
//   //站內網頁
//   Route::get('bapages/{id?}', [BapagesController::class,'search'])->name('bapages');
//   // Route::get('bapages_add', [BapagesController::class,'add'])->name('bapages_add');
//   // Route::post('bapages_add', [BapagesController::class,'addpost'])->name('bapages_addpost');
//   Route::get('bapages_update/{id?}/{pageId?}', [BapagesController::class,'update'])->name('bapages_update');
//   Route::post('bapages_update/{id?}/{pageId?}', [BapagesController::class,'updatepost'])->name('bapages_updatepost');
//   // Route::get('bapages_delete/{id?}/{pageId?}', [BapagesController::class,'delete'])->name('bapages_delete');
//   // Route::post('bapages_deleteAll', [BapagesController::class,'deleteAll'])->name('bapages_deleteAll');

//   //常見問題
//   // Route::get('baqa/{id?}', [BaqaController::class,'baqa_search'])->name('baqa');
//   // Route::get('baqa_add', [BaqaController::class,'baqa_add'])->name('baqa_add');
//   // Route::post('baqa_add', [BaqaController::class,'baqa_addpost'])->name('baqa_add');
//   // Route::get('baqa_update/{id?}/{pageId?}', [BaqaController::class,'baqa_update'])->name('baqa_update');
//   // Route::post('baqa_update/{id?}/{pageId?}', [BaqaController::class,'baqa_updatepost'])->name('baqa_update');
//   // Route::get('baqa_delete/{id?}/{pageId?}', [BaqaController::class,'baqa_delete'])->name('baqa_delete');
//   //服務項目
//   // Route::get('baservice/{id?}', [BaserviceController::class,'baservice_search'])->name('baservice');
//   // Route::get('baservice_add', [BaserviceController::class,'baservice_add'])->name('baservice_add');
//   // Route::post('baservice_add', [BaserviceController::class,'baservice_addpost'])->name('baservice_add');
//   // Route::get('baservice_update/{id?}/{pageId?}', [BaserviceController::class,'baservice_update'])->name('baservice_update');
//   // Route::post('baservice_update/{id?}/{pageId?}', [BaserviceController::class,'baservice_updatepost'])->name('baservice_update');
//   // Route::get('baservice_delete/{id?}/{pageId?}', [BaserviceController::class,'baservice_delete'])->name('baservice_delete');
//   //購物訂單
//   // Route::get('bacar/{id?}', [BacarController::class,'bacar_search'])->name('bacar');
//   // Route::get('bacar_add', [BacarController::class,'bacar_add'])->name('bacar_add');
//   // Route::post('bacar_add', [BacarController::class,'bacar_addpost'])->name('bacar_add');
//   // Route::get('bacar_update/{id?}/{pageId?}', [BacarController::class,'bacar_update'])->name('bacar_update');
//   // Route::post('bacar_update/{id?}/{pageId?}', [BacarController::class,'bacar_updatepost'])->name('bacar_update');
//   // Route::get('bacar_delete/{id?}/{pageId?}', [BacarController::class,'bacar_delete'])->name('bacar_delete');
//   //後台登出
//   Route::get('basignout', [BaController::class,'basignout'])->name('bapages_updatepost');
// });
// //home 首頁
// Route::get('/', [FnController::class, 'fnhome'])->name('fnhome');
// //SHOP 商店
// Route::get('shop', [FnController::class, 'fnshop'])->name('fnshop');
// //STORY 品牌故事
// Route::get('story', [FnController::class, 'fnstory'])->name('fnstory');
// //new 最新消息
// Route::get('new/{id?}', [FnController::class, 'fnnew'])->name('fnnew');
// Route::get('news/{id?}', [FnController::class, 'fnnews'])->name('fnnews');
// //store  門市
// Route::get('store', [FnController::class, 'fnstore'])->name('fnstore');
// //Contact us  聯絡我們
// Route::get('contact', [FnController::class, 'fncontact'])->name('fncontact');
// Route::post('contactpost', [FnController::class, 'fncontactpost'])->name('fncontactpost');
// //website  網站使用條款
// Route::get('website', [FnController::class, 'fnwebsite'])->name('fnwebsite');
// //confidentiality  會員會員隱私保密政策
// Route::get('confidentiality', [FnController::class, 'fnconfidentiality'])->name('fnconfidentiality');
// //financial  使用條款電子金融交易
// Route::get('financial', [FnController::class, 'fnfinancial'])->name('fnfinancial');
// //shippingpolicy  運送政策
// Route::get('shippingpolicy', [FnController::class, 'fnshippingpolicy'])->name('fnshippingpolicy');
// //exchange  退換貨須知
// Route::get('exchange', [FnController::class, 'fnexchange'])->name('fnexchange');
//404
// Route::fallback(function () {
//   return redirect()->route('fnindex');
// });
// Route::get('/', function () {
//     // return view('welcome');
//     return view('home');
// });
// Route::get('fnindex', [FnController::class, 'fnindex'])->name('fnindex');
// Route::middleware(['web','auth'])->name('api.')->group(function(){
//   Route::get('fnindex', [FnController::class, 'fnindex'])->name('fnindex');
// });
// Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
//   Route::get('fnindex', [FnController::class, 'fnindex'])->name('fnindex');
// });
// Route::group(['middleware'=>['auth.api']], function(){
//   Route::get('fnindex', [FnController::class, 'fnindex'])->name('fnindex');
// });
//驗證
// Route::get('testcaptcha', [TestController::class,'testcaptcha'])->name('testcaptcha');
// Route::post('testcaptcha', [TestController::class,'testcaptchaPost'])->name('testcaptchaPost');
//
// Route::get('test', [TestController::class,'test']);
Route::get('/{any?}', function () {
  return view('any');
})->where('any', '^(?!api\/)[\/\w\.-]*');
