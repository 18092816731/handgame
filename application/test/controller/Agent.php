<?php 
namespace app\test\controller;
use think\Cache;

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
        $data['agent_account']  = '18092816731';
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
       // $url = $this->webUrl.'api/platform/agentSendLog';
        $url = $this->testUrl.'api/platform/agentSendLog';
        $data = [];
        //$data['account'] = '8';
        //$data['start_time'] = '1526351618';
        //$data['end_time'] = '1526352244';
       // $data['npage'] =1;
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
        $url = $this->webUrl.'api/agent/agentLogin';
        $data['account'] = '888888';
        $data['opassword']  = '123456';
        $data['password']  = '1234567';
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agentSendCard()
    {
        $url = $this->webUrl.'api/agent/agentSendCard';
        $data['id'] = 5;
        $data['user_account']  = '10002079';
        $data['card_num'] = 20;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agent_change()
    {
       // $url = $this->webUrl.'api/agent/agent_change';
        $url = $this->testUrl.'api/platform/agentChange';
        $data['account'] = '888888';
        $data['password']  = '1234567';
        $data['opassword'] = '123456';
        $data['id'] = 5;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function agentGetCard()
    {
        $url = $this->webUrl.'api/agent/agentGetCard';
        $data['id'] =5;
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
       // $data['start_time'] = '1526351618';
       // $data['end_time'] = '1526352244';
        $data['npage'] =2;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function nickname()
    {
        $url = $this->webUrl.'api/agent/nickname';
        // $data['start_time'] = '1526351618';
        // $data['end_time'] = '1526352244';
        $data['user_account'] =100021;
        $res = $this->curl_($url, $data);
        dump($res);
    }
    public function aaa()
    {
        $dataGame['userId'] = '18298562563';
        $dataGame['card'] = 500;
        $dataGame['reqIp'] = get_client_ip();
        $dataGame['master'] ='666666';
        $dataGame['time'] = time();
        //sign = f568e7600edd703e6691f0c3d28337a2
        //http://112.74.161.230:8081/msh/AddArenaCard?card=500&master=666666s&reqIp=2130706433&userId=18298562563&time=1526103003&auth=b17795bc06f0efec235e91333220c829
        echo $dataGame['time'].'<br>';
        $dataGame['auth'] = get_auth($dataGame);
       echo  $dataGame['auth'];
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