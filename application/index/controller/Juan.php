<?php
namespace app\index\controller;
use think\Controller;
class Juan extends Controller{
    public function juan_add(){
        return $this->fetch('/timu_list');
    }
    public function juan_add1(){
        return $this->fetch('/timu_number');
    }
    public function timu_add(){
    $kid=input("number");
    $userlist=model('juan');
    $info=$userlist->juan_select($kid);
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
    $info1=$userlist->add_timu($kid,$comment,$a,$b,$c);
    if ($info1){
        $this->success('添加试题成功','juan/juan_select');
    }
    else{
        $this->error('添加失败，请重新输入','juan/juan_add');
    }
    return $this->fetch('/timu_number');
}
    public function juan_much_add(){
        return $this->fetch('/timi_much_number');
    }
    public function timu_much_add1(){
        $cid=input("number");
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
        $info1=$userlist->add_much_timu($cid,$comment,$a,$b,$c);
        if ($info1){
            $this->success('添加试题成功','juan/juan_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('/timu_number');
    }
    public function juan_judge_add(){
        return $this->fetch('/timu_judge_number');
    }
    public function timu_judge_add1(){
        $vid=input("number");
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
        $info1=$userlist->add_judge_timu($vid,$comment,$a,$b);
        if ($info1){
            $this->success('添加试题成功','juan/juan_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('/timu_number');
    }
    public function juan_object_add(){
        return $this->fetch('/timu_object_number');
    }
    public function timu_object_add1(){
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
        $info1=$userlist->add_object_timu($qid,$comment);
        if ($info1){
            $this->success('添加试题成功','juan/juan_select');
        }
        else{
            $this->error('添加失败，请重新输入','juan/juan_add');
        }
        return $this->fetch('/timu_number');
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
        return $this->fetch('/juan_show');
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
        return $this->fetch('/juan_much_show');
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
        return $this->fetch('/juan_judge_show');
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
        return $this->fetch('/juan_object_show');
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
        print_r($score);
        die();
    }
}