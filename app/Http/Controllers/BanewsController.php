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
use App\Models\Banews as nowDB;

class BanewsController extends Controller
{
  
  //共用 ----------------------------------------------------------------
  public $result = [
    'active'=>'banews',//class
    'mainTitle'=>'最新消息',//標題
    'viewName'=>'banews',//標題
    'end'=>8,//顯示數量
    'releases' => 'y', //狀態預設
    // 'breads'=>array(
    //   ['name'=>'官網','url'=>''],
    //   ['name'=>$this->result['mainTitle'],'url'=>$this->result['active']],
    // ),//麵包
  ];
  //要驗證的值
  public $validate =[
    'releases' => 'required|in:y,n',
    'cover' => 'required',
    'sort' => 'required',
    'assort' => 'required|max:20',
    'title' => 'required|max:50',
    'content' => 'required|max:200',
    'tinymce' => 'required|max:2848000',
  ];
  //查詢的表
  public $serchforms = '[
    {"name":"releases","text":"狀態","type":"releases","value":"y","y_text":"啟用","n_text":"停用"},
    {"name":"cover","text":"封面","type":"cover"},
    {"name":"sort","text":"排序","type":"text"},
    {"name":"assort","text":"分類","type":"select","selects":[{"id":"1","value":"最新資訊"},{"id":"2","value":"優惠活動"},{"id":"3","value":"新品登場"}]},
    {"name":"title","text":"標題","type":"text"},
    {"name":"updated_at","text":"更新日期","type":"text"},
    {"name":"modify","text":"編輯","type":"modify"}
  ]';
  //修改的表
  public $modifyforms = array(
    ['type'=>'releases','id'=>'releases','label'=>'狀態'],
    ['type'=>'sort','id'=>'sort','label'=>'排序'],
    ['type'=>'select','id'=>'assort','label'=>'分類','options'=>array(1=>'最新資訊',2=>'優惠活動',3=>'新品登場')],
    ['type'=>'text','id'=>'title','label'=>'標題'],
    ['type'=>'textarea','id'=>'content','label'=>'解說'],
    ['type'=>'file','id'=>'cover','label'=>'封面','remark'=>'上傳檔案須小於 5 MB，建議尺寸：寬740px × 高480px 。圖片格式：JPG、PNG。'],
    ['type'=>'tinymce','id'=>'tinymce','label'=>'內文'],
  );

  //search
  public function search($pageNow = 1)
  {
    $this->result['breads'] =array(
      ['name'=>'官網','url'=>''],
      ['name'=>'最新消息','url'=>'banews'],
    );
    $this->result['pageNow'] = $pageNow; //預設第一頁
    $this->result['forms'] = json_decode($this->serchforms,true);
    //取得資料
    $result= CustomFn::search(nowDB::count(), $this->result['end'], $this->result['pageNow']);
    $this->result['datas'] = nowDB::offset($result['startValue'])->limit($result['endValue'])->orderBy('created_at', 'DESC')->get();
    $this->result['pageStart'] =  $result['pageStart'];
    $this->result['pageTotle'] =  $result['pageTotle'];
    return view($this->result['viewName'], $this->result);
  }

  //add
  public function add()
  {
  
    $this->result['mainTitle'] = '新增';
    $this->result['breads'] =array(
      ['name'=>'官網','url'=>''],
      ['name'=>'最新消息','url'=>'banews'],
      ['name'=>'新增','url'=>''],
    );
    $this->result['sortValue'] =  nowDB::max('id') + 1; //sort
    // $this->result['active'] = $this->result['active'].'_add';
    // $this->result['mainTitle'] = $this->result['mainTitle'].'_新增';
    $this->result['forms'] = $this->modifyforms;
    return view($this->result['viewName'].'_update', $this->result);
  }

  //addpost
  public function addpost(Request $request)
  {
    //接收驗證資料
    $input = $request->validate($this->validate);
    //新增資料
    nowDB::create([
      'cover' => $input['cover']?CustomFn::imgAdd($input['cover'],$this->result['viewName']):'',
      'title' => $input['title'],
      'content' => $input['content'],
      'assort' => $input['assort'],
      'sort' => $input['sort'],
      'releases' => $input['releases'],
      'tinymce' => $input['tinymce'],
    ]);
    return redirect($this->result['viewName']);
  }

  //update
  public function update($id)
  {
    // $this->result['active'] = 'banews_update';
    $this->result['mainTitle'] = '修改';
    $this->result['breads'] =array(
      ['name'=>'官網','url'=>''],
      ['name'=>'最新消息','url'=>'banews'],
      ['name'=>'修改','url'=>''],
    );
    $this->result['forms'] = $this->modifyforms;
    $this->result['datas'] = nowDB::find($id);
    return view($this->result['viewName'].'_update', $this->result);
  }

  //updatepost
  public function updatepost(Request $request, $id, $pageId)
  {
    $input = $request->validate($this->validate);
    $data = nowDB::find($id);
    $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,$this->result['viewName']);
    if($imgUpdata){
        $data->cover = $imgUpdata;
    }
    $data->title = $input['title'];
    $data->content = $input['content'];
    $data->assort = $input['assort'];
    $data->sort = $input['sort'];
    $data->releases = $input['releases'];
    $data->tinymce = $input['tinymce'];
    $data->save();
    //回到更新頁
    return redirect($this->result['viewName'].'/'.$pageId);
  }

  //delete
  public function delete($id, $pageId)
  {
    $data = nowDB::find($id);
    CustomFn::imgDelet($data);
    $data->delete();
    return redirect($this->result['viewName'].'/'.$pageId);
  }

  //deleteAll
  public function deleteAll(Request $request)
  {
    // 獲取 POST 原始內容
    $jsonContent = $request->getContent();
    // 解析 JSON
    $postData = json_decode($jsonContent, true);
    $ids = $postData['ids'];
    foreach ($ids as $id) {
      $data = nowDB::find($id);
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
