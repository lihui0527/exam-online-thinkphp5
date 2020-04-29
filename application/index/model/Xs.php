<?php
/**
 * Created by PhpStorm.
 * User: cmjj
 * Date: 2018/5/9
 * Time: 11:05
 */
namespace app\index\model;
use think\Model;
class Xs extends Model {

    public function zc($username,$password,$foname){
        $info=$this->insert(['username'=>$username,'password'=>md5($password),'headimg'=>$foname]);
        return $info;
    }
    public function xslb(){
        $info=db('xs')->order('mid desc')->select();
        return $info;
    }
    public function sc($mid){
        $info=db('xs')->where('mid',$mid)->delete();
        return $info;
    }
    public  function  bj($mid,$username,$foname){
        $info=db('xs')->where('mid',$mid)->update(['username'=>$username,'headimg'=>$foname]);
        return $info;

    }
    public function x($username,$password){
        $info=db('xs')->where('username',$username)->where('password',$password)->find();
        return $info;
    }
    public function xs_username($name){
        $info=db('xs')->where('username',$name)->select();
        return $info;
    }
//    public function tea_name($uid){
//        $info=db('tea')->where('username',$uid)->select();
//        return $info;
//    }
    public function xs_name($username){
        $info=db('kc')->where('kc_tea',$username)->select();
        return $info;
    }
}
