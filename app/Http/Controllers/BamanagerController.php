<?php
namespace App\Http\Controllers;
// use App\Http\Controllers\Controllers;
//接收資料
use Illuminate\Http\Request;
//加密
use Illuminate\Support\Facades\Hash;
//File
// use Illuminate\Support\Facades\File;
//自訂函數
use App\Http\Controllers\CustomFn;
//DB
use DB;
use App\Models\Manager;

class BamanagerController extends Controller
{
  
  //共用 ----------------------------------------------------------------
  public $result = [
    'end'=>8,//顯示數量
    'releases' => 'y', //狀態預設
    'breads'=>array(
      ['name'=>'設定','url'=>''],
      ['name'=>'帳戶','url'=>''],
    ),//麵包
  ];
  //要驗證的值
  // 'phone' => 'required|digits_between:6,20',
  public $validate =[
    'cover' => 'required',
    'account' => 'required|email|max:50',
    'password' => 'required|max:20',
    'name' => 'required|max:20',
    'releases' => 'required|in:y,n',
  ];
  //修改的表
  // ['type'=>'tel','id'=>'phone','label'=>'管員電話'],
  // public $modifyforms = array(
  //   ['type'=>'release','id'=>'release','label'=>'管員狀態'],
  //   ['type'=>'text','id'=>'account','label'=>'管員帳號'],
  //   ['type'=>'text','id'=>'name','label'=>'管員姓名'],
  //   ['type'=>'password','id'=>'password','label'=>'管員密碼'],
  //   ['type'=>'file','id'=>'cover','label'=>'管員圖片','remark'=>'上傳檔案須小於 10 MB，建議尺寸：寬200px × 高200px 。圖片格式：JPG、PNG。'],
  // );
  //查詢的表
  public $serchforms = '[
    {"name":"releases","text":"狀態","type":"releases","value":"y","y_text":"啟用","n_text":"停用"},
    {"name":"account","text":"帳號","type":"text"},
    {"name":"name","text":"姓名","type":"text"},
    {"name":"updated_at","text":"更新日期","type":"text"},
    {"name":"modify","text":"編輯","type":"modify"}
  ]';
  public function search()
  {
    $result= CustomFn::search($this->result['main_db']::count(), $this->result['end'], $this->result['pageNow']);
    $datas = $this->result['main_db']::offset($result['startValue'])->limit($result['endValue'])->orderBy('id', 'desc')->get();
    $this->result['datas'] =  $datas;
    $this->result['pageStart'] =  $result['pageStart'];
    $this->result['pageTotle'] =  $result['pageTotle'];
    // dd($datas);
    return view($this->result['viewName'], $this->result);
  }
  public function addpost($request)
  {
    // dd(env('MIX_SRC'));
    //接收驗證資料
    $input = $request->validate($this->validate);

    //驗證帳號
    $user = Manager::where('account', $input['account'])->first();
    if($user)
    {
      return CustomFn::errorFn($this->result['viewNameError'],[
        'account' => [
          '帳號重複',
        ]
      ]);
    }

    $this->result['main_db']::create([
      'cover' => CustomFn::imgAdd($input['cover'],'bamanager'),
      'account' => $input['account'],
      'password' => Hash::make($input['password']),
      'name' => $input['name'],
      // 'phone' => $input['phone'],
      'releases' => $input['releases'],
    ]);
    return redirect($this->result['viewName']);
  }
  public function updatepost(Request $request)
  {
    //接收驗證資料 需濾掉password
    // unset($this->validate["password"]);
    // dd($this->validate);
    $this->validate =[
      'cover' => 'required',
      'account' => 'required|email|max:50',
      'password' => 'max:20',
      'name' => 'required|max:20',
      'releases' => 'required|in:y,n',
    ];
    $input = $request->validate($this->validate);


    //驗證帳號
    $user = Manager::where('account', $input['account'])->get()->count();
    // dd($user);
    if($user>1)
    {
      return CustomFn::errorFn($this->result['viewNameError'],[
        'account' => [
          '帳號重複',
        ]
      ]);
    }

    $data = $this->result['main_db']::find($this->result['main_id']);
    $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,'bamanager');
    if($imgUpdata){
        $data->cover = $imgUpdata;
    }
    $data->account = $input['account'];
    $data->name = $input['name'];
    // $data->phone = $input['phone'];
    $data->releases = $input['releases'];
    if($input['password']){
      $data->password = Hash::make($input['password']);
    }
    $data->save();
    //回到更新頁
    return redirect($this->result['viewName']);
  }

  //後台管員 Manager  ----------------------------------------------------------------
  public function bamanager_search($pageNow = 1)
  {
    $this->result['active'] = 'bamanager';
    $this->result['mainTitle'] = '帳戶';
    $this->result['pageNow'] = $pageNow; //預設第一頁
    $this->result['main_db'] = new Manager;
    $this->result['viewName'] = 'bamanager';
    $this->result['forms'] = json_decode($this->serchforms,true);
    return $this->search();
  }
  public function bamanager_add()
  {
    $this->result['breads'] =array(
      ['name'=>'設定','url'=>''],
      ['name'=>'帳戶','url'=>'bamanager'],
      ['name'=>'帳戶新增','url'=>''],
    );
    $this->result['active'] = 'bamanager_add';
    $this->result['mainTitle'] = '新增';
    $this->result['forms'] = array(
      ['type'=>'releases','id'=>'releases','label'=>'管員狀態'],
      ['type'=>'text','id'=>'account','label'=>'管員帳號'],
      ['type'=>'text','id'=>'name','label'=>'管員姓名'],
      ['type'=>'password','id'=>'password','label'=>'管員密碼'],
      ['type'=>'file','id'=>'cover','label'=>'管員圖片','remark'=>'上傳檔案須小於 1 MB，建議尺寸：寬120px × 高120px 。圖片格式：JPG、PNG。'],
    );
    return view('bamanager_update', $this->result);
  }
  public function bamanager_addpost(Request $request)
  {
    $this->result['main_db'] = new Manager;
    $this->result['viewName'] = 'bamanager';
    $this->result['viewNameError'] = 'bamanager_add';
    return $this->addpost($request);
  }
  public function bamanager_update($id)
  {
    $this->result['active'] = 'bamanager_update';
    $this->result['mainTitle'] = '修改';
    $this->result['datas'] = Manager::find($id);
    $this->result['breads'] =array(
      ['name'=>'設定','url'=>''],
      ['name'=>'帳戶','url'=>'bamanager'],
      ['name'=>'帳戶修改','url'=>''],
    );
    $this->result['forms'] = array(
      ['type'=>'releases','id'=>'releases','label'=>'管員狀態'],
      ['type'=>'text','id'=>'account','label'=>'管員帳號'],
      ['type'=>'text','id'=>'name','label'=>'管員姓名'],
      ['type'=>'file','id'=>'cover','label'=>'管員圖片','remark'=>'上傳檔案須小於 1 MB，建議尺寸：寬120px × 高120px 。圖片格式：JPG、PNG。'],
    );
    $this->result['forms2'] = array(
      ['type'=>'password','id'=>'password','label'=>'管員密碼']
    );
    return view('bamanager_update', $this->result);
  }
  public function bamanager_updatepost(Request $request, $id, $pageId)
  {
    $this->result['main_db'] = new Manager;
    $this->result['main_id'] = $id;
    $this->result['pageId'] = $pageId;
    $this->result['viewName'] = 'bamanager/'.$pageId;
    $this->result['viewNameError'] = 'bamanager_update/'.$id.'/'.$pageId;
    return $this->updatepost($request);
  }
  public function bamanager_password($id,$pageId,$value){
    $data = Manager::find($id);
    $data->password = Hash::make($value);
    $data->save();
    return redirect('bamanager/'. $pageId);
  }
  public function bamanager_delete($id, $pageId)
  {
    $data = Manager::find($id);
    CustomFn::imgDelet($data);
    $data->delete();
    return redirect('bamanager/'. $pageId);
  }
  public function bamanager_deleteAll(Request $request)
  {
    // 獲取 POST 原始內容
    $jsonContent = $request->getContent();
    // 解析 JSON
    $postData = json_decode($jsonContent, true);
    $ids = $postData['ids'];
    foreach ($ids as $id) {
      $data = Manager::find($id);
      // dd($data);
      if($data){
        CustomFn::imgDelet($data);
        $data->delete();
      }else{
        return response()->json(array('status' => 500, 'message' => '刪除('.$id.')失敗'));
      }
    }
    return response()->json(array('status' => 200, 'message' => 'ok'));
  }
}
