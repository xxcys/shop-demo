<?php

namespace app\admin\controller;

use app\admin\model\ShopModel;
use think\Controller;
use think\Request;

class Shop extends Controller
{

    public function shoplist(Request $request)
    {
        $id = $request->param('id');
        $model = new ShopModel();
        $res = $model->selectImgs($id);
//        $re = json_decode($res,true);
//        var_dump($re);
        foreach ($res as $vo) {
            $re = json_decode($vo,true);
            $i = 0;
            for ($i;$i<5;$i++){
//                var_dump($re[$i][0]);
                echo $re[$i][0];
            }
//            var_dump($re[1]);

        }
    }

    /**
     * 添加商品
     *
     * @return \think\Response
     */
    public function shopAdd(Request $request)
    {
        //添加商品
        $data = $request->param();
        $datas = $this->upload();
        $data['shop_status'] = '0';
        $data['shop_imgs'] = json_encode($datas);
        $data['shop_temp'] = $this->tmpupload();
        $model = new ShopModel();
        $result = $model->shopAdd($data);
        if ($result)
        {
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }
    }

    //多图上传
    public function upload(){
        // 获取表单上传文件
        $files = request()->file('shop_imgs');
        foreach($files as $file){
            $info = $file->move( '../public/uploads/shopimg');
            if($info){
                // 成功上传后 获取上传信息
                $_POST['shop_img'] = '/uploads/shopimg/'.$info->getSaveName();
                $imgSrc[] = array($_POST['shop_img']);

            }else{

                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        return $imgSrc;
    }
    //缩略图上传
    public function tmpupload(){
        // 获取表单上传文件
        $file = request()->file('shop_temp');
            $info = $file->move( '../public/uploads/shoptemp');
            if($info){
                // 成功上传后 获取上传信息
                $url = '/uploads/shoptemp/'.$info->getSaveName();
//            var_dump($_POST['image_url']);
                return  $url;
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
    }

    //详情
    public function detailsAdd(Request $request)
    {
        $data = $request->param();
        $data['details_img'] = $this->detailsupload();
        $model = new ShopModel();
        $result = $model->detailsAdd($data);
        if ($result){
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }
    }
    //详情图上传
    public function detailsupload(){
        // 获取表单上传文件
        $file = request()->file('details_img');
        $info = $file->move( '../public/uploads/details');
        if($info){
            // 成功上传后 获取上传信息
            $url = '/uploads/details/'.$info->getSaveName();
            return  $url;
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    /**
     * 添加商品颜色
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function sizeAdd(Request $request)
    {
        //
        $data = $request->param();
        $model = new ShopModel();
        $result = $model->sizeAdd($data);
        if ($result)
        {
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }
    }

    /**
     * 添加商品颜色
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function colorAdd(Request $request)
    {
        //
        $data = $request->param();
        $model = new ShopModel();
        $result = $model->colorAdd($data);
        if ($result)
        {
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }
    }
    //修改
    public function updateStatus(Request $request)
    {
        $id =  $request->param('id');
        $model = new ShopModel();
        $result = $model->updateStatus($id);
        if ($result)
        {
            echo json_encode($result);
        }else{
            echo json_encode($result);
        }
    }
    /**
     * 删除商品
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        //删除商品
        $id = $request->param('id');
        $model = new ShopModel();
        $result = $model->shopDelete($id);
        if ($request)
        {
            echo json_encode($request);
        }else{
            echo json_encode($request);
        }
    }
}
