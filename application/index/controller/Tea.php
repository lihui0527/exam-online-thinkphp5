<?php
namespace app\index\controller;
use think\Controller;
class Tea extends Controller
{//入口
    public function tea_addym()
    {
        return $this->fetch('/tea_add');
    }
    public function tea_add(){
        $username=input('username');
        $password=input('password');
        $password1=input('password1');

        $foname=input('foname');
        $headimg = request()->file('headimg');
        if($headimg){
            $fo = $headimg->move('./static');
            $foname=$fo->getSaveName();
        }


        $userlist=model('tea');

        if($password!=$password1){
            $this->error('俩次密码不一致请重新输入','tea/tea_add');
        }
        $info=$userlist->tea_add($username,$password,$foname);

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
    public function tea_select()

    {   $uid=input();
        $info=model('tea');
        $msginfo=$info->tea_lb($uid);
        $this->assign('message',$msginfo);
        return $this->fetch('/tea_lb');
    }
    public function tea_delete()
    {


        $uid=input('uid');
        $userlist=model('tea');
        $info=$userlist->sc($uid);
        if($info)
        {
            $this->success('删除成功','tea/tea_select');
        }
        else
        {
            $this->error('删除失败','tea/tea_select');
        }
    }
    public function tea_bj(){


        $uid=input('uid');
        $this->assign('uid',$uid);
        return $this->fetch('/tea_xg');

    }
    public function  tea_xg(){
        $uid=input('uid');
        $username=input('username');
        $foname=input('foname');
        $headimg = request()->file('headimg');
        if($headimg){
            $fo = $headimg->move('./static');
            $foname=$fo->getSaveName();
        }

        $userlist=model('tea');
        $info=$userlist->tea_bj($uid,$username,$foname);
        if($info){
            $this->success('修改成功','tea/tea_select');
        }else{
            $this->error('修改失败，请重新修改','tea/tea_select');
        }
    }
}