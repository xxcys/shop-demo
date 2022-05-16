<?php

namespace app\index\model;

use think\Db;
use think\Model;

//会员数据表 模型
class MemberModel extends Model
{
    //
    protected $table='member';

    public function addMember($data)
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
                return ['code'=>200,'msg'=>'注册成功'];
            } else {
                return ['code'=>400,'msg'=>'注册失败'];
            }
        }
    }
    //登录验证
    public function loginCheck($data,$type)
    {
        $found=Db::name('member')->where(['mname'=>$data['mname']])->find();
        $where = $found['mpassword'] == md5($data['mpassword']);
        if(!$found){
            return ['code'=>400,'msg'=>'用户不存在'];
        }else{
            $result= Db::name('member')->where(['mname'=>$data['mname']])->find();
            if($result){
                if($found['mpassword'] == md5($data['mpassword'])){
//                    session($type,$result);//保存session
                    session('mname',$found['mname']);
                    session('mid',$found['mid']);
                    return ['code'=>200,'msg'=>'登录成功'];
                }else{
                    return ['code'=>400,'msg'=>'密码错误'];
                }

            }else{
                return ['code'=>400,'msg'=>'您已退出，无法登录'];
            }
        }
    }
    public function memberFind($mid)
    {
        $res = Db::name('member')->where('mid',$mid)->select();
        if($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }
}
