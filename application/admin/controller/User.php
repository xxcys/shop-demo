<?php

namespace app\admin\controller;

use app\admin\model\UserModel;
use think\Controller;
use think\Request;
use think\Session;

class User extends Controller
{
    /**
     * 添加管理员
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function userAdd(Request $request)
    {
        //接收数据
        $data = $request->param();
        //处理数据
        $userData['username'] = $data['username'] ;
        $userData['password'] = md5($data['password'] );//密码md5加密
        $userData['userphone'] = $data['userphone'];
        //实例化模型进行添加操作
        $model = new UserModel();
        $result = $model->userAdd($userData);
        if ($result){
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }

    }


    /**
     * 修改管理员信息
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function userEdit(Request $request)
    {
        //接收信息
        $data = $request->param();
        //实例化模型
        $moder = new UserModel();
        //处理数据
//        var_dump($data);
        $userdata['id']=$data['id'];
        $userdata['username']=$data['username'];
        $userdata['oldpassword']=md5($data['oldpassword']);
        $userdata['newpassword']=md5($data['newpassword']);
        $userdata['userphone']=$data['userphone'];
        //调用模型的方法进行数据操作
        $res = $moder->userEdit($userdata);
        if ($res['code'] == 200){
//            session('admin',null);
//            echo json_encode($res);
            return $this->success($res['msg']);

        }else{
            return $this->error($res['msg']);
        }
    }


    /**
     * 删除管理员
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        //
        $id = $request->param('id');
        $admin = Session::get();

        $model = new UserModel();
        $result = $model->userDelete($id,$admin);
        if ($result['code'] == 200)
        {
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }


    }
}
