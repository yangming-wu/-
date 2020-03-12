<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 引入Route门面
use think\facade\Route;


/**
 * 后台路由
 */

Route::group('admin', function(){

  // 登录页面
  Route::get('login', '@admin/login/index')->name('admin/login/index');
  // 处理登录
  Route::post('login', '@admin/login/loginHandler')->name('admin/login/index');

  // 后台管理  --- 使用中间件,所有请求需要先验证登录
  Route::group(['middleware' => ["CheckLogin"]], function(){
    
    // 首页
    Route::get('index', '@admin/index/index')->name('admin/index/index');
    Route::get('welcome', '@admin/index/welcome')->name('admin/index/welcome');
    Route::get('logout', '@admin/index/logout')->name('admin/index/logout'); // 退出登录

    // 免疫用药 --- 资源路由
    Route::resource('immunotherapy','@admin/immuno');
    Route::post('immunotherapy/delAll', '@admin/immuno/delAll')->name('admin/immuno/delAll');
    Route::post('immunotherapy/upload', '@admin/immuno/upload')->name('admin/immuno/upload'); // 文件上传

    // 其它免疫 --- 资源路由
    Route::resource('immuno_other','@admin/immother')->name('admin/immother');
    Route::post('immuno_other/delAll', '@admin/immother/delAll')->name('admin/immother/delAll');
    Route::post('immuno_other/upload', '@admin/immother/upload')->name('admin/immother/upload'); // 文件上传

    // 临床实验 --- 资源路由
    Route::resource('clinicaltrial', '@admin/clinical');
    Route::post('clinicaltrial/delAll', '@admin/clinical/delAll')->name('admin/clinical/delAll');
    Route::post('clinicaltrial/upload', '@admin/clinical/upload')->name('admin/clinical/upload'); // 文件上传

    // 药物获批
    Route::resource('approval', '@admin/drug_approval');
    Route::post('approval/delAll', '@admin/drug_approval/delAll')->name('admin/drug_approval/delAll');
    Route::post('approval/upload', '@admin/drug_approval/upload')->name('admin/drug_approval/upload'); // 文件上传

    // 化疗用药 --- 资源路由
    Route::resource('chemotherapy','@admin/chemo');
    Route::post('chemotherapy/delAll', '@admin/chemo/delAll')->name('admin/chemo/delAll'); // 批量删除
    Route::post('chemotherapy/upload', '@admin/chemo/upload')->name('admin/chemo/upload'); // 文件上传


  });



});















