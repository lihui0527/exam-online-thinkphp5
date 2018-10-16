<?php
namespace app\index\controller;
use think\Controller;
class Admin extends Controller{
    public function gl()
    {
        return $this->fetch('/glym');
    }
    public function yhgl()
    {
        return $this->fetch('/yhgl');

    }
    public function ktxxgl()
    {
        return $this->fetch('/ktxx');
    }
    public function student_add()
    {
        return $this->fetch('/stu_add');
    }
    public function xstj(){
        $username=input('username');
        $password=input('password');
        $password1=input('password1');

        $foname=input('foname');
        $headimg = request()->file('headimg');
        if($headimg){
            $fo = $headimg->move('./static');
            $foname=$fo->getSaveName();
        }


        $userlist=model('xs');

        if($password!=$password1){
            $this->error('俩次密码不一致请重新输入','admin/student_add');
        }
        $info=$userlist->zc($username,$password,$foname);

        if($info){
            $this->success('注册成功','admin/yhgl');
        }
        else{
            $this->error('注册失败','admin/yhgl');
        }
        /* if($userlist->validate(true)->allowField(true)->save($data)){
             $this->success('注册成功','index/index_3');
         }else{
             $this->error('注册失败','index/index_1');
         }*/

    }
    public function student_select()

    {   $mid=input();
        $info=model('xs');
        $msginfo=$info->xslb($mid);
        $this->assign('message',$msginfo);
        return $this->fetch('/xslb');
    }
}