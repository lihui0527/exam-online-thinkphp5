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
}