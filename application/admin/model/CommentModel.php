<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class CommentModel extends Model
{
    //
    protected $autoWriteTimestamp = true;
    public function commentFind()
    {

        $lists = Db::name('shop s')
            ->field(['s.*','c.id','si.id'])
            ->join([
                ['shop_color c','c.sid=s.id'],
                ['shop_size si','si.sid=s.id'],
            ])
            ->select();
        if ($lists){
            return $lists;
        }
    }

    public function commentList()
    {
        $res = Db::name('comment')->select();
        if ($res)
        {
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }

    public function commentAdd($data)
    {
        $data['com_time'] = time();
        $res = Db::name('comment')->insert($data);
        if ($res){
            return ['code'=>200,'msg'=>'添加成功'];
        }else{
            return ['code'=>400,'msg'=>'添加失败'];
        }
    }
}
