<?php

namespace app\admin\controller;

use app\admin\model\UserModel;
use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function login()
    {
        //渲染页面
        return $this->fetch();
    }

    /**
     * 验证登录
     *
     * @return \think\Response
     */
    public function checkLogin(Request $request)
    {
        //接收数据
        $data = $request->param();
        //处理数据
        $code = $data['code'];
        $captcha = new Captcha();
        if( !$captcha->check($code))
        {
//             验证失败
            $result_data['code']=400;
            $result_data['msg']='验证码错误';
            return $this->error( $result_data['msg']);
        }else {
            $model = new UserModel();
            $result = $model->checkLogin($data, 'admin');
            if ($result['code'] === 200) {
                return $this->success($result['msg'], url('admin/index/index'));
            } else {

                return $this->error($result['msg']);
            }
            }
    }

    /**
     * 退出登录
     *
     * @param  int  $id
     * @return \think\Response
     */

        public function loginOut(){
        session('username',null);
        $this->success('注销成功',url('admin/login/login'));
    }

}
