<?php
namespace app\index\controller;
use app\index\controller\Base;
class Lst extends Base
{
  public function index(){
    $artres = db('article')->order('id','desc')->where('cateid',input('cateid'))->paginate(5);
    $this->assign('artres',$artres);
    return view();
  }

}
?>