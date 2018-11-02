<?php
namespace app\index\validate;
class Userlist extends \think\Validate{
    protected $rule=array(
        'username'=>'require|unique:userlist',
        'password'=>'require|confirm'
    );
    protected $message=array(
        'username.require'=>'请填写用户名',
        'username.unique'=>'用户名重复',
        'password.require'=>'请填写用户密码',
        'password.confirm'=>'俩次密码不一致',

    );
    protected $scene=array(
        'add'=>['username','password'],
    )
}