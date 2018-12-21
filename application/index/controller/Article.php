<?php
namespace app\index\controller;
use app\index\controller\Base;
class Article extends Base
{
  public function index(){
    $artid = input('artid');
    db('article')->where('id',$artid)->setInc('click');
    $article = db('article')->find($artid);
    $cate = db('cate')->field('catename')->find($article['cateid']);
    $this->assign(array(
      'article'=>$article,
      'cate'=>$cate
    ));
    return view();
  }
}

?>