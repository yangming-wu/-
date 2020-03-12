<?php

/**
 * 验证码扩展参数
 */

return [

  'imageW'     => 150,    // 验证码图片宽
  'imageH'     => 45,     // 验证码图片高度
  'length'     => 4,      // 验证码位数
  'fontSize'   => 20,     // 字体大小
  'useNoise'   => false,   // 添加干扰点
  'useCurve'   => false,   // 是否画干扰曲线
  'expire'     => 300,   // 验证码过期时间(s)
];


?>