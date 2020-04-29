<?php
namespace app\index\controller;
use think\Controller;
class Student extends Controller
{//入口
    public function student()
    {       
        $mid=session('mid');
        $info=model('student');
        $msginfo=$info->xs_lb($mid);
        $this->assign('message',$msginfo);
        return $this->fetch('student/student_function');
    }
    public function kemu()
    {
        return $this->fetch('kemu/kemu');
    }
    public function back()
    {
        $mid=session('mid');
        $info=model('student');
        $msginfo=$info->xs_lb($mid);
        $this->assign('message',$msginfo);
        return $this->fetch('student/student_function');
    }
    public function kemu_judge()
    {   $mid=session('mid');
        $kemu=input('kemu');
        session('kemu',$kemu);
        $username=input('username');
        $info=model('student');
        $msginfo=$info->kemu_select($kemu,$username);
         if($msginfo){
               $xid=$msginfo['xid'];
               session('xid',$xid);
             session('uid',$msginfo['uid']);
             $info=model('student');
             $msginfo=$info->kemu_shijuan_select($xid);
             $number=count($msginfo);
             $tihao=[];
             for($i=0;$i<$number;$i++) {
                 $tihao[] = $msginfo[$i]['kid'];
             }
//             print_r($tihao);
//             die;
             session('tihao',$tihao);
             if(!$msginfo){
                 $this->error('查询失败,重新选择','student/kemu');
             }
             else{
                 $this->assign('message',$msginfo);
                 return $this->fetch('shiti/shiti_dan_show');
             }
          }
          else{
              $this->error('查询失败,没有此科目或者老师，请重新填写','student/kemu');
          }
    }
    public function shiti_much(){
        $tihao=session('tihao');
        $uid=session('uid');
          $number=count($tihao);
               $daan=input('');
               $mid=session('mid');
               $kemu=session('kemu');
            for($i=0;$i<$number;$i++){
                $m=$daan[$i];
                $n=$tihao[$i];
                $info=model('student');
                $msginfo=$info->save_daan($m,$n,$mid,$kemu,$uid);
            }
//        if($msginfo)
//        {
//            $this->success('保存成功','library/library_select');
//        }
        $xid=session('xid');
        $info=model('student');
        $msginfo=$info->shijuan_duo_select($xid);
        $number=count($msginfo);
        //print_r($number);die;
        $tihao1=[];
        for($i=0;$i<$number;$i++) {
            $tihao1[] = $msginfo[$i]['cid'];
        }
//             print_r($tihao1);
//             die;
        session('tihao1',$tihao1);
        if(!$msginfo){
            $this->error('查询失败,重新选择','student/kemu');
        }
        else{

            $this->assign('message',$msginfo);
            return $this->fetch('shiti/shiti_duo_show');
        }

    }
    public function shiti_judge(){
        $uid=session('uid');
        $tihao1=session('tihao1');
        $number=count($tihao1);
        $daan=input('');
        $mid=session('mid');
        $kemu=session('kemu');
        $number1=count($daan)-1;
        for($i=0;$i<$number;$i++){
            $m1=$daan[$i];
            $m=json_encode($m1);
            $n=$tihao1[$i];
            $info=model('student');
            $msginfo1=$info->save_daan_duo($m,$n,$mid,$kemu,$uid);
        }
        $xid=session('xid');
        $info=model('student');
        $msginfo=$info->shijuan_judge_select($xid);
        $number=count($msginfo);
        //print_r($number);die;
        $tihao2=[];
        for($i=0;$i<$number;$i++) {
            $tihao2[] = $msginfo[$i]['vid'];
        }
//             print_r($tihao1);
//             die;
        session('tihao2',$tihao2);
        if(!$msginfo){
            $this->error('查询失败,重新选择','student/kemu');
        }
        else{

            $this->assign('message',$msginfo);
            return $this->fetch('shiti/shiti_judge_show');
        }

    }
    public function shiti_zhuguan(){
        $uid=session('uid');
        $mid=session('mid');
        $kemu=session('kemu');
        $tihao2=session('tihao2');
        $number=count($tihao2);
        $daan=input('');
        for($i=0;$i<$number;$i++){
            $m=$daan[$i];
            $n=$tihao2[$i];
            $info=model('student');
            $msginfo=$info->save_daan_judge($m,$n,$mid,$kemu,$uid);
        }
        $xid=session('xid');
        $info=model('student');
        $msginfo=$info->shijuan_zhuguan_select($xid);
        $number=count($msginfo);
        //print_r($number);die;
        $tihao3=[];
        for($i=0;$i<$number;$i++) {
            $tihao3[] = $msginfo[$i]['qid'];
        }
        session('tihao3',$tihao3);
        if(!$msginfo){
            $this->error('查询失败,重新选择','student/kemu');
        }
        else{
            $this->assign('message',$msginfo);
            return $this->fetch('shiti/shiti_zhuguan_show');
        }

    }
    public function fenshu(){
        $uid=session('uid');
        $tihao3=session('tihao3');
        $mid=session('mid');
        $kemu=session('kemu');
        $number=count($tihao3);

        $daan1=input('');
        $daan=$daan1['zhu_daan'];

        for($i=0;$i<$number;$i++){
            $m=$daan[$i];
            $n=$tihao3[$i];
            $info=model('student');
            $msginfo=$info->save_daan_object($m,$n,$mid,$kemu,$uid);
        }
        if($msginfo){
            $this->success('成功提交试卷','student/pg');
        }
    }
    public function pg(){
        $info=model('student');
        //单选批改
        $msginfo=$info->pg();
        $number=count($msginfo);
        $score=0;
        if($msginfo){
            for($i=0;$i<$number;$i++) {
                if($msginfo[$i]['huida']==$msginfo[$i]['daan']){
                   $score=$score+2;
                    continue;
                }
                else{
                    $score=$score+0;
                }
            }
            $dan_score=$score;
        }
//多选批改
        $msginfo=$info->pg_duo();
        $number=count($msginfo);
        $score1=0;
        if($msginfo){
            for($i=0;$i<$number;$i++) {
                if($msginfo[$i]['huida']==$msginfo[$i]['daan']){
                    $score1=$score1+2;
                    continue;
                }
                else{
                    $score1=$score1+0;
                }
            }
            $duo_score=$score1;
        }
        //判断
        $msginfo=$info->pg_judge();
        $number=count($msginfo);
        $score2=0;
        if($msginfo){
            for($i=0;$i<$number;$i++) {
                if($msginfo[$i]['huida']==$msginfo[$i]['daan']){
                    $score2=$score2+2;
                    continue;
                }
                else{
                    $score2=$score2+0;
                }
            }
            $judge_score=$score2;
        }
        $xuanzhe_score=$dan_score+$duo_score+$judge_score;
        //写入数据库
        $mid=session('mid');
        $kemu=session('kemu');
        $info=model('student');
        $msginfo=$info->fenshu($kemu,$mid,$dan_score,$duo_score,$judge_score);
        if($msginfo)
        {
            $this->success('提交成功，等待老师批改','student/student');
        }
    }
    public function fenshu_select1(){
        $mid=input('mid');
        session('mid',$mid);
        return $this->fetch('kemu/kemu1');
    }
    public function fenshu_select(){
        $mid=session('mid');

        $kemu=$_POST['kemu'];
        $info=model('student');
        $msginfo=$info->fenshu_select($mid,$kemu);


        if($msginfo){
            $this->assign('message',$msginfo);
            return $this->fetch('juan/shijuan_fenshu');
        }
        else{
            $this->error('查询失败,重新选择','student/student');
        }
    }
}