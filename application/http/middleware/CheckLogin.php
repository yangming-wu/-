<?php

namespace app\http\middleware;

class CheckLogin{
    public function handle($request, \Closure $next){

        // 判断用户是否登录
        if(! session('?admin.user')){
            // 用户没有登录
            return redirect(url('admin/login/index'))->with('error', '非法请求后台, 请登录账号!');
        }

        // 用户已登录
        return $next($request);

    }
}
