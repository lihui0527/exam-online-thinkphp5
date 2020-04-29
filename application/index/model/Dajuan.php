<?php
/**
 * Created by PhpStorm.
 * User: cmjj
 * Date: 2018/5/9
 * Time: 11:05
 */
namespace app\index\model;
use think\Model;
class Dajuan extends Model
{
    public function select(){
        $info=db('ti_daan')->select();
        return $info;
    }
    public function select1($msgingo1){
        $info=db('shijuan')->where('uid',$msgingo1)->where('kid','>',1)->select();
        return $info;
    }
    public function select_duo_1($msgingo1){
        $info=db('shijuan')->where('uid',$msgingo1)->where('cid','>',1)->select();
        return $info;
    }
    public function select2($mid){
        $info=db('ti_daan')->where('mid',$mid)->where('kid','>',1)->select();
        return $info;
    }
    public function select_dan($mid){
        $info=db('ti_daan')->alias('a')->join('tiku w','a.kid=w.kid')->where('mid',$mid)->select();
        return $info;
    }
    public function select_duo($mid){
        $info=db('ti_daan')->where('mid',$mid)->where('cid','>',1)->select();
        return $info;
    }
    public function select_duo_daan(){
        $info=db('ti_daan')->select();
        return $info;
    }
    public function select_d($mid){
        $info=db('ti_daan')->alias('a')->join('tiku_much w','a.cid=w.cid')->where('mid',$mid)->select();
        return $info;
    }
    public function select_judge($mid){
        $info=db('ti_daan')->where('mid',$mid)->where('vid','>',1)->select();
        return $info;
    }
    public function select_judge_daan(){
        $info=db('ti_daan')->select();
        return $info;
    }
    public function select_judge_1($msgingo1){
        $info=db('shijuan')->where('uid',$msgingo1)->where('vid','>',1)->select();
        return $info;
    }
    public function select_j($mid){
        $info=db('ti_daan')->alias('a')->join('tiku_judge w','a.vid=w.vid')->where('mid',$mid)->select();
        return $info;
    }
    public function select_object($mid){
        $info=db('ti_daan')->where('mid',$mid)->where('qid','>',1)->select();
        return $info;
    }
    public function select_object_daan(){
        $info=db('ti_daan')->select();
        return $info;
    }
    public function select_object_1($msgingo1){
        $info=db('shijuan')->where('uid',$msgingo1)->where('qid','>',1)->select();
        return $info;
    }
    public function select_o($mid){
        $info=db('ti_daan')->alias('a')->join('tiku_object w','a.qid=w.qid')->where('mid',$mid)->select();
        return $info;
    }
    public function select_tea($kemu){
        $info=db('score')->alias('a')->join('xs w','a.mid=w.mid')->where('kemu',$kemu)->select();
        return $info;
    }
    public function in($mid){
        $info=db('xs')->where('mid',$mid)->update(['role'=>1]);
        return $info;
    }
    public function select_xs($mid){
        $info=db('xs')->where('mid',$mid)->select();
        return $info;
    }
}