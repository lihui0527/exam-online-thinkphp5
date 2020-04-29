<?php
/**
 * Created by PhpStorm.
 * User: cmjj
 * Date: 2018/5/9
 * Time: 11:05
 */
namespace app\index\model;
use think\Model;
class Kc extends Model
{
    public function zc($kc_name,$kc_tea,$kc_student,$kc_describe,$kc_starttime){
        $info=db('kc')->insert(['kc_name'=>$kc_name,'kc_tea'=>$kc_tea,'kc_student'=>$kc_student,'kc_describe'=>$kc_describe,'kc_starttime'=>$kc_starttime,'kc_addtime'=>time()]);
        return $info;
    }
    public function kclb(){
        $info=db('kc')->order('id desc')->paginate(2);
        return $info;
    }
    public function kclb_1($username){
        $info=db('kc')->where('kc_tea',$username)->select();
        return $info;
    }
    public function sc($id){
        $info=db('kc')->where('id',$id)->delete();
        return $info;
    }
    public  function kc_bj($id,$kc_name,$kc_tea,$kc_student,$kc_describe,$kc_starttime){
        $info=db('kc')->where('id',$id)->update(['kc_name'=>$kc_name,'kc_tea'=>$kc_tea,'kc_student'=>$kc_student,'kc_describe'=>$kc_describe,'kc_starttime'=>$kc_starttime,'kc_addtime'=>time()]);
        return $info;

    }
    public function kemu_select($username){
        $info=db('kc')->where('kc_tea',$username)->select();
        return $info;
    }
    public function xs(){
        $info=db('xs')->select();
        return $info;
    }
    public function js(){
        $info=db('tea')->select();
        return $info;
    }
}