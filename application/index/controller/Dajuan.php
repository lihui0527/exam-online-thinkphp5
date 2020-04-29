<?php
namespace app\index\controller;
use think\Controller;
class dajuan extends Controller{
    public function dajuan_select(){

        $mid=input('mid');
        $info=model('dajuan');
        $msginfot=$info->select_xs($mid);
        $m=$msginfot[0]['role'];
        if($m==1)
        {
            session('mid',$mid);
            $info=model('dajuan');
            $msginfo3=$info->select2($mid);
            $msginfo=$info->select($mid);
            $msginfo1=$msginfo[0]['uid'];
            $msginfo2=$info->select1($msginfo1);
//        print_r($msginfo2);die;
            $msginfo4=$info->select_dan($mid);
            $this->assign('message',$msginfo2);
            $this->assign('message1',$msginfo3);
            $this->assign('message2',$msginfo4);
            return $this->fetch('student/student_dajuan');
        }
       else{
           $this->error("查看失败，教师还未给你开通答卷",'student/student');
       }

    }
    public function dajuan_much_select(){
    $mid=session('mid');
    $info=model('dajuan');
    $msginfo3=$info->select_duo($mid);
    $msginfo=$info->select_duo_daan($mid);
    $msginfo1=$msginfo[0]['uid'];
    $msginfo2=$info->select_duo_1($msginfo1);
    $msginfo4=$info->select_d($mid);
    $this->assign('message',$msginfo2);
    $this->assign('message1',$msginfo3);
    $this->assign('message2',$msginfo4);
    return $this->fetch('student/student_duo_dajuan');

    }
    public function dajuan_judge_select(){
        $mid=session('mid');
        $info=model('dajuan');
        $msginfo3=$info->select_judge($mid);
        $msginfo=$info->select_judge_daan($mid);
        $msginfo1=$msginfo[0]['uid'];
        $msginfo2=$info->select_judge_1($msginfo1);
        $msginfo4=$info->select_j($mid);
        $this->assign('message',$msginfo2);
        $this->assign('message1',$msginfo3);
        $this->assign('message2',$msginfo4);
        return $this->fetch('student/student_judge_dajuan');

    }
    public function dajuan_object_select(){
        $mid=session('mid');
        $info=model('dajuan');
        $msginfo3=$info->select_object($mid);
        $msginfo=$info->select_object_daan($mid);
        $msginfo1=$msginfo[0]['uid'];
        $msginfo2=$info->select_object_1($msginfo1);
        $msginfo4=$info->select_o($mid);
        $this->assign('message',$msginfo2);
        $this->assign('message1',$msginfo3);
        $this->assign('message2',$msginfo4);
        return $this->fetch('student/student_object_dajuan');

    }
}