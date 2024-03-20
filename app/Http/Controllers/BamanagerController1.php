<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;
use Illuminate\Support\Facades\Validator;//驗證資料

class BamanagerController1 extends Controller
{
    /**
     * 取全部
    */
    function all() {
      return response()->json(Manager::all(), 200);
    }
    
    /**
    * 取單一
    */
    function find($id) {
      return response()->json(Manager::find($id), 200);
    }

    /**
    * 建立
    */
    function create(Request $request) {
      $validator = Validator::make($request->all(), [
          # 'role' => 'required|string',
          // 'name' => 'required|string|between:2,100',
          'account' => 'required',
          'password' => 'required',
      ]);
      if ($validator->fails()) {
          return response()->json($validator->errors()->toJson(), 400);
      }
      $user = Manager::create(array_merge(
          $validator->validated(),
          // ['password' => bcrypt($request->password)]
      ));
      return response()->json([
          'message' => 'User successfully registered',
          'user' => $user
      ], 200);

      // $post = new Manager;
      // $post->title = $request->input('title', '沒有標題');
      // $post->body = $request->input('body', '沒有內文。');
      // $ok = $post->save();
      // return response()->json(['ok' => $ok], 200);
    }

    /**
     * 更新
     */
    function update(Request $request, $id) {
      $ok = false;
      $msg = '';
      //
      $post = Manager::find($id);
      if ($post) {
          $post->title = $request->input('title', '沒有標題');
          $post->body = $request->input('body', '沒有內文。');
          $ok = $post->save();
          if (!$ok) $msg = '更新失敗！';
      } else {
          $msg = '找不到文章';
      }

      return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    /**
     * 刪除
     */
    function delete($id) {
      $rows = Manager::destroy($id);
      $ok = ($rows > 0);
      return response()->json(['ok' => $ok], 200);
    }
}
