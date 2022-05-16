<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class MemberModel extends Model
{
    //
    protected $table='user';

    public function memberList()
    {
        //分页查询所有数据
        $res = Db::name('member')->paginate(10,false,[
            'type'=>'BootstrapDetailed',
            'query'=>request()->param()
        ]);
        if ($res)
        {
            return $res;
        }else{
            return ['code'=>400,',msg'=>'查询失败'];
        }
    }

    public function memberAdd($data)
    {
        //验证用户名是否存在
        $userexit = Db::name('member')->where('mname',$data['mname'])->find();
        if ($userexit)
        {
            //用户存在
            return ['code'=>400,'msg'=>'用户已存在'];
        }else{
            //注册操作
            $res = Db::name('member')->insert($data);
            if ($res) {
                return ['code'=>200,'msg'=>'添加成功'];
            } else {
                return ['code'=>400,'msg'=>'添加成功'];
            }
        }
    }
    public function MemberDelete($id)
    {
        //删除会员
        $res = Db::name('member')->where('mid',$id)->delete();
        if ($res)
        {
            return ['code'=>200,',msg'=>'删除成功'];
        }else{
            return ['code'=>400,',msg'=>'删除失败'];
        }
    }
}
