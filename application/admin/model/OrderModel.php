<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class OrderModel extends Model
{
    //查询订单列表
    public function orderList()
    {
        $res = Db::name('shop s')
            ->field(['s.*','o.*'])
            ->join([
                ['order o','o.sid=s.id'],
            ])
            ->select();
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }
    
    //商品发货
    public function orderEdit($id)
    {
        $find = Db::name('order')->where('id',$id)->find();
        if ($find['status'] == 0){
            $res = Db::name('order')->where('id',$id)->update(['status'=>1]);
            if ($res){
                return ['code'=>200,'msg'=>'发货成功'];
            }else{
                return ['code'=>400,'msg'=>'发货失败'];
            }
        }else{
            return ['code'=>400,'msg'=>'已发货，请勿重复点击'];
        }
    }
}
