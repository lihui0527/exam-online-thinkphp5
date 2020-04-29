<?php
/**
 * Created by PhpStorm.
 * User: cmjj
 * Date: 2018/5/9
 * Time: 11:05
 */
namespace app\index\model;
use think\Model;
class Student extends Model {

    public function x($username,$password){
        $info=db('student')->where('username',$username)->where('password',$password)->find();
        return $info;
    }
    public function zc($username,$password,$nickname,$foname){
        $info=$this->insert(['username'=>$username,'password'=>md5($password),'nickname'=>$nickname,'regtime'=>time(),'regip'=>$_SERVER['SERVER_ADDR'],'headimg'=>$foname]);
        return $info;
    }
    public function xs(){
        $info=db('student')->select();
        return $info;
    } 
    public function tea($username){
        $info=db('tea')->where('username',$username)->select();
        return $info;
    }

    public  function  shangjiazc($username,$password,$haoma,$mingchen,$foname){
        $info=db('shangjia')->insert(['username'=>$username,'password'=>md5($password),'haoma'=>$haoma,'mingchen'=>$mingchen,'headimg'=>$foname]);
        return $info;
    }
    public function gouwuche($bb,$color,$ver,$amount){
        $info=db('gouwuche')->insert(['bb'=>$bb,'color'=>$color,'ver'=>$ver,'amount'=>$amount]);
        return $info;

    }
    public  function  dlyz($username,$password){
        $info=db('shangjia')->where('username',$username)->where('password',$password)->find();
        return $info;
    }
    public function xs_lb($mid){
        $info=db('xs')->where('mid',$mid)->select();
        return $info;
    }
    public function kemu_select($kemu,$username){
        $info=db('library')->where('kemu',$kemu)->where('username',$username)->find();
        return $info;
    }
    public function kemu_shijuan_select($xid){
        $info=db('shijuan')->where('xid',$xid)->where('kid','>',1)->select();
        return $info;
    }
    public function shijuan_duo_select($xid){
        $info=db('shijuan')->where('xid',$xid)->where('cid','>',1)->select();
        return $info;
    }
    public function shijuan_judge_select($xid){
        $info=db('shijuan')->where('xid',$xid)->where('vid','>',1)->select();
        return $info;
    }
    public function shijuan_zhuguan_select($xid){
        $info=db('shijuan')->where('xid',$xid)->where('qid','>',1)->select();
        return $info;
    }
    public function save_daan($m,$n,$mid,$kemu,$uid){
        $info=db('ti_daan')->insert(['huida'=>$m,'kid'=>$n,'mid'=>$mid,'kemu'=>$kemu,'uid'=>$uid]);
        return $info;
    }
    public function save_daan_duo($m,$n,$mid,$kemu,$uid){
        $info=db('ti_daan')->insert(['huida'=>$m,'cid'=>$n,'mid'=>$mid,'kemu'=>$kemu,'uid'=>$uid]);
        return $info;
    }
    public function save_daan_judge($m,$n,$mid,$kemu,$uid){
        $info=db('ti_daan')->insert(['huida'=>$m,'vid'=>$n,'mid'=>$mid,'kemu'=>$kemu,'uid'=>$uid]);
        return $info;
    }
    public function save_daan_object($m,$n,$mid,$kemu,$uid){
        $info=db('ti_daan')->insert(['huida'=>$m,'qid'=>$n,'mid'=>$mid,'kemu'=>$kemu,'uid'=>$uid]);
        return $info;
    }
    public function pg(){
        $info=db('ti_daan')->alias('a')->join('tiku w','a.kid=w.kid')->select();
        return $info;
    }
    public function pg_duo(){
        $info=db('ti_daan')->alias('a')->join('tiku_much w','a.cid=w.cid')->select();
        return $info;
    }
    public function pg_judge(){
        $info=db('ti_daan')->alias('a')->join('tiku_judge w','a.vid=w.vid')->select();
        return $info;
    }
    public function fenshu($kemu,$mid,$dan_score,$duo_score,$judge_score){
        $info=db('score')->insert(['kemu'=>$kemu,
            'mid'=>$mid,'dan_score'=>$dan_score,'duo_score'=>$duo_score,'judge_score'=>$judge_score]);
        return $info;
    }
    public function kc_select($kc_tea){
        $info=db('kc')->where('kc_tea',$kc_tea)->select();
        return $info;
    }
    public function fenshu_select($mid,$kemu){
        $info=db('score')->where('mid',$mid)->where('kemu',$kemu)->select();
        return $info;
    }
}

