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
    public function add_timu($kid,$comment,$a,$b,$c){
        $info=db('shijuan')->insert(['kid'=>$kid,'comment'=>$comment,'a'=>$a,
            'b'=>$b,'b'=>$b,'c'=>$c,'uid'=>session('uid')]);
        return $info;
    }
    public function add_much_timu($cid,$comment,$a,$b,$c){
        $info=db('shijuan')->insert(['cid'=>$cid,'comment'=>$comment,'a'=>$a,
            'b'=>$b,'b'=>$b,'c'=>$c,'uid'=>session('uid')]);
        return $info;
    }
    public function add_judge_timu($vid,$comment,$a,$b){
        $info=db('shijuan')->insert(['vid'=>$vid,'comment'=>$comment,'a'=>$a,
            'b'=>$b,'b'=>$b,'uid'=>session('uid')]);
        return $info;
    }
    public function add_object_timu($qid,$comment){
        $info=db('shijuan')->insert(['qid'=>$qid,'comment'=>$comment,
            'uid'=>session('uid')]);
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
}