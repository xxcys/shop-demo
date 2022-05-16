<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class StoreModel extends Model
{
    //
    protected $table='store';

    public function storeAdd($data)
    {
        //添加品牌
        $check = Db::name('store')->where('sname',$data['sname'])->find();
        if (!$check){
            $res = Db::name('store')->insert($data);
            if ($res) {
                return ['code'=>200,'msg'=>'添加成功'];
            }else{
                return ['code'=>400,'msg'=>'添加失败'];
            }
        }else{
            return ['code'=>400,'msg'=>'已存在'];
        }

    }

    public function storeList()
    {
        //查询所有品牌
//        $res = Db::name('store')->paginate(10,false,[
//            'type'=>'BootstrapDetailed',
//        ]);
        $res =  Db::name('store')->select();
        if ($res)
        {
            return $res;
        }else{
            return ['code'=>400,',msg'=>'查询失败'];
        }
    }
    //删除
    public function storeDelete($id)
    {
        $imgSrc = Db::name('store')->where('id',$id)->find();
        $url = '../public'.$imgSrc['shopimg'];
        $de = unlink($url);
        if ($de){
            $res = Db::name('store')->where('id',$id)->delete();
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
