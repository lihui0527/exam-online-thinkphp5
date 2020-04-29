<?php
namespace app\index\controller;
use think\Controller;
class dajuant extends Controller
{//入口

    public function xs_list(){
        $kemu=session('kemu');

        $info=model('dajuan');
        $msginfo=$info->select_tea($kemu);
        $this->assign('message',$msginfo);
        return $this->fetch('/xs_list');

    }
    public function add_role(){
        $mid=input('mid');
        $info=model('dajuan');
        $msginfo=$info->in($mid);
        if($msginfo){
            $this->success("修改成功",'dajuant/xs_list');
        }
        else{
            $this->error("修改失败",'dajuant/xs_list');
        }
    }
}