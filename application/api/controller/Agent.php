<?php
namespace app\api\controller;

use app;
use think\Request;

class Agent
{
    //属性
    protected  $agent;
    protected  $userCard;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->agent = new \app\api\model\Agent();
        $this->userCard  = new \app\api\model\AgentCard();
    }
    /**
     * 1-1 新增代理账号
     * @param Request $request
     */
    public function agent_created(Request $request = null)
    {
        //获取参数 
        //调取添加表
        $res = $this->agent->created_agent();        
        return $res;
    }
    /**
     * 1-2 代理账号信息修改
     * @param Request $request
     */
    public function agent_change(Request $request = null)
    {
        //获取参数 

        $data = $request->param();
        //调取添加表
        $res = $this->agent->agent_change($data);        
        return $res;
    }
    /**
     * 1-3 代理登录
     * @param Request $request
     */
    public function agent_login(Request $request = null)
    {
        //获取参数
        $data = $request->param();
        //调取添加表
        $res = $this->agent->login($data);
        return $res;
    }
    /**
     * 2-1 代理发房卡
     * @param Request $request
     */
    public function agent_send_card(Request $request = null)
    {
        //获取参数
        $data = $request->param();
        //调取添加表
        $res = $this->userCard->send_card($data,2);
        return $res;
    }
    /**
     * 2-2 代理向平台购卡记录
     * @param Request $request
     */
    public function agent_get_card(Request $request = null)
    {
        //获取参数
        $data = $request->param();
        //调取添加表
        $res = $this->userCard->plat_send_log($data,2);
        return $res;
    }
    /**
     * 2-3 代理发卡记录
     * @param Request $request
     */
    public function agent_send_log(Request $request = null)
    {
        //获取参数
         $data = $request->param();
        //调取添加表
        $res = $this->userCard->agent_send_log($data,2);
        return $res;
    }
    /**
     * 验证码接口
     */

}