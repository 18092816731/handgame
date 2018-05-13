<?php
namespace app\api\model;

use think\Model;
use think\Log;

class Agent extends Model
{
    /**
     * 新增代理
     */
    public function created_agent()
    {
        //系统日志
        
        //字段验证
        
        //参数验证       
        $insert['account'] = '123456';
        $insert['password']= md5('123456'); 
        $insert['pid']     = '0';
        //防止重复
        $find = $this->where($insert)->find();
        if($find)
        {
           return return_json(2,'账号已存在');
        }
        //执行添加
        $insert['created_at'] = time();
        $res = $this->insert($insert);
        if(!$res)
        {
           return  return_json(2,'创建失败');
        }else{
           return return_json(1,'创建成功');
        }
    }

    /**
     * 代理登录接口
     * @param $data 请求数组
     * @return string 返回参数值类型为json
     */
    public function login($data)
    {
        Log::info('调用登录接口——请求开始');
    /*     //检测数据
        $response = testing(['username','password','captcha']);
        $response = json_decode($response);
        if ($response->result_code != 200) {
            return $response;
        } */
    /*     //校验验证码
        if(!captcha_check($data['captcha'],'login')){
            //验证失败
            return return_json(2,'验证码输入错误');
        }; */
        //数据组装
        Log::info('调用登录接口——数据组装');
        $find['account'] = $data['account'];
        $find['password'] = md5($data['password']);
        $find['status']   = 1;
        //查询数据
        $response = $this->where($find)->field('id,pid,account,card_num,token')->find();
        if ($response) {
            Log::info('调用登录接口——查询成功');
            $insert['agent_id'] = $response['id'];
            $insert['login_time'] = time();
            $insert['operation'] = '用户登录';
            $result = db('agent_log')->insert($insert);
            if (!$result) {
                return return_json(2,'账号或者密码有误,请重试');
            }
            return return_json(1,'登录成功',$response);
        } else {
            Log::info('调用登录接口——查询失败');
            return return_json(2,'账号或者密码有误,请重试');
        }
    }
    /**
     * 代理登录接口
     * @param $data 请求数组
     * @return string 返回参数值类型为json
     */
    public function login_plat($data)
    {
        Log::info('调用登录接口——请求开始');
        /*     //检测数据
         $response = testing(['username','password','captcha']);
         $response = json_decode($response);
         if ($response->result_code != 200) {
         return $response;
         } */
        /*     //校验验证码
         if(!captcha_check($data['captcha'],'login')){
         //验证失败
         return return_json(2,'验证码输入错误');
         }; */
        //数据组装
        Log::info('调用登录接口——数据组装');
        $find['account'] = $data['account'];
        $find['password'] = md5($data['password']);
        $find['status']   = 1;
        //查询数据
        $response = $this->where($find)->field('id,pid,account,card_num,token')->find();
        if($response['pid'] !=0)
        {
            return return_json(2,'非平台账号');
        }
        if ($response) {
            Log::info('调用登录接口——查询成功');
            $insert['agent_id'] = $response['id'];
            $insert['login_time'] = time();
            $insert['operation'] = '用户登录';
            $result = db('agent_log')->insert($insert);
            if (!$result) {
                return return_json(2,'账号或者密码有误,请重试');
            }
            return return_json(1,'登录成功',$response);
        } else {
            Log::info('调用登录接口——查询失败');
            return return_json(2,'账号或者密码有误,请重试');
        }
    }
    
}