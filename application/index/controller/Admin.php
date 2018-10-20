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
    public function kc_add()
    {
        return $this->fetch('/kc_add');
    }
    public function kc_add1()
    {
        $kc_name = input('kc_name');
        $kc_tea = input('kc_tea');
        $kc_student = input('kc_student');

        $kc_describe = input('kc_describe');
        $kc_starttime = input('kc_starttime');
        $kc_list = model('kc');
        $info = $kc_list->zc($kc_name, $kc_tea, $kc_student, $kc_describe,$kc_starttime);
        if($info){
            $this->success('登记成功','admin/kc_show');
        }
        else{
            $this->error('登记失败','admin/kc_add');
        }
    }
    public function kc_show()

    {   $id=input();
        $info=model('kc');
        $msginfo=$info->kclb($id);
        $this->assign('message',$msginfo);
        return $this->fetch('/kc_show');
    }
    public function kc_delete(){
        $id=input('id');
        $userlist=model('kc');
        $info=$userlist->sc($id);
        if($info)
        {
            $this->success('删除成功','admin/kc_show');
        }
        else
        {
            $this->error('删除失败','admin/kc_show');
        }

    }
    public function kc_bj(){


        $id=input('id');
        $this->assign('id',$id);
        return $this->fetch('/kc_xg');

    }
    public function kc_xg(){
        $id=input('id');
        $kc_name = input('kc_name');
        $kc_tea = input('kc_tea');
        $kc_student = input('kc_student');

        $kc_describe = input('kc_describe');
        $kc_starttime = input('kc_starttime');
        $kc_list = model('Kc');
        $info=$kc_list->kc_bj($id,$kc_name,$kc_tea,$kc_student,$kc_describe,$kc_starttime);
        if($info){
            $this->success('修改成功','admin/kc_show');
        }else{
            $this->error('修改失败，请重新修改','admin/kc_show');
        }
    }
}