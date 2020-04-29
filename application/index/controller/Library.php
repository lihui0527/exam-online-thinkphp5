<?php
namespace app\index\controller;
use think\Controller;
class library extends Controller{
    public function library(){
    return $this->fetch('/library_add');

            }
    public function library_add(){
        $kemu=input('kemu');
        $username=session('username');
        $uid=session('uid');
        $userlist=model('juan');
        $info=$userlist->library_add($kemu,$username,$uid);
        if ($info){
            $this->success('添加试卷成功','library/library_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('/timu_number');
    }
    public function library_select()

    {
        $info=model('juan');
        $msginfo=$info->library_select();
        $page = $msginfo->render();
        $this->assign('page', $page);
        $this->assign('message',$msginfo);
        return $this->fetch('library/library_show');
    }
}