<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return  'ol123';
        //$res = db('user_log')->select();
        
        //return view('index');
    }
    public function  check_img()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }
}
