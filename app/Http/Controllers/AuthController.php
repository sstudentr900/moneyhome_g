<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;
use Illuminate\Support\Facades\Validator;//驗證資料

class AuthController extends Controller
{
  /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    /**
     * Get a JWT via given credentials. (使用者登入)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        //1.
        // $validator = Validator::make($request->all(), [
        //     # 'role' => 'required|string',
        //     'account' => 'required',
        //     // 'password' => 'required|string|min:6',
        //     'password' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }
        // // dd($validator->validated());
        // dd(auth('jwt1')->attempt(['account'=>'1@1.1','password'=>'1']));
        // if (!$token = auth()->attempt($validator->validated())) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        // // dd('login',$token);
        // return $this->createNewToken($token);

        //2.
        $value = ['account'=>'2@2.2','password'=>'1'];
        $token = auth('jwt1')->attempt($value);
        return response()->json([
          'access_token' => $token,
          'token_type' => 'bearer',
          'expires_in' => auth("jwt1")->factory()->getTTL() * 60,
          'user' => auth()->user()
      ]);
    }

    /**
     * Register a User. (使用者註冊)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
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
            ['password' => bcrypt($request->password)]
        ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token). (使用者登出，移除 JWT token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token. (更新 JWT token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // return $this->createNewToken(auth()->refresh());
        return $this->createNewToken(auth("jwt1")->refresh());
    }

    /**
     * Get the authenticated User. (以 JWT token 取得使用者資訊)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        // return response()->json(auth()->user());
        return response()->json(auth("jwt1")->user());
    }
    public function jj () {
      // return '必要API';
      return response()->json(123);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


}
