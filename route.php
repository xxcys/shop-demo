<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//index
Route::rule('/','index/Login/index');


//admin

Route::rule('welcome','admin/Index/welcome');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    
    '[admin]' => [
        'login' => ['admin/Login/login',['method'=>'get']],
        'home'       => ['admin/Index/index',['method'=>'get']],
        
        //user
        'user/list'  => ['admin/User/list',['method'=>'get']],
        'user/add'   => ['admin/User/add',['method'=>'get']],
        'user/save'   => ['admin/User/save',['method'=>'post']],
        'user/edit/:id'   => ['admin/User/edit',['method'=>'get']],
        'user/update'   => ['admin/User/update',['method'=>'post']],
        'user/delete/:id'   => ['admin/User/delete',['method'=>'get']],

        //member
        'member/list'   => ['admin/Member/list',['method'=>'get']],
        'member/add'   => ['admin/Member/add',['method'=>'get']],
        'member/save'   => ['admin/Member/save',['method'=>'post']],
        'member/edit/:id'   => ['admin/Member/edit',['method'=>'get']],
        'member/update'   => ['admin/Member/update',['method'=>'post']],

        //shop
        'shop/list'   => ['admin/Shop/list',['method'=>'get']],
        'shop/add'   => ['admin/Shop/add',['method'=>'get']],
        'shop/save'   => ['admin/Shop/save',['method'=>'post']],
        'shop/edit/:id'   => ['admin/Shop/edit',['method'=>'get']],
        'shop/update'   => ['admin/Shop/update',['method'=>'post']],

         //category
        'category/list'         => ['admin/Index/category',['method'=>'get']],
        'category/add'          => ['admin/Category/add',['method'=>'get']],
        'category/save'         => ['admin/Category/save',['method'=>'post']],
        'category/edit/:id'     => ['admin/Category/edit',['method'=>'get']],
        'category/update'       => ['admin/Category/update',['method'=>'post']],
        'category/delete/:id'   => ['admin/Category/delete',['method'=>'get']],
    ],

];
