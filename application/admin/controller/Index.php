<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    /**
     * 后台管理首页
     */

    public function index(){
        $user = session('admin.user')["username"];
        return view('admin@index/index', compact('user'));
    }

    /**
     * 欢迎页面
     */
    public function welcome(){
        // 1. 获取用户信息
        $user = session('admin.user')["username"];
        // 2. 统计数据库
        $immuno = Db::name('immunotherapy')->count();     // 免疫用药
        $chemo = Db::name('chemotherapy')->count();       // 化疗用药
        $clin  = db('clinicaltrial')->count();            // 临床实验
        $drug  = db('approval')->count();                 // 药物获批
        $other = db('immuno_other')->count();             // 其它免疫

        $data = array(
            'user' => $user,
            'immuno' => $immuno,
            'chemo'  => $chemo,
            'clin'   => $clin,
            'drug'   => $drug,
            'other'  => $other            
        );
        return view('admin@index/welcome', compact('data'));
    }

    /**
     * 注销登录
     */
    public function logout(){

        // 删除session 登录状态
        session('admin.user', null);

        // 跳转到登录页面
        $this->success('注销登录成功!', 'admin/login/index');
    }


}
