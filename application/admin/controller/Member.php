<?php

namespace app\admin\controller;

use app\admin\model\MemberModel;
use think\Controller;
use think\Request;

class Member extends Controller
{
    /**
     * 添加会员
     *
     * @return \think\Response
     */
    public function memberAdd(Request $request)
    {
        //
        $data = $request->param();
        $model = new MemberModel();
//        var_dump($data);
        $memData['mname'] = $data['mname'];
        $memData['mpassword'] = md5($data['mpassword']);
        $memData['mphone'] = $data['mphone'];
        $memData['maddress'] = $data['maddress'];
        $result = $model->memberAdd($memData);
        if ($result)
        {
            return $this->success($result['msg']);
        }else{
            return $this->erroe($result['msg']);
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
    public function delete(Request $request)
    {
        //删除会员
        $id = $request->param('mid');

        $model = new MemberModel();
        $result = $model->MemberDelete($id);
        if ($result)
        {
          echo json_encode($result);
        }else{
            echo json_encode($result);
        }
    }
}
