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
    /*  public function dl_2(){
          $where['username']->
      }*/
}

