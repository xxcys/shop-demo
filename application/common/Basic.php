<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2021/12/2
 * Time: 23:06
 */

namespace app\common\controller;


use App\Http\Controllers\Controller;

class Basic extends Controller
{
    public function _initialize()
    {
        //判断有无admin_username这个session，如果没有，跳转到登陆界面
        if(!session('username')){
            return $this->error('您没有登陆',url('Login/login'));
        }
    }
}