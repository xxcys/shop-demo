<?php

namespace app\admin\controller;

use app\admin\model\CommentModel;
use think\Controller;
use think\Request;

class Comment extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function find()
    {
        //
        $model = new CommentModel();
        $res = $model->commentFind();
       var_dump($res);
    }

    /**
     * 添加评论
     *
     * @return \think\Response
     */
    public function commentAdd(Request $request)
    {
        //
        $data = $request->param();
        $model = new CommentModel();
        $result = $model->commentAdd($data);
        if ($result){
            return $this->success($result['msg']);
        }else{
            return $this->error($result['msg']);
        }
    }


}
