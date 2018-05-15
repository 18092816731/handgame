<?php 
namespace app\test\controller;

class Agent 
{
    protected $webUrl;
    public function __construct()
    {
        $this->webUrl = 'http://www.handgame.com/';
    }
    public function login()
    {
        $url = $this->webUrl.'api/platform/plat_login';
        $data['account'] = '666666';
        $data['password']  = '123456';
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function plat_send_card()
    {
        $url = $this->webUrl.'api/platform/plat_send_card';
        $data['id'] = '123456';
        $data['user_id']  = '888888';
        $data['card_num'] = 20;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function plat_send_log()
    {
        $url = $this->webUrl.'api/platform/plat_send_log';
        $data = [];
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agent_send_log()
    {
        $url = $this->webUrl.'api/platform/agent_send_log';
        $data = [];
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
    public function agent_send_card()
    {
        $url = $this->webUrl.'api/agent/agent_send_card';
        $data['id'] = 5;
        $data['user_id']  = 'ID564823';
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
    public function agent_get_card()
    {
        $url = $this->webUrl.'api/agent/agent_get_card';
        $data['id'] = 5;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agent_send_log1()
    {
        $url = $this->webUrl.'api/agent/agent_send_log';
        $data['id'] = 5;
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