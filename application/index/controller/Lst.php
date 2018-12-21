<?php
namespace app\index\controller;
use app\index\controller\Base;
class Lst extends Base
{
  public function index(){
    $catename = db('cate')->field('catename')->find(input('cateid'));
    $artres = db('article')->order('id','desc')->where('cateid',input('cateid'))->paginate(5);
    $this->assign(array(
      'artres'=>$artres,
      'catename'=>$catename
    ));
    return view();
  }

}
?>