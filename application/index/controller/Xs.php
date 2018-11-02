<?php
namespace app\index\controller;
use think\Controller;
class Xs extends Controller
{//入口
    public function student_delete()
    {


        $mid=input('mid');
        $userlist=model('xs');
        $info=$userlist->sc($mid);
        if($info)
        {
            $this->success('删除成功','admin/student_select');
        }
        else
        {
            $this->error('删除失败','admin/student_select');
        }
    }
    public function student_bj(){


        $mid=input('mid');
        $this->assign('mid',$mid);
        return $this->fetch('/student_xg');

    }
    public function  student_xg(){
        $mid=input('mid');
        $username=input('username');

        $foname=input('foname');
        $headimg = request()->file('headimg');
        if($headimg){
            $fo = $headimg->move('./static');
            $foname=$fo->getSaveName();
        }

        $userlist=model('xs');
        $info=$userlist->bj($mid,$username,$foname);
        if($info){
            $this->success('修改成功','admin/student_select');
        }else{
            $this->error('修改失败，请重新修改','admin/student_select');
        }
    }
}