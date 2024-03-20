<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banews as db_news;
use App\Models\Pages as db_pages;
// use Illuminate\Support\Str;
use App\Http\Controllers\CustomFn;//自訂函數
use Illuminate\Support\Facades\Mail;//寄信
use Illuminate\Support\Facades\Validator;//驗證資料
// use Datomon\LaravelNewebpay\Library\NewebPay;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\article AS data_article;
use App\Models\articleclass AS data_articleclass;
class TestController extends Controller
{
  // public function test() {
  //   dd('test');
  // }
  //驗證圖片
  public function test() {
    // dd('imgs');
    $cover = "data:image/jpeg;base64,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";
    CustomFn::imgAdd($cover,'bamanager');
  }
  //驗證碼
  public function testcaptcha() {
    return view( 'testcaptcha');
  }
  //檢查驗證碼
  public function testcaptchaPost(Request $request) {
    $input = $request->validate([
      'captcha' => 'required|captcha',
    ]);
    return dd($input);
  }
  //驗證sql
  public function sql() {
    //1.自組db
    // $articleclassData = DB::table('articleclass')->get();
    // $class=array();
    // foreach ($articleclassData as $item){ 
    //   $count = DB::table('article')->where('assort',$item->id)->count();
    //   $class[] = [
    //     'class' => $item->class,
    //     'id' => $item->id,
    //     'count' => $count,
    //   ];
    // }
    // dd($class);

    //2.DB::raw
    //leftJoin
    $classdatas = DB::table('articleclass')
    ->leftJoin('article', 'article.assort', '=', 'articleclass.id')
    ->select('articleclass.class', 'articleclass.id')
    ->get();
    //groupBy 一樣的列合併
    $classdatas2 = DB::table('articleclass')
    ->leftJoin('article', 'article.assort', '=', 'articleclass.id')
    ->select('articleclass.class', 'articleclass.id')
    ->groupBy('articleclass.class', 'articleclass.id')
    ->get();
    //groupBy + count 合併才能使用count計算數量
    $classdatas3 = DB::table('articleclass')
    ->leftJoin('article', 'article.assort', '=', 'articleclass.id')
    ->select('articleclass.class', 'articleclass.id', DB::raw('count(article.assort) as count'))
    ->groupBy('articleclass.class', 'articleclass.id')
    ->get();
    dd($classdatas,$classdatas2,$classdatas3);
  }

  //
  // // 首頁---------------------------------------
  // public function fnhome() {
  //   $array = [
  //     'active'=>'fnhome',//class
  //   ];
  //   //取new資料
  //   $newResults = db_news::where('releases','y')->orderBy('sort', 'ASC')->limit(5)->get();
  //   //修改資料
  //   foreach ($newResults as $result) {
  //     //updated
  //     $result->updated = explode(" ", $result->updated_at)[0];
  //     //assort
  //     $assorts = array('最新資訊','優惠活動','新品登場');
  //     $result->assort = $assorts[($result->assort)-1];
  //   }
  //   $array['newdatas'] = $newResults;
  //   return view( $array['active'], $array);
  // }
  // // 商店---------------------------------------
  // public function fnshop() {
  //   $array = [
  //     'active'=>'fnshop',//class
  //     'title'=>'商店',//title
  //     'title_en'=>'Shop',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   return view( $array['active'], $array);
  // }
  // // 品牌故事---------------------------------------
  // public function fnstory() {
  //   $array = [
  //     'active'=>'fnstory',//class
  //     'title'=>'品牌故事',//title
  //     'title_en'=>'Story',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   return view( $array['active'], $array);
  // }
  // // 最新消息---------------------------------------
  // public function fnnew($pageNow = 1) {
  //   $array = [
  //     'active'=>'fnnew',//class
  //     'title'=>'最新消息',//title
  //     'title_en'=>'NEWS',//title
  //     'end'=>12,//顯示數量
  //     'pageNow'=>$pageNow,//設定第一頁
  //   ];
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
  //   $values= CustomFn::search(db_news::count(), $array['end'], $array['pageNow']);
  //   $array['pageStart'] =  $values['pageStart'];
  //   $array['pageTotle'] =  $values['pageTotle'];
  //   // dd($values);
  //   //取得資料
  //   $results = db_news::where('releases','y')->offset($values['startValue'])->limit($values['endValue'])->orderBy('sort', 'ASC')->get();
  //   //修改資料
  //   foreach ($results as $result) {
  //     //updated
  //     $result->updated = explode(" ", $result->updated_at)[0];
  //     //assort
  //     $assorts = array('最新資訊','優惠活動','新品登場');
  //     $result->assort = $assorts[($result->assort)-1];
  //   }
  //   $array['datas'] = $results;
  //   // dd($results);
  //   // dd($result['pageStart'],$result['pageTotle']);
  //   // dd($array);
  //   return view( $array['active'], $array);
  // }
  // public function fnnews($id = 1) {
  //   $array = [
  //     'active'=>'fnnews',//class
  //     'title'=>'最新消息',//title
  //     'title_en'=>'NEWS',//title
  //     // 'end'=>1,//顯示數量
  //     // 'pageNow'=>$pageNow,//設定第一頁
  //   ];
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
  //   // $values= CustomFn::search(db_news::count(), $array['end'], $array['pageNow']);
  //   // $array['pageStart'] =  $values['pageStart'];
  //   // $array['pageTotle'] =  $values['pageTotle'];
  //   // dd($values);
  //   //取得資料
  //   $results = db_news::where([['releases','y'],['id',$id]])->orderBy('sort', 'ASC')->get();
  //   //修改資料
  //   foreach ($results as $result) {
  //     //updated
  //     $result->updated = explode(" ", $result->updated_at)[0];
  //     //assort
  //     $assorts = array('最新資訊','優惠活動','新品登場');
  //     $result->assort = $assorts[($result->assort)-1];
  //   }
  //   $array['datas'] = $results;
  //   $prev = db_news::where([['releases','y'],['id','<',$id]])->orderBy('sort', 'ASC')->max('id');
  //   $array['prev'] = $prev?$prev:0;
  //   $next = db_news::where([['releases','y'],['id','>',$id]])->orderBy('sort', 'ASC')->min('id');
  //   $array['next'] = $next?$next:0;
  //   // dd($id,$array['prev'],$array['next']);
  //   // dd($result['pageStart'],$result['pageTotle']);
  //   // dd($array);
  //   return view( $array['active'], $array);
  // }
  // // 服務時間---------------------------------------
  // public function fnstore() {
  //   $array = [
  //     'active'=>'fnstore',//class
  //     'title'=>'服務時間',//title
  //     'title_en'=>'SERVICE HOURS',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   return view( $array['active'], $array);
  // }
  // // 聯絡我們---------------------------------------
  // public function fncontact() {
  //   $array = [
  //     'active'=>'fncontact',//class
  //     'title'=>'聯絡我們',//title
  //     'title_en'=>'Contact us',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   return view( $array['active'], $array);
  // }
  // public function fncontactpost(Request $request) {
  //   // $input = $request->validate([
  //   //   'name' => 'required|max:1',
  //   //   'phone' => 'max:20',
  //   //   'email' => 'required|email|max:50',
  //   //   'content' => 'required|max:255',
  //   // ]);
  //   $input = $request->all();
  //   //驗證規則
  //   $rules = [
  //     'name' => [
  //       'required',
  //       'max:20',
  //     ],
  //     'phone' => [
  //       'max:20',
  //     ],
  //     'email' => [
  //       'required',
  //       'email',
  //       'max:50',
  //     ],
  //     'content' => [
  //       'required',
  //       'max:300',
  //     ],
  //   ];
  //   //驗證資料
  //   $validator = Validator::make($input, $rules);
  //   if($validator->fails())
  //   {
  //     $error = $validator->errors()->All(); //顯示全部錯誤
  //     $output=implode('',$error);
  //     $output = $output.'發送失敗';
  //     return redirect()->back()->with('message', $output);
  //   }
  //   try {
  //     //寄信
  //     Mail::send('fncontactpost', [
  //       'name' => $input['name'],
  //       'phone' => $input['phone']?$input['phone']:'',
  //       'email' => $input['email'], 
  //       'content' => $input['content'], 
  //     ], function($mail) use ($input){
  //       $mail->to('www.oao.style@gmail.com');
  //       $mail->subject('來自oao-聯絡我們');
  //     });
  //     //判斷寄信
  //     if (count(Mail::failures()) > 0) {
  //       return redirect()->back()->with('message', '發送失敗');
  //     } else {
  //       return redirect()->back()->with('message', '發送成功');
  //     }
  //   } catch (\Exception $e) {
  //     return redirect()->back()->with('message', '發送失敗');
  //   }
  // }
  // public function fncontactpost_fetch(Request $request) {
  //   $input = $request->all();
  //   //驗證規則
  //   $rules = [
  //     'name' => [
  //       'required',
  //       'max:20',
  //     ],
  //     'phone' => [
  //       'max:20',
  //     ],
  //     'email' => [
  //       'required',
  //       'email',
  //       'max:50',
  //     ],
  //     'content' => [
  //       'required',
  //       'max:255',
  //     ],
  //   ];
  //   //驗證資料
  //   $validator = Validator::make($input, $rules);
  //   if($validator->fails())
  //   {
  //     $error = $validator->errors()->All(); //顯示全部錯誤
  //     return response()->json(array('status' => 500, 'message' => $error));
  //   }
  //   try {
  //     //寄信
  //     Mail::send('fncontactpost', [
  //       'name' => $input['name'],
  //       'phone' => $input['phone']?$input['phone']:'',
  //       'email' => $input['email'], 
  //       'content' => $input['content'], 
  //     ], function($mail) use ($input){
  //       $mail->to('gentlementest04@gmail.com');
  //       $mail->subject('來自oao-聯絡我們');
  //     });
  //     //判斷寄信
  //     if (count(Mail::failures()) > 0) {
  //       return response()->json(array('status' => 500, 'message' => '發送失敗'));
  //     } else {
  //       return response()->json(array('status' => 200, 'message' => '發送成功'));
  //     }
  //   } catch (\Exception $e) {
  //     return response()->json(array('status' => 500, 'message' => '發送失敗'));
  //   }
  // }
  // // 網站使用條款---------------------------------------
  // public function fnwebsite() {
  //   $array = [
  //     'active'=>'fnwebsite',//class
  //     'title'=>'網站使用條款',//title
  //     'title_en'=>'Placard',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取new資料
  //   $array['data'] = db_pages::where('id','100')->first();
  //   return view( 'fnpages', $array);
  // }
  // // 會員會員隱私保密政策---------------------------------------
  // public function fnconfidentiality() {
  //   $array = [
  //     'active'=>'fnconfidentiality',//class
  //     'title'=>'會員會員隱私保密政策',//title
  //     'title_en'=>'Placard',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取new資料
  //   $array['data'] = db_pages::where('id','101')->first();
  //   return view( 'fnpages', $array);
  // }
  // // 使用條款電子金融交易---------------------------------------
  // public function fnfinancial() {
  //   $array = [
  //     'active'=>'fnfinancial',//class
  //     'title'=>'使用條款電子金融交易',//title
  //     'title_en'=>'Placard',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取new資料
  //   $array['data'] = db_pages::where('id','102')->first();
  //   return view( 'fnpages', $array);
  // }
  // // 運送政策---------------------------------------
  // public function fnshippingpolicy() {
  //   $array = [
  //     'active'=>'fnshippingpolicy',//class
  //     'title'=>'運送政策',//title
  //     'title_en'=>'Placard',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取new資料
  //   $array['data'] = db_pages::where('id','103')->first();
  //   return view( 'fnpages', $array);
  // }
  // // 退換貨須知---------------------------------------
  // public function fnexchange() {
  //   $array = [
  //     'active'=>'fnexchange',//class
  //     'title'=>'退換貨須知',//title
  //     'title_en'=>'Placard',//title
  //   ];
  //   //麵包
  //   $array['breads'] =array(
  //     ['name'=>'商店','url'=>''],
  //     ['name'=>$array['title'],'url'=>$array['active']],
  //   );
  //   //取new資料
  //   $array['data'] = db_pages::where('id','104')->first();
  //   return view( 'fnpages', $array);
  // }
}
