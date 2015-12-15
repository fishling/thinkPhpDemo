<?php
namespace Home\Controller;
//use Home\Model\UserModel;
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

    //创建model基类，传递user表
    public function model(){
        //$user = new Model('User');

        //如果仅仅是CURD操作建议使用M方法，因为不需要加载具体的模型类，如UserModel
        //$user = M('User');

        //具体模型类
        //$user = new UserModel();

        //也可以使用D方法加载具体模型，比new UserModel()更智能.
        //在Home/Model下面找不到UserModel时，会去Common/Model下面找。如果还找不到就实例化基类Model类
        $user = D('User');
        //也可以调用指定模块下的UserModel类
        //$user = D('Admin/User');
        var_dump($user->select());
        var_dump($user->getDbFields());

        //使用原生的数据库方法
        //$user = M();
        //var_dump($user->query('select * from think_user;'));

    }
}