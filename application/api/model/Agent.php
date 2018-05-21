<?php
namespace app\api\model;

use think\Model;
use think\Log;
use think\Cache;

class Agent extends Model
{
    /**
     * 新增代理
     */
    public function created_agent($data)
    {
        //系统日志
        
        //字段验证
        if(!array_key_exists('account',$data))
        {
            return  return_json(2,'新增代理账号不能为空');
        }
        if(!array_key_exists('password',$data))
        {
            return  return_json(2,'新增代理密码不能为空');
        }
        if(!array_key_exists('pid',$data))
        {
            return  return_json(2,'新增代理未定义');
        }
        
        //参数验证       
        $insert['account'] = $data['account'];
        $insert['password']= md5($data['password']);
        //防止重复
        $find = $this->where($insert)->find();
        if($find)
        {
           return return_json(2,'账号已存在');
        }
        //执行添加
        $insert['pid']     = $data['pid'];
        $insert['created_at'] = time();
        $res = $this->insert($insert);
        if(!$res)
        {
           return  return_json(2,'创建失败');
        }else{
            unset($insert['password']);
            $res = $this->where($insert)->find();
           return return_json(1,'创建成功',$res);
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
        if(!array_key_exists('account',$data))
        {
            return  return_json(2,'代理账号不能为空');
        }
        if(!array_key_exists('password',$data))
        {
            return  return_json(2,'代理密码不能为空');
        }
        $find['account'] = $data['account'];
        $find['password'] = md5($data['password']);
        $find['status']   = 1;
        $find['pid'] = array('neq',0);
        //查询数据
        $response = $this->where($find)->field('id,pid,account,card_num,token')->find();
        if($response['pid']===0)
        {
            return return_json(2,'账号或者密码有误,请重试');
        }
        if ($response) 
        {
            Log::info('调用登录接口——查询成功');
            $insert['agent_id'] = $response['id'];
            $insert['login_time'] = time();
            $insert['operation'] = '用户登录';
            $result = db('agent_log')->insert($insert);
            if (!$result) {
                return return_json(2,'账号或者密码有误,请重试');
            }
            //缓存token
      /*       $token = md5(time().'hand_game');
            $res = $this->where($find)->update(['token'=>$token]);
            Cache::set('user_'.$response['id'],'123456',1800); */
            return return_json(1,'登录成功',$response);
        } else {
            Log::info('调用登录接口——查询失败');
            return return_json(2,'账号或者密码有误,请重试');
        }
    }
    /**
     * 平台房卡数
     */
    public function agent_card_num($data)
    {
        if(!array_key_exists('id',$data))
        {
            return  return_json(2,'代理账号不存在');
        }
    
        $where['id'] = $data['id'];
        $find = $this->field('card_num')->where($where)->find();
        if(!$find)
        {
            return return_json(2,'账号信息有误');
        }
        return return_json(1,'代理房卡',$find);
    }
    /**
     * 平台退出
     */
    public function plat_loginout($data)
    {
        if(!array_key_exists('account',$data))
        {
            return  return_json(2,'代理账号不能为空');
        }

        $where['account'] = $data['account'];
        $find = $this->where($where)->find();
        if(!$find)
        {
            return return_json(2,'账号信息有误');
        }
        return return_json(1,'成功退出');                
    }
    public  function agent_change($data)
    {
        //字段检验  id account password
        //参数检验 
        if(!array_key_exists('account',$data))
        {
            return  return_json(2,'代理账号不能为空');
        }
        if(!array_key_exists('opassword',$data))
        {
            return  return_json(2,'旧密码不能为空');
        }
        if(!array_key_exists('password',$data))
        {
            return  return_json(2,'代理密码不能为空');
        }
        if(!array_key_exists('id',$data))
        {
            return  return_json(2,'代理不存在');
        }
        $where['password'] =  md5($data['opassword']); 
        $where['account'] =  $data['account'];  
        $update['password'] = md5($data['password']);
        unset($data['password']);
        //检查账号是否存在
        $find = $this->where($where)->find();
        if($find['password']==$update['password'])
        {
            return return_json(2,'修改密码相同');
        }
        //执行修改
        $response  = $this->where(['id'=>$data['id']])->update($update);
        if(!$response)
        {
            return return_json(2,'修改失败');
        }
        //返回结果 
        $return = $this->where($where)->find();
        return return_json(1,'修改成功',$return);
        
    }
    /**
     * 平台登录接口
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
        if(!array_key_exists('account',$data))
        {
            return  return_json(2,'代理账号不能为空');
        }
        if(!array_key_exists('password',$data))
        {
            return  return_json(2,'代理密码不能为空');
        }
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