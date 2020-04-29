<?php
/**
 * Created by PhpStorm.
 * User: cmjj
 * Date: 2018/5/9
 * Time: 11:05
 */
namespace app\index\model;
use think\Model;
class Juan extends Model
{

    public function juan_select($kid){
        $info=db('tiku')->where('kid',$kid)->select();
        return $info;
    }
    public function juan_select_much($cid){
        $info=db('tiku_much')->where('cid',$cid)->select();
        return $info;
    }
    public function juan_select_judge($vid){
        $info=db('tiku_judge')->where('vid',$vid)->select();
        return $info;
    }
    public function juan_select_object($qid){
        $info=db('tiku_object')->where('qid',$qid)->select();
        return $info;
    }
    public function add_timu($kid,$comment,$a,$b,$c,$xid){
        $info=db('shijuan')->insert(['kid'=>$kid,'comment'=>$comment,'a'=>$a,
            'b'=>$b,'b'=>$b,'c'=>$c,'uid'=>session('uid'),'xid'=>$xid]);
        return $info;
    }
    public function add_much_timu($cid,$comment,$a,$b,$c,$xid){
        $info=db('shijuan')->insert(['cid'=>$cid,'comment'=>$comment,'a'=>$a,
            'b'=>$b,'b'=>$b,'c'=>$c,'uid'=>session('uid'),'xid'=>$xid]);
        return $info;
    }
    public function add_judge_timu($vid,$comment,$a,$b,$xid){
        $info=db('shijuan')->insert(['vid'=>$vid,'comment'=>$comment,'a'=>$a,
            'b'=>$b,'b'=>$b,'uid'=>session('uid'),'xid'=>$xid]);
        return $info;
    }
    public function add_object_timu($qid,$comment,$xid){
        $info=db('shijuan')->insert(['qid'=>$qid,'comment'=>$comment,
            'uid'=>session('uid'),'xid'=>$xid]);
        return $info;
    }
    public function shijuan_select(){
        $info=db('shijuan')->select();
        return $info;
    }
    public function shijuan_dan_select(){
    $info=db('shijuan')->where('kid','>',1)->select();
    return $info;
}
    public function shijuan_much_select(){
    $info=db('shijuan')->where('cid','>',1)->select();
    return $info;
}
    public function shijuan_judge_select(){
        $info=db('shijuan')->where('vid','>',1)->select();
        return $info;
    }
    public function shijuan_object_select(){
        $info=db('shijuan')->where('qid','>',1)->select();
        return $info;
    }
    public function save_daan($sid,$fen){
        $info=db('save')->insert(['sid'=>$sid,'hd'=>$fen]);
        return $info;
    }
    public function fenshu_select(){
        $info=db('tiku')->alias('a')->join('shijuan w','a.kid=w.kid')->select();
        return $info;
    }
    public function library_add($kemu,$username,$uid){
        $info=db('library')->insert(['kemu'=>$kemu,'username'=>$username,'uid'=>$uid]);
        return $info;
    }
    public function library_select(){
        $info=db('library')->paginate(3);
        return $info;
    }
    public function shijuan_delete($xid){
        $info=db('library')->where('xid',$xid)->delete();
        return $info;
    }
    public function shiti_delete($sid){
        $info=db('shijuan')->where('sid',$sid)->delete();
        return $info;
    }
    public function shijuan_pigai($uid,$mid){
        $info=db('ti_daan')->where('uid',$uid)->where('mid',$mid)->where('qid','>',1)->select();
        return $info;
    }
    public function shijuan_pigai_object($mid){
        $info=db('ti_daan')->alias('a')->join('tiku_object w','a.qid=w.qid')->where('mid',$mid)->select();
        return $info;
    }
    public function save_daan_judge($m,$n,$mid,$kemu,$uid){
        $info=db('ti_daan')->insert(['huida'=>$m,'vid'=>$n,'mid'=>$mid,'kemu'=>$kemu,'uid'=>$uid]);
        return $info;
    }
    public function shijuan_defen($mid,$score,$kemu){
        $info=db('score')->where('mid',$mid)->where('kemu',$kemu)->update(['object_score'=>$score]);
        return $info;
    }
    public function shijuan_zong($mid,$zong,$kemu){
        $info=db('score')->where('mid',$mid)->where('kemu',$kemu)->update(['zong'=>$zong]);
        return $info;
    }
}