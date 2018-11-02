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
    ######  单选   ############3
    public function  add_exam(){
        return $this->fetch('/tea_gl');
    }
    public function  add_exam2(){
        return $this->fetch('/add_exam');
    }
    public function  add_exam3(){
        return $this->fetch('/exam_class');
    }
    public function  exam_add1(){
        $comment=input('comment');
        $nandu=input('nandu');
        $dian=input('dian');
        $a=input('a');
        $b=input('b');
        $c=input('c');
        $daan=input('daan');
        $score=input('score');
        $userlist=model('tea');
        $uid=session('uid');
        $info=$userlist->exam_add($comment,$nandu,$dian,$a,$b,$c,$daan,$score,$uid);

        if($info){
            $this->success('添加成功','tea/exam_show');
        }
        else{
            $this->error('注册失败','');
        }
    }
    public function  exam_show1(){

        return $this->fetch('/exam_show');
    }
    public function  exam_show(){
        $kid=input();
        $info=model('tea');
        $msginfo=$info->exam_lb($kid);
        $page = $msginfo->render();
        $this->assign('page', $page);
        $this->assign('message',$msginfo);
        return $this->fetch('/exam_lb');
    }
    public function  exam_delete(){
        $kid=input('kid');
        $userlist=model('tea');
        $info=$userlist->exam_sc($kid);
        if($info)
        {
            $this->success('删除成功','tea/exam_show');
        }
        else
        {
            $this->error('删除失败','tea/tea_select');
        }
    }
    public function  exam_bj(){
        $kid=input('kid');
        $this->assign('kid',$kid);
        return $this->fetch('/exam_xg');
    }
    public function exam_xg(){
        $kid=input('kid');
        $comment=input('comment');
        $nandu=input('nandu');
        $dian=input('dian');
        $a=input('a');
        $b=input('b');
        $c=input('c');
        $daan=input('daan');
        $score=input('score');
        $userlist=model('tea');
        $info=$userlist->exam_xg($kid,$comment,$nandu,$dian,$a,$b,$c,$daan,$score);

        if($info){
            $this->success('修改成功','tea/exam_show');
        }
        else{
            $this->error('修改失败','');
        }
    }
    ##############
    ######## 多选      ####################
    public function add_exam_much(){
        return $this->fetch('/add_exam_much');
    }
    public function  add_exam_much1(){
        $comment=input('comment');
        $nandu=input('nandu');
        $dian=input('dian');
        $a=input('a');
        $b=input('b');
        $c=input('c');
        $daan=$_POST['daan'];
        $daan1=json_encode($daan,true);
       #print_r($daan1);
      #  die();
        $score=input('score');
        $uid=session('uid');
        $userlist=model('tea');
        $info=$userlist->exam_add_much($comment,$nandu,$dian,$a,$b,$c,$daan1,$score,$uid);
######提取出来##########
  #      $userlist=model('tea');
  #      $msginfo1=$userlist->exam_much_lb();
  #      $msginfo2=$msginfo1[0]['daan'];
   #    # print_r($msginfo1[1]['daan']);
 #      $m=(json_decode($msginfo2))[0];
   #    print_r(count(json_decode($msginfo2)));
   #    die();
    #   if ($m==2)
   #    {
   #       print_r("成功");
   #    }
   #     die();
        if($info){
            $this->success('添加成功','tea/exam_much_show');
        }
        else{
            $this->error('注册失败','');
        }
    }
    public function  exam_much_show(){
        $cid=input();
        $info=model('tea');
        $msginfo=$info->exam_much_lb($cid);
        $page = $msginfo->render();
        $this->assign('page1', $page);
        $this->assign('message',$msginfo);

        return $this->fetch('/exam_much_lb');
    }
    public function  exam_much_delete(){
        $cid=input('cid');
        $userlist=model('tea');
        $info=$userlist->exam_much_sc($cid);
        if($info)
        {
            $this->success('删除成功','tea/exam_much_show');
        }
        else
        {
            $this->error('删除失败','tea/exam_much_show');
        }
    }
    public function  exam_much_bj(){
        $cid=input('cid');
        $this->assign('cid',$cid);
        return $this->fetch('/exam_much_xg');
    }
    public function exam_much_xg(){
        $cid=input('cid');
        $comment=input('comment');
        $nandu=input('nandu');
        $dian=input('dian');
        $a=input('a');
        $b=input('b');
        $c=input('c');
        $daan=input('daan');
        $score=input('score');
        $userlist=model('tea');
        $info=$userlist->exam_much_xg($cid,$comment,$nandu,$dian,$a,$b,$c,$daan,$score);

        if($info){
            $this->success('修改成功','tea/exam_much_show');
        }
        else{
            $this->error('修改失败','tea/exam_much_show');
        }
    }
    #########判断题################
    public function exam_judge_add(){
        return $this->fetch('/exam_judge_add');
    }
    public function  exam_judge_add1(){
        $comment=input('comment');
        $nandu=input('nandu');
        $dian=input('dian');
        $a=input('a');
        $b=input('b');

        $daan=input('daan');
        $score=input('score');
        $uid=session('uid');
        $userlist=model('tea');

        $info=$userlist->exam_judge_add($comment,$nandu,$dian,$a,$b,$daan,$score,$uid);

        if($info){
            $this->success('添加成功','tea/exam_judge_show');
        }
        else{
            $this->error('注册失败','');
        }
    }
    public function  exam_judge_show(){
        $vid=input();
        $info=model('tea');
        $msginfo=$info->exam_judge_lb($vid);
        $page = $msginfo->render();
        $this->assign('page', $page);
        $this->assign('message',$msginfo);
        return $this->fetch('/exam_judge_lb');
    }
    public function  exam_judge_delete(){
        $vid=input('vid');
        $userlist=model('tea');
        $info=$userlist->exam_judge_sc($vid);
        if($info)
        {
            $this->success('删除成功','tea/exam_judge_show');
        }
        else
        {
            $this->error('删除失败','tea/exam_judge_show');
        }
    }
    ####################################
    ##############主观题##############
    public function exam_object_add(){
        return $this->fetch('/exam_object_add');
    }
    public function exam_object_add1(){
        $comment=input('comment');
        $nandu=input('nandu');
        $dian=input('dian');
        $daan=input('daan');
        $score=input('score');
        $uid=session('uid');
        $userlist=model('tea');
        $info=$userlist->exam_object_add($comment,$nandu,$dian,$daan,$score,$uid);

        if($info){
            $this->success('添加成功','tea/exam_object_show');
        }
        else{
            $this->error('注册失败','tea/exam_object_show');
        }
    }
    public function exam_object_show(){
        $qid=input();
        $info=model('tea');
        $msginfo=$info->exam_object_lb($qid);
        $page = $msginfo->render();
        $this->assign('page', $page);
        $this->assign('message',$msginfo);
        return $this->fetch('/exam_object_lb');
    }
    public function  exam_object_delete(){
        $qid=input('qid');
        $userlist=model('tea');
        $info=$userlist->exam_object_sc($qid);
        if($info)
        {
            $this->success('删除成功','tea/exam_judge_show');
        }
        else
        {
            $this->error('删除失败','tea/exam_judge_show');
        }
    }
    ######################################
}