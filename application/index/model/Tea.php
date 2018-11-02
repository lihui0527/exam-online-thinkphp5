<?php
/**
 * Created by PhpStorm.
 * User: cmjj
 * Date: 2018/5/9
 * Time: 11:05
 */
namespace app\index\model;
use think\Model;
class Tea extends Model
{
    public function tea_add($username,$password,$foname){
        $info=$this->insert(['username'=>$username,'password'=>md5($password),'headimg'=>$foname]);
        return $info;
    }
    public function tea_lb(){
        $info=db('tea')->order('uid desc')->select();
        return $info;
    }
    public function sc($uid){
        $info=db('tea')->where('uid',$uid)->delete();
        return $info;
    }
    public  function  tea_bj($uid,$username,$foname){
        $info=db('tea')->where('uid',$uid)->update(['username'=>$username,'headimg'=>$foname]);
        return $info;

    }
    public function x($username,$password){
        $info=db('tea')->where('username',$username)->where('password',$password)->find();
        return $info;
    }
    public function exam_add($comment,$nandu,$dian,$a,$b,$c,$daan,$score,$uid){
        $info=db('tiku')->insert(['comment'=>$comment,'nandu'=>$nandu,'dian'=>$dian,'a'=>$a,'b'=>$b,'c'=>$c,'daan'=>$daan,'score'=>$score,'uid'=>$uid]);
        return $info;
    }
    public function exam_lb(){
        $info=db('tiku')->paginate(4);
        return $info;
    }
    public function exam_sc($kid){
        $info=db('tiku')->where('kid',$kid)->delete();
        return $info;
    }
    public  function  exam_xg($kid,$comment,$nandu,$dian,$a,$b,$c,$daan,$score){
        $info=db('tiku')->where('kid',$kid)->update(['comment'=>$comment,'nandu'=>$nandu,'dian'=>$dian,
            'a'=>$a,'b'=>$b,'c'=>$c,'daan'=>$daan,'score'=>$score]);
        return $info;

    }
    public function exam_add_much($comment,$nandu,$dian,$a,$b,$c,$daan1,$score,$uid){
        $info=db('tiku_much')->insert(['comment'=>$comment,'nandu'=>$nandu,'dian'=>$dian,'a'=>$a,'b'=>$b,'c'=>$c,'daan'=>$daan1,'score'=>$score,'uid'=>$uid]);
        return $info;
    }
    public function exam_much_lb(){
        $info=db('tiku_much')->paginate(4);
        return $info;
    }
    public function exam_much_sc($cid){
        $info=db('tiku_much')->where('cid',$cid)->delete();
        return $info;
    }
    public  function  exam_much_xg($cid,$comment,$nandu,$dian,$a,$b,$c,$daan,$score){
        $info=db('tiku_much')->where('cid',$cid)->update(['comment'=>$comment,'nandu'=>$nandu,'dian'=>$dian,
            'a'=>$a,'b'=>$b,'c'=>$c,'daan'=>$daan,'score'=>$score]);
        return $info;

    }
    public function exam_judge_add($comment,$nandu,$dian,$a,$b,$daan,$score,$uid){
        $info=db('tiku_judge')->insert(['comment'=>$comment,'nandu'=>$nandu,'dian'=>$dian,'a'=>$a,'b'=>$b,'daan'=>$daan,'score'=>$score,'uid'=>$uid]);
        return $info;
    }
    public function exam_judge_lb(){
        $info=db('tiku_judge')->paginate(4);
        return $info;
    }
    public function exam_judge_sc($vid){
        $info=db('tiku_judge')->where('vid',$vid)->delete();
        return $info;
    }
    public function exam_object_add($comment,$nandu,$dian,$daan,$score,$uid){
        $info=db('tiku_object')->insert(['comment'=>$comment,'nandu'=>$nandu,'dian'=>$dian,'daan'=>$daan,'score'=>$score,'uid'=>$uid]);
        return $info;
    }
    public function exam_object_lb(){
        $info=db('tiku_object')->paginate(4);
        return $info;
    }
    public function exam_object_sc($qid){
        $info=db('tiku_object')->where('qid',$qid)->delete();
        return $info;
    }
}