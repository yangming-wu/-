<?php

// 引入Route门面
use think\facade\Route;

// 后台路由

Route::group('admin', function(){

  // 后台登录首页
  Route::get('login', '@admin/login/index')->name('admin/login/index');




});

