<?php
namespace app\index\controller;
use think\Controller;
class Admin extends Controller{
    public function gl()
    {
        return $this->fetch('gly/glym');
    }
    public function gl1()
    {  $username=session('username');
        $userlist1=model('student');
        $msginfo1=$userlist1->tea($username);
        $this->assign('message',$msginfo1);
        return $this->fetch('gly/glym1');
    }
    public function gl2()
    {
        return $this->fetch('gly/glym2');
    }
    public function yhgl()
    {
        return $this->fetch('gly/glym');

    }
    public function xsgl()
    {
        return $this->fetch('student/stu_gl');

    }
    public function ktxxgl()
    {
        return $this->fetch('kemu/ktxx');
    }
    public function student_add()
    {
        return $this->fetch('student/stu_add');
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
            $this->success('注册成功','admin/gl');
        }
        else{
            $this->error('注册失败','admin/gl');
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
        $page = $msginfo->render();
        $this->assign('page',$page);
        $this->assign('message',$msginfo);
        return $this->fetch('/xslb');
    }
    public function kc_add()
    {    $xs = model('kc');
        $info = $xs->xs();
        $info1 = $xs->js();
        $this->assign('message',$info);
        $this->assign('message1',$info1);
        return $this->fetch('kc/kc_add');
    }
    public function kc_addT()
    {
        return $this->fetch('kc/kc_addT');
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
    public function kc_add11()
    {
        $kc_name = input('kc_name');
        $kc_tea = input('kc_tea');
        $kc_student = input('kc_student');

        $kc_describe = input('kc_describe');
        $kc_starttime = input('kc_starttime');
        $kc_list = model('kc');
        $info = $kc_list->zc($kc_name, $kc_tea, $kc_student, $kc_describe,$kc_starttime);
        if($info){
            $this->success('登记成功','admin/kc_showT');
        }
        else{
            $this->error('登记失败','admin/kc_addT');
        }
    }
    public function kc_show()

    {   $id=input();
        $info=model('kc');
        $msginfo=$info->kclb($id);
        $page = $msginfo->render();
        $this->assign('page',$page);
        $this->assign('message',$msginfo);
        return $this->fetch('kc/kc_show');
    }
    public function kc_showT()
    {   $id=input();
    $username=session('username');
//        print_r($username);die;
        $info=model('kc');
        $msginfo=$info->kclb_1($username);

        $this->assign('message',$msginfo);
        return $this->fetch('kc/kc_showT');
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
    public function kc_deleteT(){
        $id=input('id');
        $userlist=model('kc');
        $info=$userlist->sc($id);
        if($info)
        {
            $this->success('删除成功','admin/kc_showT');
        }
        else
        {
            $this->error('删除失败','admin/kc_showT');
        }

    }
    public function kc_bj(){


        $id=input('id');
        $this->assign('id',$id);
        return $this->fetch('kc/kc_xg');

    }
    public function kc_bjT(){


        $id=input('id');
        $this->assign('id',$id);
        return $this->fetch('kc/kc_xgT');

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
    public function kc_xgT(){
        $id=input('id');
        $kc_name = input('kc_name');

        $kc_tea = input('kc_tea');
        $kc_student = input('kc_student');

        $kc_describe = input('kc_describe');
        $kc_starttime = input('kc_starttime');
        $kc_list = model('Kc');
        $info=$kc_list->kc_bj($id,$kc_name,$kc_tea,$kc_student,$kc_describe,$kc_starttime);
        if($info){
            $this->success('修改成功','admin/kc_showT');
        }else{
            $this->error('修改失败，请重新修改','admin/kc_showT');
        }
    }
}