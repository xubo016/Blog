<?php
namespace app\index\controller;
use app\index\controller\Base;
class Article extends Base
{
  public function index(){
    $artid = input('artid');
    //浏览量
    db('article')->where('id',$artid)->setInc('click');
    //文章内容
    $article = db('article')->find($artid);
    //作者
    $cate = db('cate')->field('catename')->find($article['cateid']);
    //上一条
    $prev = db('article')->where('cateid','=',$article['cateid'])->where('id','<',$artid)->order('id','desc')->limit(1)->value('id');
    //下一条
    $next = db('article')->where('cateid','=',$article['cateid'])->where('id','>',$artid)->order('id','asc')->limit(1)->value('id');
    //相关文章
    $keyword = $article['keyword'];
    $arrkey = explode(',',$keyword);
    $array = array();
    foreach($arrkey as $k => $v){
      $map['keyword'] = ['like','%'.$v.'%'];
      $arr = db('article')->where($map)->order('id','desc')->field('id,title,create_time')->limit(10)->select();
      $array = array_merge($array,$arr);
    }
    $array = arr_unique($array);
    $this->assign(array(
      'article'=>$article,
      'cate'=>$cate,
      'prev'=>$prev,
      'next'=>$next,
      'array'=>$array
    ));
    return view();
  }
}

?>