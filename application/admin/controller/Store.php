<?php

namespace app\admin\controller;

use app\admin\model\StoreModel;
use think\Controller;
use think\Request;

class Store extends Controller
{


    /**
     * 添加品牌.
     *
     * @return \think\Response
     */
    public function storeAdd(Request $request)
    {
        //店铺添加
        $data = $request->param();
        $model = new StoreModel();
        $data['shopimg'] = $this->uploade();
//        var_dump($data);
        $result = $model->storeAdd($data);
        if ($result){
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }
    }

    //图片上传
    public function uploade()
    {
      $file = request()->file('img');
        $info = $file->move( '../public/uploads/image');
        if($info){
            // 成功上传后 获取上传信息
            $_POST['img'] = '/uploads/image/'.$info->getSaveName();
//            var_dump($_POST['image_url']);
           return  $_POST['img'];
        }else{

            // 上传失败获取错误信息
            echo $file->getError();
        }
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
     * 删除品牌
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        //
        $id = $request->param('id');
        $model = new StoreModel();
        $res = $model->storeDelete($id);
        if ($res)
        {
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }
}
