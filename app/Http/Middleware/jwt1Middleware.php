<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class jwt1Middleware extends BaseMiddleware
// class jwt1Middleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        // dd(JWTAuth::parseToken()->getClaim('role'));
        // dd($this->auth->parseToken()->getClaim('role'));
        dd(auth('jwt1')->check());
        // if(JWTAuth::parseToken()->getClaim('role') == 'jwt1'){
        //   return $next($request);
        // }
        // $token_role = $this->auth->parseToken()->getClaim('role');
        // dd($token_role);
        // try {
        //     // 解析token角色
        //     $token_role = $this->auth->parseToken()->getClaim('role');
        // } catch (JWTException $e) {
        //     /**
        //      * token解析失败，说明请求中没有可用的token。
        //      * 为了可以全局使用（不需要token的请求也可通过），这里让请求继续。
        //      * 因为这个中间件的责职只是校验token里的角色。
        //      */
        //     return $next($request);
        // }

        // // 判断token角色。
        // if ($token_role != $role) {
        //     return 'User role error';
        //     // throw new UnauthorizedHttpException('jwt-auth', 'User role error');
        // }
    }
}
