<?php

namespace app\index\controller;

use app\index\model\DetailModel;
use app\index\model\ShopModel;
use think\Controller;
use think\Db;
use think\Request;

class Detail extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function detail(Request $request)
    {
        //
        $id = $request->param('id');
        $deModel = new DetailModel();
        $shopModel = new ShopModel();

        $deList = $deModel->detailList($id);
        $shopList = $shopModel->shopFind($id);
        $comList = $shopModel->coomentFind($id);
//        var_dump($shopList);
        if ($deList && $shopList)
        {
            $this->assign('deList',$deList);
            $this->assign('shopList',$shopList);
            $this->assign('comList',$comList);
            $this->assign('empty', '没有数据');
            $this->assign('mname',session('mname'));
            return $this->fetch();
        }

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function shop(Request $request)
    {
        //
        $id = $request->param('id');
        $shopModel = new ShopModel();
        $shopList = $shopModel->shopFind($id);
        var_dump($shopList);
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
