<?php
namespace app\index\controller;
use think\Controller;
class Juan extends Controller{
    public function juan_add(){
        $xid=input('xid');
        session('xid',$xid);
        return $this->fetch('timu/timu_list');
    }
    public function juan_add1(){
        return $this->fetch('timu/timu_number');
    }
    public function timu_add(){
    $kid=input("number");
    $userlist=model('juan');
        $xid=session('xid');
    $info=$userlist->juan_select($kid);

    if($info==null) {
        $this->error('添加失败，请重新输入','juan/juan_add1');
    }

    $comment=$info[0]['comment'];

    $a=$info[0]['a'];
    $b=$info[0]['b'];
    $c=$info[0]['c'];
    $userlist=model('juan');
    $info1=$userlist->add_timu($kid,$comment,$a,$b,$c,$xid);
    if ($info1){
        $this->success('添加试题成功','juan/juan_select');
    }
    else{
        $this->error('添加失败，请重新输入','juan/juan_add');
    }
    return $this->fetch('timu/timu_number');
}
    public function juan_much_add(){


        return $this->fetch('timu/timi_much_number');
    }
    public function timu_much_add1(){
        $cid=input("number");
        $xid=session('xid');
        $userlist=model('juan');
        $info=$userlist->juan_select_much($cid);
//        print_r($info);
//        die();
        if($info==null) {
            $this->error('添加失败，请重新输入','juan/juan_add1');
        }
//        }
        $comment=$info[0]['comment'];
//        print_r($comment);
//        die();
        $a=$info[0]['a'];
        $b=$info[0]['b'];
        $c=$info[0]['c'];
        $userlist=model('juan');
        $info1=$userlist->add_much_timu($cid,$comment,$a,$b,$c,$xid);
        if ($info1){
            $this->success('添加试题成功','juan/juan_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('timu/timu_number');
    }
    public function juan_judge_add(){

        return $this->fetch('timu/timu_judge_number');
    }
    public function timu_judge_add1(){
        $vid=input("number");
        $xid=session('xid');
        $userlist=model('juan');
        $info=$userlist->juan_select_judge($vid);
//        print_r($info);
//        die();
        if($info==null) {
            $this->error('添加失败，请重新输入','juan/juan_add1');
        }
//        }
        $comment=$info[0]['comment'];
//        print_r($comment);
//        die();
        $a=$info[0]['a'];
        $b=$info[0]['b'];

        $userlist=model('juan');
        $info1=$userlist->add_judge_timu($vid,$comment,$a,$b,$xid);
        if ($info1){
            $this->success('添加试题成功','juan/juan_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('timu/timu_number');
    }
    public function juan_object_add(){

        return $this->fetch('timu/timu_object_number');
    }
    public function timu_object_add1(){
        $xid=session('xid');
        $qid=input("number");
        $userlist=model('juan');
        $info=$userlist->juan_select_object($qid);
//        print_r($info);
//        die();
        if($info==null) {
            $this->error('添加失败，请重新输入','juan/juan_add1');
        }
//        }
        $comment=$info[0]['comment'];
//        print_r($comment);
//        die();
        $userlist=model('juan');
        $info1=$userlist->add_object_timu($qid,$comment,$xid);
        if ($info1){
            $this->success('添加试题成功','juan/juan_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('timu/timu_number');
    }

    public function juan_select(){

        $info=model('juan');

        $msginfo=$info->shijuan_select();
        $msginfo1=count($msginfo);
        for($i=0;$i<$msginfo1;$i++){
            session('sid',$msginfo[$i]['sid']);
        }
        $m=[];
        for($i=0;$i<$msginfo1;$i++) {
            if ($msginfo[$i]['kid'] != null) {
                $m[$i]=$i;
                //单选
            }
        }
        $msginfo=$info->shijuan_dan_select();
        $this->assign('message',$msginfo);
        return $this->fetch('juan/juan_show');
    }
    public function juan_select1(){

        $info=model('juan');

        $msginfo=$info->shijuan_select();
        $msginfo1=count($msginfo);
        for($i=0;$i<$msginfo1;$i++){
            session('sid',$msginfo[$i]['sid']);
        }
        for($i=0;$i<$msginfo1;$i++) {
            if ($msginfo[$i]['cid'] != null) {
                //多选
            }
        }
        $msginfo=$info->shijuan_much_select();
        $this->assign('message1',$msginfo);
        return $this->fetch('juan/juan_much_show');
    }
    public function juan_select2(){

        $info=model('juan');

        $msginfo=$info->shijuan_select();
        $msginfo1=count($msginfo);
        for($i=0;$i<$msginfo1;$i++){
            session('sid',$msginfo[$i]['sid']);
        }
        for($i=0;$i<$msginfo1;$i++) {
            if ($msginfo[$i]['vid'] != null) {


                //判断
            }
        }
        $msginfo=$info->shijuan_judge_select();
        $this->assign('message2',$msginfo);
        return $this->fetch('juan/juan_judge_show');
    }
    public function juan_select3(){

        $info=model('juan');

        $msginfo=$info->shijuan_select();
        $msginfo1=count($msginfo);
        for($i=0;$i<$msginfo1;$i++){
            session('sid',$msginfo[$i]['sid']);
        }
        for($i=0;$i<$msginfo1;$i++) {
            if ($msginfo[$i]['qid'] != null) {
                //判断
            }
        }
        $msginfo=$info->shijuan_object_select();
        $this->assign('message3',$msginfo);
        return $this->fetch('juan/juan_object_show');
    }
    public function shijuan_pg(){
        $xuanzhe=input('');
        $info=model('juan');
        $msginfo=$info->shijuan_select();
        $timu_number=count($msginfo);
        $info1=model('juan');
        $msginfo1=$info1->fenshu_select();
       # print_r(var_dump($msginfo1[0]['daan']));
        # die();
        $score=0;
        for($i=0;$i<$timu_number;$i++){
            $fen=$xuanzhe[$i];

          if($msginfo1[$i]['daan']==(int)$fen)
          {      $score=$score+4;
              print_r("答案正确");
          }
          else {
              $score=$score+0;
                  print_r("答案错误");}
           }

    }
    public function shijuan_delete(){
        $xid=input('xid');
        $userlist=model('juan');
        $info=$userlist->shijuan_delete($xid);
        if($info)
        {
            $this->success('删除成功','library/library_select');
        }
        else
        {
            $this->error('删除失败','library/library_select');
        }
    }
    public function shiti_delete(){
        $sid=input('sid');
        $userlist=model('juan');
        $info=$userlist->shiti_delete($sid);
        if($info)
        {
            $this->success('删除成功','library/library_select');
        }
        else
        {
            $this->error('删除失败','library/library_select');
        }
    }
    public function pg1(){
        return $this->fetch('object/object_pg1');
    }
    public function pg(){
        $name=input('student_name');
        $userlist=model('xs');
        $msginfo=$userlist->xs_username($name);
        print_r($msginfo);die;
        $mid=$msginfo[0]['mid'];
        session('mid',$mid);
        $uid=session('uid');
        $userlist=model('juan');
        $msginfo=$userlist->shijuan_pigai($uid,$mid);
        $number=count($msginfo);
//        print_r($number);die;
        $m=[];
        for($i=0;$i<$number;$i++){
            $m[$i]=$msginfo[$i]['qid'];
        }
        $msginfo1=$userlist->shijuan_pigai_object($mid);
        $this->assign('message1',$msginfo);
        $this->assign('message',$msginfo1);
        return $this->fetch('object/object_pg');
    }
    public function juan_object_pingfen(){
        $fen=input('');
        $kemu=session('kemu');
        $mid=$fen['mid'];
        $defen=$fen['object_score'];
//        print_r($kemu);
//        die;
        $number=count($defen);

        $score=0;
        for($i=0;$i<$number;$i++){
            $score+=$defen[$i];
        }
        $userlist=model('juan');
        $msginfo=$userlist->shijuan_defen($mid,$score,$kemu);
        $info=model('student');
        $msginfo1=$info->fenshu_select($mid,$kemu);
        $zong=$msginfo1[0]['dan_score']+$msginfo1[0]['duo_score']+
            $msginfo1[0]['judge_score']+$msginfo1[0]['object_score'];
        $msginfo2=$userlist->shijuan_zong($mid,$zong,$kemu);
        if($msginfo2)
        {
            $this->success('评卷完成','tea/add_exam');
        }

    }

}