<?php
/**
 * Created by PhpStorm.
 * User: fish
 * Date: 2015/12/15
 * Time: 15:45
 */

namespace Common\Model;
use Think\Model;

//一般来说，类名与表名一致。但也可以自行设置
class UserModel extends Model{
    //修改前缀名
    //protected $tablePrefix= 'tp_';
    //设置表名(不包含前缀)
    //protected $tableName = 'abc';
    //设置表名(包含前缀)
    //protected $trueTableName= 'tp_aa';
    //设置数据库名
    //protected $dbName = 'test';
    //指定数据库字段，这时就不会再生成缓存文件
    //protected $fields = array('id','user','email','_pk'=>'id',
    //    'type'=>array('id'=>'smallint','user'=>'varchar','email'=>'varchar'));

    //用于监控是否调用到这个类
    public function __construct(){
        parent::__construct();
        echo 'Common UserModel';
    }

    //命名范围
    protected $_scope = array(
        'sql1'=>array(
            'where'=>array('id'=>1)
        ),
        'sql2'=>array(
            'order'=>array('date'=>'DESC'),
            'limit'=>1
        ),
        'default'=>array(

        )
    );

    //在模型里限制字段
    protected $insertFields = 'user';
    protected $updateFields = 'user';
}