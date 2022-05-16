<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class CategoryModel extends Model
{
    //
    public function categoryList()
    {
        //查询分类列表
        $res = Db::name('category')->select();
        if ($res)
        {
//            return ['code'=>200,'msg'=>'查询成功','data'=>$res];
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }

    public function categoryAdd($data)
    {
        //添加分类
        //验证分类是否存在
        $categoryExit = Db::name('category')->where('cname',$data['cname'])->find();
        if ($categoryExit)
        {
            //分类存在
            return ['code'=>400,'msg'=>'分类已存在'];
        }else{
            //注册操作
            $res = Db::name('category')->insert($data);
            if ($res) {
                return ['code'=>200,'msg'=>'添加分类成功'];
            } else {
                return ['code'=>400,'msg'=>'添加分类成功'];
            }
        }
    }

    public function categroyDelete($id)
    {
        //删除分类
        $res=Db::name('category')->where('id',$id)->delete();
        if ($res) {
            return ['code' => 200, 'msg' => '删除成功'];
        } else {
            return ['code' => 400, 'msg' => '删除失败'];
        }
    }
}
