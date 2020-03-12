<?php

namespace app\admin\validate;

use think\Validate;

class UserValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'username' => 'require|min:5',
        'password' => 'require',
        'vcode'     => 'require|captcha'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require' => '用户名不能为空!',
        // 'username.token'   => '令牌数据无效!',
        'username.min'     => '用户名不能少于5个字符!',
        'password.require' => '密码不能为空!',
        'vcode.require'    => '验证码不能为空!',
        'vcode.captcha'    => '验证码错误!' 
    ];
}
