<?php

namespace app\admin\controller;

use app\admin\model\CategoryModel;
use think\Controller;
use think\Request;
use think\View;

class Category extends Controller
{
    /**
     * 显示分类列表
     *
     * @return \think\Response
     */
    public function categoryList()
    {
        //查询分类列表

    }

    /**
     * 添加分类
     *
     * @return \think\Response
     */
    public function categoryAdd(Request $request)
    {
        //接收数据
        $data = $request->param();
        $model = new CategoryModel();
        $result = $model->categoryAdd($data);
        if ($result)
        {
            return $this->success($result['msg']);
        }
        else{
            return $this->error($result['msg']);
        }

    }

    /**
     * 删除指定分类
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        //
        $id = $request->param('id');
        $model = new CategoryModel();
        $res = $model->categroyDelete($id);
        if ($res['code'] == 200)
        {
            return $this->success($res['msg']);
        }else{
            return $this->error($res['msg']);
        }
    }
}
