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

    public function query(){
        //条件查询几种方式
        $user = M('User');

        //1.直接使用字符串
        //var_dump($user->where('id = 2 or user = "liling"')->select());

        //2.使用索引数组
        /*$con['id']=2;
        $con['user']='liling';
        //默认是and连接，可以通过设置
        $con['_logic']='or';
        var_dump($user->where($con)->select());*/

        //3.使用对象
        /*$con = new \stdClass(); //\表示在根目录下查找，因为这个类是php内置类，不是我们自己写的。如果不加这个\，就会在当前目录下找这个类
        $con->id = 1;
        $con->user = 'liling';
        $con->_logic = 'or';
        var_dump($user->where($con)->select());*/

        //表达式查询
        /*$map['id'] = array('eq',1);
        $map['user'] = array('like','%lil%');
        $map['email'] = array('like',array('%1%','%@%'),'or');
        $map['date'] = array('exp','is not null'); //自定义
        $map['_logic'] = 'or';
        var_dump($user->where($map)->select());*/

        //快捷查询
        /*//不同字段的相同查询条件
        //$map['user|email'] = 'liling'; //|表示or,&表示and
        //不同字段的不同查询条件
        $map['user|id'] =array('liling',2,'_multi'=>true); //'_multi'=>true一定要加,表示当前是多条件匹配
        var_dump($user->where($map)->select());*/

        //区间查询,可以支持普通查询的所有表达式
        /*$map['id'] = array(array('gt',1),array('lt',10)) ;
        $map['user'] = array(array('like','%a%'), array('like','%b%'), array('like','%c%'), 'ThinkPHP','or');
        var_dump($user->where($map)->select());*/

        //组合查询,数组方式的扩展
        /*$map['id'] = array('eq',1);
        //$map['_string'] = 'id=1 AND email is not null';
        //$map['_logic'] = 'or';
        $map['_query'] = 'id=1 & user=liling &_logic=or';
        var_dump($user->where($map)->select());*/

        //统计查询
        //echo $user->count();

        //动态查询
        /*var_dump($user->getByUser('liling'));
        var_dump($user->getFieldByUser('liling','id'));*/

        //sql查询
        //$user->execute('insert into think_user values (2,"lixi",null,"");');

        //简化表名，等于think_info表查询
        //$user->table('__INFO__')->select();

        //var_dump($user->field('a.id,b.id')->table(array('think_user'=>'a','think_info'=>'b'))->select());
    }

    //命名范围
    public function queryScope(){
        $user = D('User');
        //var_dump($user->scope('sql2')->select());
        var_dump($user->sql2()->select()); //同上
        //var_dump($user->scope('sql2',array('limit'=>4))->select()); //对sql2进行调整
        //var_dump($user->scope()->select()); //使用default

    }

    //这个方法并没有对数据库操作，只存在于内存中
    public function create(){
        $user = M('User');
        //$user = D('User');
        //var_dump($user->create()); //默认是POST，若是以get方式提交的，参数加$_GET
        //var_dump($user->create($_POST,Model::MODEL_INSERT)); //第二个参数是指定数据库操作，Model_INSERT或者Model_UPDATE

        //也可以指定接收到的数据映射
        $data['user']=$_POST['user'];
        $data['email']=$_POST['email'];
        $data['date']=$_POST['birthday'];
        var_dump($user->create($data));

        /*$data = new \stdClass();
        $data->user=$_POST['user'];
        $data->email=$_POST['email'];
        $data->date=$_POST['birthday'];
        var_dump($user->create($data));*/
    }

    public function add(){
        $user = M('User');
        $data = $user->create();
        var_dump($data);
        //$data['date']=$_POST['birthday'];
        //$data = 'user=小明&email=&date='.date('Y-m-d H:i:s');
        $user->add();  //已经创建了数据对象，add方法就不需要传入数据了
        //$user->add($data);
        //$user->data($data)->add();
    }

    //使用user对象新增
    public function addUser(){
        $user = M('User');
        $user->user = 'liyouxi';
        $user->email = 'liyouxi@163.com';
        $user->date = '2016-6-6';
        $user->add();
    }

    //更新数据
    public function save(){
        $user = M('User');
        $data['user']='小花';
        $data['email']='xiaohua@qq.com';
        $data['date']='';
        $map['id']=10;
        echo $user->where($map)->save($data);

        /*$data['id']=10;
        $user->save($data);*/

        $user->where('id=10')->setField('user','小新');
    }

    public function delete(){
        $user = M('User');
        //$user->delete(10);  //参数默认是指主键值

        /*$map['id']=10;
        $user->where($map)->delete();*/

        /*$map['id'] = array('gt',1);
        $map['order']='date';
        $user->where($map)->order(array('date'=>'DESC'))->limit(2)->delete();*/

        //$user->delete(); //没有传入任何条件进行删除操作的话，不会执行删除操作
        //$user->where('1')->delete(); //删除所有数据

        //先查找要处理的数据，再update，或者delete
        /*$user->find(13);
        $user->delete();*/
    }
}