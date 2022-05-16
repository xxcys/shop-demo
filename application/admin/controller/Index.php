<?php
namespace app\admin\controller;

use app\admin\model\CategoryModel;
use app\admin\model\CommentModel;
use app\admin\model\MemberModel;
use app\admin\model\OrderModel;
use app\admin\model\ShopModel;
use app\admin\model\StoreModel;
use app\admin\model\UserModel;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\View;

//后端首页
class Index extends Controller
{
        /**拦截**/
        public function __construct(){
            parent::__construct();
            if(!session('username')){
                return $this->error("NO!你没有登录！",url('Login/login'));
            }
        }
        public function index()
        {
            //首页
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch();
        }

        public function welcome()
        {
            //欢迎页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('welcome');
        }
        public function store()
        {
            //店铺页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            $model = new StoreModel();
            $result = $model->storeList();
            $this->assign('list', $result);
            return $this->fetch('store');
        }

        public function shop()
        {
            //商品页面
            $this->assign('username',session('username'));
            $model = new ShopModel();
            $result = $model->shopList();
            $this->assign('list', $result);
            return $this->fetch('shop');
        }

        public function shopAdd()
        {
            //商品添加页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            $storeModel = new StoreModel();//品牌分类模型
            $categoryModel = new CategoryModel();
            $cateList = $categoryModel->categoryList();
            $storeList = $storeModel->storeList();
            $this->assign('storeList',$storeList);
            $this->assign('cateList',$cateList);
            return $this->fetch('shop-add');
        }

        public function colorAdd()
        {
            //商品添加颜色页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('color-add');
        }
        public function sizeAdd()
        {
            //商品添加尺寸页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('size-add');
        }
        public function detailsAdd()
        {
            //商品添加尺寸页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('details-add');
        }

        public function category()
        {
            //分类页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            $model = new CategoryModel();
            $data = $model->categoryList();
            $this->assign('data',$data);
//            echo json_encode($data);
            return $this->fetch('category');
        }
        public function categoryAdd()
        {
            //分类添加页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('category-add');
        }

        public function comment()
        {
            //评论页面
            $this->assign('username',session('username'));
            $shopData = Db::name('shop s')
                ->field(['s.*,c.*'])
                ->join([
                    ['comment c','c.sid=s.id'],
                ])
                ->select();
            $this->assign('shop',$shopData);
            return $this->fetch('comment');
        }
        public function commentAdd()
        {
            //评论添加页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('comment-add');
         }
        public function memberList()
        {
            //会员列表页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            $model = new MemberModel();
            $result = $model->memberList();
            $this->assign('list', $result);
            return $this->fetch('member-list');
        }

        public function memberAdd()
        {
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('member-add');
        }
        public function adminList()
        {
            //管理员列表页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            $model = new UserModel();
            $result = $model->userList();
            $this->assign('data',$result);
            return $this->fetch('admin-list');
        }
        public function adminAdd()
        {
            //添加管理页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('admin-add');
        }

        public function adminEdit()
        {
            //修改管理页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            $this->assign('id',session('id'));
            $admin = Session::get();
            $this->assign($admin);
            return $this->fetch('admin-edit');
        }

        public function order()
        {
            $model = new OrderModel();
            $orderList = $model->orderList();
            $this->assign('orderList',$orderList);
            $this->assign('username',session('username'));
            return $this->fetch('order-list');
        }
        public function systemBase()
        {
            //系统管理页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('system-base');
        }
        public function systemCate()
        {
            //栏目管理页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('system-category');
        }
        public function systemCateAdd()
        {
            //栏目管理页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('system-category-add');
        }
        public function systemLog()
        {
            //系统日志页面
            $admin = Session::get();
            $this->assign('username',session('username'));
            return $this->fetch('system-log');
        }

}
