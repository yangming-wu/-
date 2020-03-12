<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\validate\UserValidate;


/**
 * 后台登录控制器类
 */

class Login extends Controller
{
    /**
     * 登录页面首页
     */

    public function index(){
        // 显示登录页面首页视图
        return view("admin@login/index");
    }

    /**
     * 处理登录
     */
    public function loginHandler(Request $request){
        // dump($request->post());

        // 1. 获取参数
        $input = $request->post();

        // 2. 验证数据
        $ret = $this->validate($input, UserValidate::class);
        // var_dump($ret);
        if($ret !== true){
            // 数据验证失败
            $this->error($ret . '请重新登录!');
        }

        // 3. 调用模型验证登录
        // $model = new \app\admin\model\users();
        // $ret = $model->checkUser($input);

        $ret = model('users')->checkUser($input);
        if(!$ret){
            return $this->error("用户名或密码不正确!");
        }else{
            return redirect(url("admin/index/index"));
            // return $this->success("登录成功 --- 后台首页!");
        }
    }







}
