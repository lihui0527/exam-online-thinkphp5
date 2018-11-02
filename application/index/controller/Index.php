<?php
namespace app\index\controller;
use think\Controller;
use Url;
class Index extends Controller
{//入口
    public function index()
    {if(!strstr($_SERVER['REQUEST_URI'],'/index.php')) {

        Url::root('index.php');}
        return $this->fetch('/login');

    }
    public function login(){
        $username=input('username');
        $password=input('password');
        $admin=input('quanxian');
        if($admin=='stu')
        {
            $this->dlyz1($username,$password);
        }
        if($admin=='admin'){
            $this->dlyz($username,$password);
        }
        if($admin==null){
            return $this->error('登陆失败，角色不能为空','index/index');
        }
        else{
            $this->dlyz2($username,$password);
        }

        # $this->dlyz($username,$password);
        # return $this->fetch('/yonghushangpin');
    }
    public function dlyz($username,$password){
        $userlist = model('Student');

        $info=$userlist->x($username,$password);

        if(!($info)){
            return $this->error('密码错误','index/index_3');
        }
        else{

            $this->success('管理员登陆成功','admin/gl');
        }
    }
    public function dlyz2($username,$password){
        $userlist = model('tea');

        $info=$userlist->x($username,md5($password));

        if(!($info)){
            return $this->error('密码错误','index/index_3');
        }
        else{
                session('uid',$info['uid']);

            return $this->success('教师登陆成功','tea/add_exam');
        }
    }
    public function dlyz1($username,$password){
        $userlist = model('xs');

        $info=$userlist->x($username,md5($password));

        if(!($info)){
            return $this->error('密码错误','index/index_3');
        }
        else{

            $this->success('学生登陆成功','admin/gl');
        }
    }
    public function zc(){
        $username=input('username');

        $password=input('password');
        $password1=input('password1');
        $nickname=input('nickname');
        $foname=input('foname');
        $headimg = request()->file('headimg');
        if($headimg){
            $fo = $headimg->move(ROOT_PATH . 'public' . DS . 'static');
            $foname=$fo->getSaveName();
        }
        $userlist=model('student');
        if($password!=$password1){
            $this->error('俩次密码不一致请重新输入','index/index_1');
        }
        $info=$userlist->zc($username,$password,$nickname,$foname);

        if($info){
            $this->success('注册成功','index/index_3');
        }
        else{
            $this->error('注册失败','index/index_1');
        }
        /* if($userlist->validate(true)->allowField(true)->save($data)){
             $this->success('注册成功','index/index_3');
         }else{
             $this->error('注册失败','index/index_1');
         }*/

    }

}
