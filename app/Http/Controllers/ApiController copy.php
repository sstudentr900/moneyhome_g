<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; //驗證
use Illuminate\Support\Facades\Hash; //加密
// use App\Models\Jwt1;
// use App\Models\Jwt2;
// use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CustomFn; //自訂函數
use App\Models\Manager as data_manager;
use App\Models\Bacase as data_case;
use App\Models\Baqa as data_qa;
use App\Models\article as data_article;
use App\Models\articleclass as data_articleclass;
use App\Models\articlemessage as data_articlemessage;

class ApiController extends Controller
{
  public function jwt1(Request $request)
  {
    // $jwt = Jwt1::find(10);
    // dd('jwt1',$jwt);
    // $token = JWTSubject::fromUser($jwt);
    // dd('jwt1',$token);
    // dd(auth('jwt1')->attempt(['account'=>'1@1.1','password'=>'1']));
    $value = ['account' => '2@2.2', 'password' => '1'];
    // $value = ['account'=>'jwt1','password'=>'jwt1'];
    $token = auth('jwt1')->attempt($value);
    // dd('jwt1',$token);
    return response()->json(['token' => $token]);
  }
  public function jwt2(Request $request)
  {
    $value = ['account' => '1@1.1', 'password' => '1'];
    // $value = ['account'=>'jwt1','password'=>'jwt1'];
    $token = auth('jwt2')->attempt($value);
    // $token = auth('jwt2')->login($value);
    // dd('jwt1',$token);
    return response()->json(['token' => $token]);
  }
  public function forEveryone()
  {
    return '不需要token';
  }
  public function forEveryone1()
  {
    // return '必要API';
    return response()->json('需要token1');
  }
  public function forEveryone2()
  {
    // return '必要API';
    return response()->json('需要token2');
  }
  //前qa
  public function fnqa()
  {
    $pageNow = 1;
    $showQuantity = 8; //顯示幾筆
    $result = CustomFn::search(data_qa::where('releases', 'y')->count(), $showQuantity, $pageNow);
    $datas = data_qa::select('id', 'title', 'content')->where('releases', 'y')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      // 'pageTotle'=> $result['pageTotle'],
      // 'pageStart'=> $result['pageStart'],
      // 'pageNow'=> $pageNow,
      'datas' => $datas
    ]);
  }
  //前催收成功案例
  public function fncase()
  {
    $pageNow = 1;
    $showQuantity = 8; //顯示幾筆
    $result = CustomFn::search(data_case::where('releases', 'y')->count(), $showQuantity, $pageNow);
    $datas = data_case::select('id', 'cover', 'title', 'content', 'price')->where('releases', 'y')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      // 'pageTotle'=> $result['pageTotle'],
      // 'pageStart'=> $result['pageStart'],
      // 'pageNow'=> $pageNow,
      'datas' => $datas
    ]);
  }
  //前債務催收文章
  public function fnarticle($category, $pageNow)
  {
    $showQuantity = 1; //顯示幾筆
    $result = CustomFn::search(data_article::where([['assort', $category], ['releases', 'y']])->count(), $showQuantity, $pageNow);
    $datas = data_article::select('id', 'cover', 'title', 'content')->where([['assort', $category], ['releases', 'y']])->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //當前類別
    $nowClassName = data_articleclass::select('class')->where('id', $category)->first();
    //文章分類
    $articleClassDatas = DB::table('articleclass')
      ->leftJoin('article', 'article.assort', '=', 'articleclass.id')
      ->select('articleclass.class', 'articleclass.id', DB::raw('count(article.assort) as count'))
      ->where([['articleclass.releases', 'y'], ['article.releases', 'y']])
      ->groupBy('articleclass.class', 'articleclass.id')
      ->get();
    //最新文章 0-5筆
    $articleNewDatas = data_article::select('id', 'title')->where('releases', 'y')->offset(1)->limit(5)->orderBy('updated_at', 'asc')->get();
    //判斷有無值
    if (is_null($datas) || is_null($nowClassName) || $articleClassDatas->isEmpty() || $articleNewDatas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      'pageTotle' => $result['pageTotle'],
      'pageStart' => $result['pageStart'],
      'pageNow' => $pageNow,
      'nowClassName' => $nowClassName['class'],
      'articleClassDatas' => $articleClassDatas,
      'articleNewDatas' => $articleNewDatas,
      'datas' => $datas
    ]);
  }
  //前債務催收文章單筆
  public function fnarticlemore($id)
  {
    // $showQuantity = 1; //顯示幾筆
    // $result= CustomFn::search(data_article::where([['assort',$category],['releases','y']])->count(), $showQuantity, $pageNow);
    // $datas = data_article::select('id','cover','title','content')->where([['assort',$category],['releases','y']])->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    $datas = data_article::select('title', 'assort', 'tinymce', 'updated_at')->where([['id', $id], ['releases', 'y']])->first();
    // dd( $datas);
    //當前類別
    $nowClassName = data_articleclass::select('class')->where('id', $datas->assort)->first();
    //文章分類
    $articleClassDatas = DB::table('articleclass')
      ->leftJoin('article', 'article.assort', '=', 'articleclass.id')
      ->select('articleclass.class', 'articleclass.id', DB::raw('count(article.assort) as count'))
      ->where([['articleclass.releases', 'y'], ['article.releases', 'y']])
      ->groupBy('articleclass.class', 'articleclass.id')
      ->get();
    //最新文章 0-5筆
    $articleNewDatas = data_article::select('id', 'title')->where('releases', 'y')->offset(1)->limit(5)->orderBy('updated_at', 'asc')->get();
    //留言
    $articleMessage = data_articlemessage::select('nickname', 'message', 'updated_at')->where([['article_id', $id], ['releases', 'y']])->get();
    //判斷有無值
    if (is_null($datas) || is_null($nowClassName) || $articleClassDatas->isEmpty() || $articleNewDatas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    // if($pageNow>$result['pageTotle']){
    //   $pageNow = $result['pageTotle'];
    // }
    return response()->json([
      'status' => true,
      // 'pageTotle'=> $result['pageTotle'],
      // 'pageStart'=> $result['pageStart'],
      // 'pageNow'=> $pageNow,
      'nowClassName' => $nowClassName['class'],
      'articleClassDatas' => $articleClassDatas,
      'articleNewDatas' => $articleNewDatas,
      'articleMessage' => $articleMessage,
      'datas' => $datas
    ]);
  }
  //前債務催收文章單筆
  public function fnknowledgemessage(Request $request)
  {
    //驗證
    $input = $request->all();
    $validator = Validator::make($input, [
      'id' => ['required'],
      'nickname' => ['required', 'max:30'],
      'message' => ['required', 'max:200'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => $validator->errors()
      ]);
    }
    //新增資料
    data_articlemessage::create([
      'article_id' => $input['id'],
      'nickname' => $input['nickname'],
      'message' => $input['message'],
    ]);
    return response()->json([
      'status' => true,
      'message' => '新增成功'
    ]);
  }
  //後登入
  public function balogin(Request $request)
  {
    $input = $request->validate([
      'account' => 'required',
      'password' => 'required',
    ]);
    //驗證帳號
    $User = data_manager::where(['account' => $input['account'], 'releases' => 'y'])->first();
    if (!$User || $User && !Hash::check($input['password'], $User->password)) {

      return response()->json([
        'status' => false,
        // 'data'=>[
        //   'account' => [
        //       '帳號或密碼錯誤',
        //   ],
        //   'password' => [
        //       '帳號或密碼錯誤',
        //   ],
        // ]
      ]);
    }
    // dd($User);
    // $input = ['account'=>'1@1.1','password'=>'1'];
    $token = auth('jwt')->attempt($input);
    return response()->json([
      'status' => true,
      'token' => $token,
      'account' => $User->account,
      'name' => $User->name,
      'cover' => $User->cover
    ]);
  }
  //後取得登入資訊 
  public function bauserinfo()
  {
    $user = auth('jwt')->user();
    return response()->json([
      'status' => true,
      'account' => $user->account,
      'name' => $user->name,
      'cover' => $user->cover
    ]);
  }
  //後管理員
  public function bamanager($pageNow = 1)
  {
    $showQuantity = 7; //顯示幾筆
    $result = CustomFn::search(data_manager::count(), $showQuantity, $pageNow);
    $datas = data_manager::select('id', 'account', 'name', 'updated_at', 'releases')->offset($result['startValue'])->limit($result['endValue'])->orderBy('id', 'desc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      'pageTotle' => $result['pageTotle'],
      'pageStart' => $result['pageStart'],
      'pageNow' => $pageNow,
      'datas' => $datas
    ]);
  }
  public function bamanageradd(Request $request)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'cover' => ['required'],
      'account' => ['required', 'email', 'max:50'],
      'password' => ['required', 'max:20'],
      'name' => ['required', 'max:20'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    //驗證帳號
    $user = data_manager::where('account', $input['account'])->first();
    if ($user) {
      return response()->json([
        'status' => false,
        'message' => [
          'account' => ['帳號重複']
        ]
      ]);
    }
    //新增資料
    data_manager::create([
      'cover' => CustomFn::imgAdd($input['cover'], 'bamanager'),
      'account' => $input['account'],
      'password' => Hash::make($input['password']),
      'name' => $input['name'],
      // 'phone' => $input['phone'],
      'releases' => $input['releases'],
    ]);
    return response()->json([
      'status' => true,
      'message' => '新增成功'
    ]);
  }
  public function bamanageredit($id)
  {
    $data = data_manager::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    return response()->json([
      'status' => true,
      'datas' => $data
    ]);
  }
  public function bamanagereditpost(Request $request, $id)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'cover' => ['required'],
      'account' => ['required', 'email', 'max:50'],
      // 'password' => ['required','max:20'],
      'name' => ['required', 'max:20'],
      // 'phone' => ['required'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    //驗證帳號
    $data = data_manager::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //帳號不一樣驗證其他有無重複
    if ($data['account'] != $input['account']) {
      $user = data_manager::where('account', $input['account'])->first();
      if ($user) {
        return response()->json([
          'status' => false,
          'message' => [
            'account' => [
              '帳號重複',
            ]
          ]
        ]);
      }
    }
    //修改資料
    $imgUpdata = CustomFn::imgUpdata($input['cover'], $data, 'bamanager');
    if ($imgUpdata) {
      $data->cover = $imgUpdata;
    }
    $data->account = $input['account'];
    $data->name = $input['name'];
    $data->releases = $input['releases'];
    $data->save();

    return response()->json([
      'status' => true,
      'message' => '修改成功'
    ]);
  }
  public function bamanagerpassword(Request $request)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'id' => ['required'],
      'password' => ['required'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    $data = data_manager::find($input['id']);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //修改密碼
    $data->password = Hash::make($input['password']);
    $data->save();
    return response()->json([
      'status' => true,
      'message' => '修改成功'
    ]);
  }
  public function bamanagerdelete($id)
  {
    //驗證資料
    $validator = Validator::make(['id' => $id], [
      'id' => ['required'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    $data = data_manager::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //刪除資料
    CustomFn::imgDelet($data);
    $data->delete();
    return response()->json([
      'status' => true,
      'message' => '刪除成功'
    ]);
  }
  //後催收成功案例
  public function bacase($pageNow = 1)
  {
    $showQuantity = 7; //顯示幾筆
    $result = CustomFn::search(data_case::count(), $showQuantity, $pageNow);
    $datas = data_case::select('id', 'sort', 'cover', 'title', 'content', 'price', 'updated_at', 'releases')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      'pageTotle' => $result['pageTotle'],
      'pageStart' => $result['pageStart'],
      'pageNow' => $pageNow,
      'datas' => $datas
    ]);
  }
  public function bacasesort()
  {
    return response()->json([
      'status' => true,
      'sortValue' => data_case::max('id') + 1,
    ]);
  }
  public function bacaseadd(Request $request)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      'cover' => ['required'],
      'price' => ['required', 'max:20'],
      'title' => ['required', 'max:20'],
      'content' => ['required', 'max:255'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    //新增資料
    data_case::create([
      'sort' => $input['sort'],
      'cover' => CustomFn::imgAdd($input['cover'], 'bacase'),
      'title' => $input['title'],
      'price' => $input['price'],
      'content' => $input['content'],
      'releases' => $input['releases']
    ]);
    return response()->json([
      'status' => true,
      'message' => '新增成功'
    ]);
  }
  public function bacaseedit($id)
  {
    $data = data_case::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    return response()->json([
      'status' => true,
      'datas' => $data
    ]);
  }
  public function bacaseeditpost(Request $request, $id)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      'cover' => ['required'],
      'title' => ['required', 'max:20'],
      'price' => ['required', 'max:20'],
      'content' => ['required', 'max:255'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    $data = data_case::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //修改資料
    $imgUpdata = CustomFn::imgUpdata($input['cover'], $data, 'bacase');
    if ($imgUpdata) {
      $data->cover = $imgUpdata;
    }
    $data->sort = $input['sort'];
    $data->title = $input['title'];
    $data->price = $input['price'];
    $data->content = $input['content'];
    $data->releases = $input['releases'];
    $data->save();
    return response()->json([
      'status' => true,
      'message' => '修改成功'
    ]);
  }
  public function bacasedelete($id)
  {
    $data = data_case::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //刪除資料
    CustomFn::imgDelet($data);
    $data->delete();
    return response()->json([
      'status' => true,
      'message' => '刪除成功'
    ]);
  }
  //後qa
  public function baqa($pageNow = 1)
  {
    $showQuantity = 8; //顯示幾筆
    $result = CustomFn::search(data_qa::count(), $showQuantity, $pageNow);
    $datas = data_qa::select('id', 'sort', 'title', 'content', 'updated_at', 'releases')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      'pageTotle' => $result['pageTotle'],
      'pageStart' => $result['pageStart'],
      'pageNow' => $pageNow,
      'datas' => $datas
    ]);
  }
  public function baqasort()
  {
    return response()->json([
      'status' => true,
      'sortValue' => data_qa::max('id') + 1,
    ]);
  }
  public function baqaadd(Request $request)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      // 'cover' => CustomFn::imgAdd($input['cover'],'bacase'),
      'title' => ['required', 'max:30'],
      'content' => ['required', 'max:255'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    //新增資料
    data_qa::create([
      'sort' => $input['sort'],
      'title' => $input['title'],
      'content' => $input['content'],
      'releases' => $input['releases']
    ]);
    return response()->json([
      'status' => true,
      'message' => '新增成功'
    ]);
  }
  public function baqaedit($id)
  {
    $data = data_qa::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    return response()->json([
      'status' => true,
      'datas' => $data
    ]);
  }
  public function baqaeditpost(Request $request, $id)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      'title' => ['required', 'max:20'],
      'content' => ['required', 'max:255'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    $data = data_qa::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //修改資料
    // $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,'bacase');
    // if($imgUpdata){
    //   $data->cover = $imgUpdata;
    // }
    $data->sort = $input['sort'];
    $data->title = $input['title'];
    $data->content = $input['content'];
    $data->releases = $input['releases'];
    $data->save();
    return response()->json([
      'status' => true,
      'message' => '修改成功'
    ]);
  }
  public function baqadelete($id)
  {
    $data = data_qa::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //刪除資料
    // CustomFn::imgDelet($data);
    $data->delete();
    return response()->json([
      'status' => true,
      'message' => '刪除成功'
    ]);
  }
  //後全部文章
  public function baarticle($pageNow = 1)
  {
    $showQuantity = 8; //顯示幾筆
    $result = CustomFn::search(data_article::count(), $showQuantity, $pageNow);
    $datas = data_article::select('id', 'sort', 'title', 'updated_at', 'releases')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      'pageTotle' => $result['pageTotle'],
      'pageStart' => $result['pageStart'],
      'pageNow' => $pageNow,
      'datas' => $datas
    ]);
  }
  public function baarticlesort()
  {
    return response()->json([
      'status' => true,
      'sortValue' => data_article::max('id') + 1,
    ]);
  }
  public function baarticleassort()
  {
    $datas = data_articleclass::select('id', 'class')->where('releases', 'y')->orderBy('sort', 'desc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    return response()->json([
      'status' => true,
      'datas' => $datas,
    ]);
  }
  public function baarticleadd(Request $request)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      'cover' => ['required'],
      'title' => ['required', 'max:20'],
      'content' => ['required', 'max:255'],
      'tinymce' => ['required'],
      'assort' => ['required'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    //新增資料
    data_article::create([
      'sort' => $input['sort'],
      'cover' => CustomFn::imgAdd($input['cover'], 'baarticle'),
      'title' => $input['title'],
      'tinymce' => $input['tinymce'],
      'content' => $input['content'],
      'assort' => $input['assort'],
      'releases' => $input['releases']
    ]);
    return response()->json([
      'status' => true,
      'message' => '新增成功'
    ]);
  }
  public function baarticleedit($id)
  {
    $data = data_article::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    return response()->json([
      'status' => true,
      'datas' => $data
    ]);
  }
  public function baarticleeditpost(Request $request, $id)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      'cover' => ['required'],
      'title' => ['required', 'max:20'],
      'content' => ['required', 'max:255'],
      'tinymce' => ['required'],
      'assort' => ['required'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    $data = data_article::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //修改資料
    $imgUpdata = CustomFn::imgUpdata($input['cover'], $data, 'baarticle');
    if ($imgUpdata) {
      $data->cover = $imgUpdata;
    }
    $data->sort = $input['sort'];
    $data->title = $input['title'];
    $data->tinymce = $input['tinymce'];
    $data->content = $input['content'];
    $data->assort = $input['assort'];
    $data->releases = $input['releases'];
    $data->save();
    return response()->json([
      'status' => true,
      'message' => '修改成功'
    ]);
  }
  public function baarticledelete($id)
  {
    $data = data_article::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //刪除資料
    CustomFn::imgDelet($data);
    $data->delete();
    return response()->json([
      'status' => true,
      'message' => '刪除成功'
    ]);
  }
  //後文章類別
  public function baarticleclass($pageNow = 1)
  {
    $showQuantity = 7; //顯示幾筆
    $result = CustomFn::search(data_articleclass::count(), $showQuantity, $pageNow);
    $datas = data_articleclass::select('id', 'sort', 'class', 'updated_at', 'releases')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷有無值
    if ($datas->isEmpty()) {
      return response()->json([
        'status' => false,
        'message' => '找不到資料'
      ]);
    }
    //判斷搜尋超過總數
    if ($pageNow > $result['pageTotle']) {
      $pageNow = $result['pageTotle'];
    }
    return response()->json([
      'status' => true,
      'pageTotle' => $result['pageTotle'],
      'pageStart' => $result['pageStart'],
      'pageNow' => $pageNow,
      'datas' => $datas
    ]);
  }
  public function baarticleclasssort()
  {
    return response()->json([
      'status' => true,
      'sortValue' => data_articleclass::max('id') + 1,
    ]);
  }
  public function baarticleclassadd(Request $request)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      // 'cover' => CustomFn::imgAdd($input['cover'],'bacase'),
      'class' => ['required', 'max:20'],
      // 'content' => ['required','max:255'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    //新增資料
    data_articleclass::create([
      'sort' => $input['sort'],
      'class' => $input['class'],
      // 'content' => $input['content'],
      'releases' => $input['releases']
    ]);
    return response()->json([
      'status' => true,
      'message' => '新增成功'
    ]);
  }
  public function baarticleclassedit($id)
  {
    $data = data_articleclass::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    return response()->json([
      'status' => true,
      'datas' => $data
    ]);
  }
  public function baarticleclasseditpost(Request $request, $id)
  {
    //驗證資料
    $input = $request->all();
    $validator = Validator::make($input, [
      'sort' => ['required'],
      // 'cover' => CustomFn::imgAdd($input['cover'],'bacase'),
      'class' => ['required', 'max:20'],
      // 'content' => ['required','max:255'],
      'releases' => ['required', 'in:y,n'],
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        // 'message' => implode(',',$validator->errors()->All())
        'message' => $validator->errors()
      ]);
    }
    $data = data_articleclass::find($id);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //修改資料
    // $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,'bacase');
    // if($imgUpdata){
    //   $data->cover = $imgUpdata;
    // }
    $data->sort = $input['sort'];
    $data->class = $input['class'];
    // $data->content = $input['content'];
    $data->releases = $input['releases'];
    $data->save();
    return response()->json([
      'status' => true,
      'message' => '修改成功'
    ]);
  }
  public function baarticleclassdelete($id)
  {
    $data = data_articleclass::find($id);
    // dd($data);
    //判斷有無該值
    if (is_null($data)) {
      return response()->json([
        'status' => false,
        'message' => '沒有資料'
      ]);
    }
    //刪除資料
    // CustomFn::imgDelet($data);
    $data->delete();
    return response()->json([
      'status' => true,
      'message' => '刪除成功'
    ]);
  }
}
