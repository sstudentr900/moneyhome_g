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
class FnController extends Controller
{
  // 首頁---------------------------------------
  public function fnhome() {
    $array = [
      'active'=>'fnhome',//class
    ];
    //取new資料
    $newResults = db_news::where('releases','y')->orderBy('sort', 'ASC')->limit(5)->get();
    //修改資料
    foreach ($newResults as $result) {
      //updated
      $result->updated = explode(" ", $result->updated_at)[0];
      //assort
      $assorts = array('最新資訊','優惠活動','新品登場');
      $result->assort = $assorts[($result->assort)-1];
    }
    $array['newdatas'] = $newResults;
    return view( $array['active'], $array);
  }
  // 商店---------------------------------------
  public function fnshop() {
    $array = [
      'active'=>'fnshop',//class
      'title'=>'商店',//title
      'title_en'=>'Shop',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    return view( $array['active'], $array);
  }
  // 品牌故事---------------------------------------
  public function fnstory() {
    $array = [
      'active'=>'fnstory',//class
      'title'=>'品牌故事',//title
      'title_en'=>'Story',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    return view( $array['active'], $array);
  }
  // 最新消息---------------------------------------
  public function fnnew($pageNow = 1) {
    $array = [
      'active'=>'fnnew',//class
      'title'=>'最新消息',//title
      'title_en'=>'NEWS',//title
      'end'=>12,//顯示數量
      'pageNow'=>$pageNow,//設定第一頁
    ];
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    $values= CustomFn::search(db_news::count(), $array['end'], $array['pageNow']);
    $array['pageStart'] =  $values['pageStart'];
    $array['pageTotle'] =  $values['pageTotle'];
    // dd($values);
    //取得資料
    $results = db_news::where('releases','y')->offset($values['startValue'])->limit($values['endValue'])->orderBy('sort', 'ASC')->get();
    //修改資料
    foreach ($results as $result) {
      //updated
      $result->updated = explode(" ", $result->updated_at)[0];
      //assort
      $assorts = array('最新資訊','優惠活動','新品登場');
      $result->assort = $assorts[($result->assort)-1];
    }
    $array['datas'] = $results;
    // dd($results);
    // dd($result['pageStart'],$result['pageTotle']);
    // dd($array);
    return view( $array['active'], $array);
  }
  public function fnnews($id = 1) {
    $array = [
      'active'=>'fnnews',//class
      'title'=>'最新消息',//title
      'title_en'=>'NEWS',//title
      // 'end'=>1,//顯示數量
      // 'pageNow'=>$pageNow,//設定第一頁
    ];
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    // $values= CustomFn::search(db_news::count(), $array['end'], $array['pageNow']);
    // $array['pageStart'] =  $values['pageStart'];
    // $array['pageTotle'] =  $values['pageTotle'];
    // dd($values);
    //取得資料
    $results = db_news::where([['releases','y'],['id',$id]])->orderBy('sort', 'ASC')->get();
    //修改資料
    foreach ($results as $result) {
      //updated
      $result->updated = explode(" ", $result->updated_at)[0];
      //assort
      $assorts = array('最新資訊','優惠活動','新品登場');
      $result->assort = $assorts[($result->assort)-1];
    }
    $array['datas'] = $results;
    $prev = db_news::where([['releases','y'],['id','<',$id]])->orderBy('sort', 'ASC')->max('id');
    $array['prev'] = $prev?$prev:0;
    $next = db_news::where([['releases','y'],['id','>',$id]])->orderBy('sort', 'ASC')->min('id');
    $array['next'] = $next?$next:0;
    // dd($id,$array['prev'],$array['next']);
    // dd($result['pageStart'],$result['pageTotle']);
    // dd($array);
    return view( $array['active'], $array);
  }
  // 服務時間---------------------------------------
  public function fnstore() {
    $array = [
      'active'=>'fnstore',//class
      'title'=>'服務時間',//title
      'title_en'=>'SERVICE HOURS',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    return view( $array['active'], $array);
  }
  // 聯絡我們---------------------------------------
  public function fncontact() {
    $array = [
      'active'=>'fncontact',//class
      'title'=>'聯絡我們',//title
      'title_en'=>'Contact us',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    return view( $array['active'], $array);
  }
  public function fncontactpost(Request $request) {
    // $input = $request->validate([
    //   'name' => 'required|max:1',
    //   'phone' => 'max:20',
    //   'email' => 'required|email|max:50',
    //   'content' => 'required|max:255',
    // ]);
    $input = $request->all();
    //驗證規則
    $rules = [
      'name' => [
        'required',
        'max:20',
      ],
      'phone' => [
        'max:20',
      ],
      'email' => [
        'required',
        'email',
        'max:50',
      ],
      'content' => [
        'required',
        'max:300',
      ],
    ];
    //驗證資料
    $validator = Validator::make($input, $rules);
    if($validator->fails())
    {
      $error = $validator->errors()->All(); //顯示全部錯誤
      $output=implode('',$error);
      $output = $output.'發送失敗';
      return redirect()->back()->with('message', $output);
    }
    try {
      //寄信
      Mail::send('fncontactpost', [
        'name' => $input['name'],
        'phone' => $input['phone']?$input['phone']:'',
        'email' => $input['email'], 
        'content' => $input['content'], 
      ], function($mail) use ($input){
        $mail->to('www.oao.style@gmail.com');
        $mail->subject('來自oao-聯絡我們');
      });
      //判斷寄信
      if (count(Mail::failures()) > 0) {
        return redirect()->back()->with('message', '發送失敗');
      } else {
        return redirect()->back()->with('message', '發送成功');
      }
    } catch (\Exception $e) {
      return redirect()->back()->with('message', '發送失敗');
    }
  }
  public function fncontactpost_fetch(Request $request) {
    $input = $request->all();
    //驗證規則
    $rules = [
      'name' => [
        'required',
        'max:20',
      ],
      'phone' => [
        'max:20',
      ],
      'email' => [
        'required',
        'email',
        'max:50',
      ],
      'content' => [
        'required',
        'max:255',
      ],
    ];
    //驗證資料
    $validator = Validator::make($input, $rules);
    if($validator->fails())
    {
      $error = $validator->errors()->All(); //顯示全部錯誤
      return response()->json(array('status' => 500, 'message' => $error));
    }
    try {
      //寄信
      Mail::send('fncontactpost', [
        'name' => $input['name'],
        'phone' => $input['phone']?$input['phone']:'',
        'email' => $input['email'], 
        'content' => $input['content'], 
      ], function($mail) use ($input){
        $mail->to('gentlementest04@gmail.com');
        $mail->subject('來自oao-聯絡我們');
      });
      //判斷寄信
      if (count(Mail::failures()) > 0) {
        return response()->json(array('status' => 500, 'message' => '發送失敗'));
      } else {
        return response()->json(array('status' => 200, 'message' => '發送成功'));
      }
    } catch (\Exception $e) {
      return response()->json(array('status' => 500, 'message' => '發送失敗'));
    }
  }
  // 網站使用條款---------------------------------------
  public function fnwebsite() {
    $array = [
      'active'=>'fnwebsite',//class
      'title'=>'網站使用條款',//title
      'title_en'=>'Placard',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取new資料
    $array['data'] = db_pages::where('id','100')->first();
    return view( 'fnpages', $array);
  }
  // 會員會員隱私保密政策---------------------------------------
  public function fnconfidentiality() {
    $array = [
      'active'=>'fnconfidentiality',//class
      'title'=>'會員會員隱私保密政策',//title
      'title_en'=>'Placard',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取new資料
    $array['data'] = db_pages::where('id','101')->first();
    return view( 'fnpages', $array);
  }
  // 使用條款電子金融交易---------------------------------------
  public function fnfinancial() {
    $array = [
      'active'=>'fnfinancial',//class
      'title'=>'使用條款電子金融交易',//title
      'title_en'=>'Placard',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取new資料
    $array['data'] = db_pages::where('id','102')->first();
    return view( 'fnpages', $array);
  }
  // 運送政策---------------------------------------
  public function fnshippingpolicy() {
    $array = [
      'active'=>'fnshippingpolicy',//class
      'title'=>'運送政策',//title
      'title_en'=>'Placard',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取new資料
    $array['data'] = db_pages::where('id','103')->first();
    return view( 'fnpages', $array);
  }
  // 退換貨須知---------------------------------------
  public function fnexchange() {
    $array = [
      'active'=>'fnexchange',//class
      'title'=>'退換貨須知',//title
      'title_en'=>'Placard',//title
    ];
    //麵包
    $array['breads'] =array(
      ['name'=>'商店','url'=>''],
      ['name'=>$array['title'],'url'=>$array['active']],
    );
    //取new資料
    $array['data'] = db_pages::where('id','104')->first();
    return view( 'fnpages', $array);
  }
}
