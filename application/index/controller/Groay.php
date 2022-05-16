<?php

namespace app\index\controller;

use app\index\model\GroayModel;
use think\Controller;
use think\Session;
use think\Request;

class Groay extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function groay()
    {
        //
        $categoryModel = new GroayModel();
        $categroy = $categoryModel->categoryList();
        $store = $categoryModel->storeList();
        $shop = $categoryModel->shopList();
        $this->assign('category',$categroy);
        $this->assign('store',$store);
        $this->assign('shop',$shop);
        $this->assign('mname',session('mname'));
        return $this->fetch();
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
