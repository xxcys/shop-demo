<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;

class Index extends Controller
{
    /**拦截**/
    public function __construct(){
        parent::__construct();
        if(!session('mname')){
            return $this->error("NO!你没有登录！",url('Login/index'));
        }
    }
    public function index(){
        //首页
        $admin = Session::get();
        $this->assign('mname',session('mname'));
        return $this->fetch();
    }


}
