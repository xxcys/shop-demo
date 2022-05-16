<?php

namespace app\index\model;

use think\Db;
use think\Model;

class GroayModel extends Model
{
    //

    public function categoryList()
    {
        //分类列表
        $res = Db::name('category')->select();
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }

    public function storeList()
    {
        //品牌列表
        $res = Db::name('store')->select();
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }
    public function shopList()
    {
        //商品列表
        $res = Db::name('shop')->where('shop_status',1)->paginate(24,false,[
            'type'=>'BootstrapDetailed',
            'query'=>request()->param()
        ]);
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }
}
