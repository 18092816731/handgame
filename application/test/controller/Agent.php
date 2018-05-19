<?php 
namespace app\test\controller;

class Agent 
{
    protected $webUrl;
    protected $testUrl;
    public function __construct()
    {
        $this->webUrl = 'http://www.handgame.com/';
        $this->testUrl = 'baiyao.91yelang.top/';
    }
    public function login()
    {
        $url = $this->webUrl.'api/platform/platLogin';
        //$url = $this->testUrl.'api/platform/plat_login';
        $data['account'] = '666666';
        $data['password']  = '123456';
        $res = $this->curl_($url, $data);
        dump($res);
    } 
    public function platSendCard()
    {
        //$url = $this->webUrl.'api/platform/platSendCard';
        $url = $this->testUrl.'api/platform/platSendCard';
        $data['id'] = '10';
        $data['agent_account']  = '888888';
        $data['card_num'] = 20;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function platSendLog()
    {
        //$url = $this->webUrl.'api/platform/platSendLog';
        $url = $this->testUrl.'api/platform/platSendLog';
        $data = [];
        //$data['agent_account'] = '8';
        //$data['npage'] =1;
        //$data['start_time'] = '1526351618';
        //$data['end_time'] = '1526352244';
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agentSendLog()
    {
        $url = $this->webUrl.'api/platform/agentSendLog';
        //$data['account'] = '8';
        //$data['start_time'] = '1526351618';
        //$data['end_time'] = '1526352244';
        $data['npage'] =1;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function plat_created()
    {
        $url = $this->webUrl.'api/platform/plat_created';
        $data['account'] = '666888';
        $data['password']  = '123456';
        $data['pid'] =4;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function plat_loginout()
    {
        $url = $this->webUrl.'api/platform/plat_loginout';
        $data['account'] = '666888';
        $res = $this->curl_($url, $data);
        dump($res);
    }
    /*-----------------------代理-------------------------------  */
    public function agent_login()
    {
        $url = $this->webUrl.'api/agent/agent_login';
        $data['account'] = '888888';
        $data['password']  = '123456';
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agentSendCard()
    {
        $url = $this->webUrl.'api/agent/agentSendCard';
        $data['id'] = 5;
        $data['user_account']  = 'ID564823';
        $data['card_num'] = 20;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agent_change()
    {
        $url = $this->webUrl.'api/agent/agent_change';
        $data['account'] = '888888';
        $data['password']  = '1234567';
        $data['id'] = 5;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agentGetCard()
    {
        $url = $this->webUrl.'api/agent/agentGetCard';
        $data['id'] =5;
      //  $data['agent_account'] = 888888;
        //$data['start_time'] = '1526351618';
        //$data['start_time'] =   '1526352244';
        $data['npage'] =1;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agentSendLog1()
    {
        $url = $this->webUrl.'api/agent/agentSendLog';
        $data['id'] = 5;
        //$data['agent_account'] = 888888;
       // $data['start_time'] = '1526351618';
       // $data['end_time'] = '1526352244';
        $data['npage'] =2;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    
    
    
    public function curl_($url,$data)
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
}