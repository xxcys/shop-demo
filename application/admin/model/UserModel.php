<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class UserModel extends Model
{
    //
    protected $table='user';
    protected $autoWriteTimestamp = true;
    //验证登录
    public function checkLogin($data,$type)
    {
        $found=Db::name('user')->where(['username'=>$data['username']])->find();
        $where = $found['password'] == md5($data['password']);
        if(!$found){
            return ['code'=>400,'msg'=>'用户不存在'];
        }else{
            $result= Db::name('user')->where(['username'=>$data['username']])->find();
            Db::name('user')->where('username',$data['username'])->update(['last_login_time' => time()]);
            if($result){
                if($found['password'] == md5($data['password'])){
//                    session($type,$result);//保存session
                    session('username',$found['username']);
                    session('id',$found['id']);
                    return ['code'=>200,'msg'=>'登录成功'];
                }else{
                    return ['code'=>400,'msg'=>'密码错误'];
                }

            }else{
                return ['code'=>400,'msg'=>'您已退出，无法登录'];
            }
        }
    }

    public function userFind($id)
    {
        //根据id查询管理员信息
        $res = Db::name('user')->where('id',$id)->find();
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }



    public function userList()
    {
        //查询所有管理员
        $res = Db::name('user')->select();
        if ($res)
        {
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }


    public function userAdd($data)
    {
        //添加管理员
        $userExit = Db::name('user')->where('username',$data['username'])->find();
        if (!$userExit)
        {
            $res = Db::name('user')->insert($data);
            if ($res){
                Db::name('user')->where('username',$data['username'])->update(['status' => 1]);
                return ['code'=>200,'msg'=>'添加成功'];
            }
        }else{
            return ['code'=>400,'msg'=>'管理员已存在'];
        }
    }

    public function userEdit($data)
    {
        $checkPassword = Db::name('user')->where('password',$data['oldpassword'])->find();
        if ($checkPassword){
            $res = Db::name('user')->where('id',$data['id'])->
                        update(['username'=>$data['username'],'password'=>$data['newpassword'],'userphone'=>$data['userphone']]);
            if ($res)
            {
                return ['code'=>200,'msg'=>'修改成功'];
            }else{
                return ['code'=>400,'msg'=>'修改失败'];
            }
        }else{
            return ['code'=>400,'msg'=>'原密码错误'];
        }
    }
    public function userDelete($id,$admin)
    {
        //删除管理员
            $res = Db::name('user')->where(['id'=>$id])->delete();
            if ($res)
            {
                return ['code'=>200,'msg'=>'删除成功'];
            }else{
                return ['code'=>400,'msg'=>'删除失败'];
            }

    }
}
