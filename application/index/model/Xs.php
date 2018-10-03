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
}
