<?php
namespace app\api\controller;
use think\Request;

class Platform 
{
    //属性
    protected  $agent;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->agent = new \app\api\model\Agent();
    }
    /**
     * 1-1 新增平台|游戏账号
     * @param Request $request
     */
    public function plat_created(Request $request = null)
    {
        //获取参数
        //调取添加表
        $res = $this->agent->created_agent();
        return $res;
    }
    /**
     * 1-2 平台|游戏账号信息修改
     * @param Request $request
     */
    public function plat_change(Request $request = null)
    {
        //获取参数
        //调取添加表
        $res = $this->agent->created_agent();
        return $res;
    }
    /**
     * 1-3 平台|游戏登录
     * @param Request $request
     */
    public function plat_login(Request $request = null)
    {
        //获取参数
        $data['account'] = '123456';
        $data['password'] = '123456';
        //调取添加表
        $res = $this->agent->login_plat($data);
        return $res;
    }
    /**
     * 2-1 平台|游戏发房卡
     * @param Request $request
     */
    public function plat_send_card(Request $request = null)
    {
        //获取参数
        //调取添加表
        $res = $this->agent->created_agent();
        return $res;
    }
    /**
     * 2-2 代理发卡记录
     * @param Request $request
     */
    public function plat_get_card(Request $request = null)
    {
        //获取参数
        //调取添加表
        $res = $this->agent->created_agent();
        return $res;
    }
    /**
     * 2-3 平台|游戏发卡记录
     * @param Request $request
     */
    public function plat_send_log(Request $request = null)
    {
        //获取参数
        //调取添加表
        $res = $this->agent->created_agent();
        return $res;
    }
    /**
     * 3-1 平台|游戏数据查询
     * @param Request $request
     */
    public function plat_data(Request $request = null)
    {
        //获取参数
        //调取添加表
        $res = $this->agent->created_agent();
        return $res;
    }
}