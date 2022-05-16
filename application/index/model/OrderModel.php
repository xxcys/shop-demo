<?php

namespace app\index\model;

use think\Model;
use think\Db;

class OrderModel extends Model
{
    //
    protected $autoWriteTimestamp = true;
    //添加订单
    public function orderAdd($id,$mid){
        //  处理数据
        $find = Db::name('member')->where('mid',$mid)->find();
        $data = [
            'sid'=>$id,
            'member'=>$find['mname'],
            'mphone'=>$find['mphone'],
            'maddress'=>$find['maddress'],
            'status'=>'0',
            'join_time'=>time()
        ];
        $res = Db::name('order')->insert($data);
        if ($res)
        {
            return ['code'=>200,'msg'=>'提交订单成功'];
        }else{
            return ['code'=>400,'msg'=>'提交订单失败'];
        }

    }
}
