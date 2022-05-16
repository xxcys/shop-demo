<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class ShopModel extends Model
{
    //
    protected $table='shop';

    //查询所有商品数据
    public function shopList()
    {
        $res = Db::name('shop')->select();
        if ($res)
        {
            return $res;
        }else{
            return ['code'=>400,',msg'=>'查询失败'];
        }
    }

    //查看多图
    public function selectImgs($id)
    {
        $res = Db::name('shop')->where('id',$id)->column('shop_imgs');
        return $res;
    }
    //添加商品
    public function shopAdd($data)
    {

        $check = Db::name('shop')->where('shop_name',$data['shop_name'])->find();
        if (!$check){
            $res = Db::name('shop')->insert($data);
            if ($res)
            {
                return ['code'=>200,'msg'=>'添加成功'];
            }else{
                return ['code'=>400,'msg'=>'添加失败'];
            }
        }else{
            return ['code'=>400,'msg'=>'商品已存在'];
        }
    }
    //添加商品颜色
    public function detailsAdd($data)
    {
        $check = Db::name('shop')->where('id',$data['sid'])->find();
        if ($check){
            $res = Db::name('details')->insert($data);
            if ($res)
            {
                return ['code'=>200,'msg'=>'添加成功'];
            }else{
                return ['code'=>400,'msg'=>'添加失败'];
            }
        }else{
            return ['code'=>400,'msg'=>'不存在该商品'];
        }

    }
    //添加商品颜色
    public function colorAdd($data)
    {
        $check = Db::name('shop')->where('id',$data['sid'])->find();
        if ($check){
            $res = Db::name('shop_color')->insert($data);
            if ($res)
            {
                return ['code'=>200,'msg'=>'添加成功'];
            }else{
                return ['code'=>400,'msg'=>'添加失败'];
            }
        }else{
            return ['code'=>400,'msg'=>'不存在该商品'];
        }

    }
    //添加商品尺寸
    public function sizeAdd($data)
    {
        $res = Db::name('shop_size')->insert($data);
        if ($res)
        {
            return ['code'=>200,'msg'=>'添加成功'];
        }else{
            return ['code'=>400,'msg'=>'添加失败'];
        }
    }
    //修改
    public function updateStatus($id)
    {
        $check = Db::name('shop')->where('id',$id)->find();
        if ($check['shop_status'] == 1){
            $res = Db::name('shop')->where('id',$id)->update(['shop_status'=>0]);
            if ($res){
                return ['code'=>200,'msg'=>'下架成功'];
            }else{
                return ['code'=>400,'msg'=>'下架失败'];
            }
        }else{
            $res = Db::name('shop')->where('id',$id)->update(['shop_status'=>1]);
            if ($res){
                return ['code'=>200,'msg'=>'上架成功'];
            }else{
                return ['code'=>400,'msg'=>'上架失败'];
            }
        }

    }

    //删除商品
    public function shopDelete($id)
    {
        $check = Db::name('shop')->where('id',$id)->find();
        $imgs = Db::name('shop')->where('id',$id)->column('shop_imgs');
        //删除展示图
        foreach ($imgs as $vo) {
            $re = json_decode($vo, true);
            $i = 0;
            for ($i; $i < 5; $i++) {
                $srcImgs = '../public' . $re[$i][0];
                $delImgs = unlink($srcImgs);
            }
        }
            //删除缩略图
            $tempurl = '../public'.$check['shop_temp'];
            $deTemp = unlink($tempurl);
            if ($deTemp && $delImgs){
                $res = Db::name('shop')->where('id',$id)->delete();
                if ($res){
                    return ['code'=>200,'msg'=>'删除成功'];
                }else{
                    return ['code'=>400,'msg'=>'删除失败'];
                }
            }else{
                return ['code'=>400,'msg'=>'删除图片失败'];
            }
        }


}
