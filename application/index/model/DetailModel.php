<?php

namespace app\index\model;

use think\Db;
use think\Model;

class DetailModel extends Model
{
    //
    public function detailList($id)
    {

       $res = Db::name('details')->where('sid',$id)->select();
        if ($res){
            return $res;
        }else{
            return ['code'=>400,'msg'=>'查询失败'];
        }
    }
}
