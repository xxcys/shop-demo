<?php

namespace app\index\model;

use think\Db;
use think\Model;

class ShopModel extends Model
{
    //
    public function shopFind($id)
    {
//        $res = Db::name('shop')->where('id',$id)->select();
        $lists = Db::name('shop s')
            ->field(['s.*','c.color_name','si.size_name','st.sname'])
            ->join([
                ['shop_color c','c.sid=s.id'],
                ['shop_size si','si.sid=s.id'],
                ['store st','st.id=s.sid'],
            ])
            ->where(['s.id'=>$id])
            ->limit(1)
            ->select();
        if ($lists){
            return $lists;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }
    public function coomentFind($id)
    {
        $res = Db::name('comment co')
            ->join([
                ['shop_color c','c.id=co.com_color'],
                ['shop_size si','si.id=co.com_size'],
            ])
            ->field(['co.*','c.color_name','si.size_name'])
            ->where('co.sid',$id)
            ->select();
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }

}
