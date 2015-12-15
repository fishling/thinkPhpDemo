<?php
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
use Think\Model;

class UserController extends Controller {
    public function index(){

    }

    //url http://localhost/thinkPhpDemo/index.php/Home/User/test/user/lee/pass/123
    //设置分隔符为_之后，url为 http://localhost/thinkPhpDemo/index.php/Home_User_test_user_lee_pass_123
    //普通模式url为 http://localhost/thinkPhpDemo/index.php?m=Home&c=User&a=test&user=lee&pass=123
    public function test($user,$pass){
        echo 'user:'.$user.'<br/>pass:'.$pass;
    }

    public function model(){
        //创建model基类，传递user表
        //$user = new Model('User');
        //$user = M('User');
        $user = new UserModel();
        var_dump($user->select());
    }
}