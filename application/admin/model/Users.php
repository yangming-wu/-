<?php

namespace app\admin\model;

use think\Model;

class Users extends Model
{
    /**
     * 验证用户是否登录
     */
    public function checkUser($data){

        $ret = $this->where('username',$data['username'])->find();
        if(!$ret){
            return false;
        }

        $passwd = $ret['password'];
        if($passwd != md5($data['password'])){
            return false;
        }

        // 登录成功,保存信息到session中
        session('admin.user', $ret);

        return true;
    }
}
