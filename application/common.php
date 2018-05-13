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
function  return_json($status =1 ,$msg = '',$data = [])
{
    if($status ==1)
    {
        if($msg =='')
        {
            $msg = '操作成功';
        }        
        return json_encode(['status'=>'SUCCESS','code'=>200,'msg'=>$msg,'data'=>$data]);
    }else{
        if($msg =='')
        {
            $msg = '操作失败';
        }
        return json_encode(['status'=>'FAIL','code'=>201,'msg'=>$msg,'data'=>$data]);
    }
}