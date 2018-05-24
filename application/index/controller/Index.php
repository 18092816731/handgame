<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        echo md5('xamsh002');
        echo '<br>';
        echo md5('xamsh003');
        //$res = db('user_log')->select();
        
        //return view('index');
    }
    public function  check_img()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }
}
