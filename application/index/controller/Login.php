<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2021/11/30
 * Time: 15:25
 */

namespace app\index\controller;
use app\index\model\MemberModel;
use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Login extends Controller
{
    //渲染页面
    public function index()
    {
        return $this->fetch();
    }
    //验证登录
    public function login(Request $request)
    {
        //接收数据
        $data = $request->param();
        //处理数据
            $model = new MemberModel();
            $result = $model->loginCheck($data, 'admin');
            if ($result['code'] === 200) {

//            echo json_encode($result_data);
                return $this->success($result['msg'], url('index/index/index'));
            } else {

//            echo json_encode($result_data);
                return $this->error($result['msg']);

        }
    }

    /**
     * 退出登录
     *
     * @param  int  $id
     * @return \think\Response
     */

    public function loginOut(){
        session('mname',null);
        $this->success('注销成功',url('index/login/index'));
    }
}