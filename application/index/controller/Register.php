<?php

namespace app\index\controller;

use app\index\model\MemberModel;
use think\captcha\Captcha;
use think\Controller;
use think\Request;
//注册 --控制器
class Register extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //注册页面渲染
        return $this->fetch();
    }

    /**
     * 注册
     *
     * @return \think\Response
     */
    public function createMenber(Request $request)
    {
        //接收数据
        $data = $request->param();
        // 检测输入的验证码是否正确，$value为用户输入的验证码字符
        $code = $data['code'];
        $captcha = new Captcha();
        if( !$captcha->check($code))
        {
//             验证失败
            $result_data['code']=400;
            $result_data['msg']='验证码错误';
//            echo json_encode($result_data);
            return $this->success('验证码错误');
        }else{
            $userdata['mname'] = $data['mname'];
            $userdata['mphone'] = $data['mphone'];
            $userdata['mpassword'] = md5($data['mpassword']);
            $model = new MemberModel();
            $result = $model->addMember($userdata);
            if ($result['code'] === 200) {
                $result_data['code']=$result['code'];
                $result_data['msg']=$result['msg'];
//                echo json_encode($result_data);
                return $this->success($result['msg'],url('index/login/index'));
            } else {
                $result_data['code']=$result['code'];
                $result_data['msg']=$result['msg'];
                return $this->error($result['msg']);
            }
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }


}
