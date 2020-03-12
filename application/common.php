<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

// 判断一个函数是否存在
if (!function_exists('webmd5')) {

    function webmd5($arg){
        return md5(md5($arg));
    }
}

// 字符串转整型
if (!function_exists('getInt')){
    function getInt($str){
        return intval($str);
    }
}

// 读取.xls|.xlsx文件
if (! function_exists('exportExcel')){
    function exportExcel($excel, $fields = array(), $ext='.xls'){

        // 加载读取EXCEL文件的插件 --- 插件目录获取需要修改
        require "../vendor/PHPExcel-1.8/Classes/PHPExcel.php";
        require "../vendor/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";
        require "../vendor/PHPExcel-1.8/Classes/PHPExcel/Shared/Date.php";

        $res = array(); 
        //加载excel文件
        $objPHPExcelReader = PHPExcel_IOFactory::load($excel);
        $sheet = $objPHPExcelReader->getSheet(0);        // 获取第一个数据表内容
        $highestRow    = $sheet->getHighestRow();        // 取得总行数  
        $data = $sheet->toArray(); // 数据转化为数组
        if($data[0] != $fields){ // 检查表头是否正确
            return array('statu' => 1, 'msg' => '请检查文件表头是否正确!');
        }
        $highestColumn = count($data[0]);     // 取得总列数
        for($row = 2; $row <= $highestRow; $row ++){ // 跳过表头, 逐行读取
            $tmpxx = array();
            for($col = 1; $col <= $highestColumn; $col ++){ // 逐列读取
                $index = $col - 1;
                $field = $data[0][$index];
                $value = $data[$row - 1][$index];
                if(is_null($value) || $value == ""){
                    $tmpxx[$field] = 'NA';
                }else{
                    $tmpxx[$field] = $value;
                }
                
            }
            array_push($res, $tmpxx);
        } 
        // foreach($sheet->getRowIterator() as $row) { // 逐行读取数据
        //     $tmpxx = array();
        //     foreach($row->getCellIterator() as $cell){ // 逐列读取数据
            
        //     }
        // }

        return array('statu' => 0, 'msg' => $res);
    }
}