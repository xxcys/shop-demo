<?php

namespace app\index\controller;

use app\index\model\MemberModel;
use app\index\model\OrderModel;
use app\index\model\ShopModel;
use think\Controller;
use think\Request;
use think\Session;
use think\Url;

class Order extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //
        $id = $request->param('id');
        $mid = session('mid');
        $shopModel= new ShopModel();
        $memberModel= new MemberModel();
        $shopData = $shopModel->shopFind($id);
        $memberData = $memberModel->memberFind($mid);

        $this->assign('memberData',$memberData);
        $this->assign('shopData',$shopData);
        $this->assign('mname',session('mname'));
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function orderAdd(Request $request)
    {
        //添加订单
        $id = $request->param('id');
        $mid = session('mid');
        $model = new OrderModel();
        $result = $model->orderAdd($id,$mid);
//        var_dump($result);
        if($result){
            return $this->success($result['msg'],url('index/index'));
        }else{
		 	return $this->error($result['msg']);
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
