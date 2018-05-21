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
function  return_json($status =1 ,$msg = '',$data = [],$page=[])
{
    if($status ==1)
    {
        if($msg =='')
        {
            $msg = '操作成功';
        }        
        return json_encode(['status'=>'SUCCESS','code'=>200,'msg'=>$msg,'data'=>$data,'page'=>$page]);
    }else{
        if($msg =='')
        {
            $msg = '操作失败';
        }
        return json_encode(['status'=>'FAIL','code'=>201,'msg'=>$msg,'data'=>$data,'page'=>$page]);
    }
}

//post请求
function curl_($url,$data)
{
    $ch = curl_init();
    /***在这里需要注意的是，要提交的数据不能是二维数组或者更高
     *例如array('name'=>serialize(array('tank','zhang')),'sex'=>1,'birth'=>'20101010')
     *例如array('name'=>array('tank','zhang'),'sex'=>1,'birth'=>'20101010')这样会报错的*/
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_exec($ch);
}
//获取ip 
function get_client_ip(){
    if ($_SERVER['REMOTE_ADDR']) {
        $cip = $_SERVER['REMOTE_ADDR'];
    } elseif (getenv("REMOTE_ADDR")) {
        $cip = getenv("REMOTE_ADDR");
    } elseif (getenv("HTTP_CLIENT_IP")) {
        $cip = getenv("HTTP_CLIENT_IP");
    } else {
        $cip = "unknown";
    }
    return $cip;
}
function game_curl($url)
{    

    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    //执行并获取HTML文档内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    return $output;
}