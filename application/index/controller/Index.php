<?php
namespace app\index\controller;
use app\index\controller\Base;
class Index extends Base
{
    public function index()
    {
      $article = db('article as a')->join('cate b','a.cateid = b.id','left')->field('a.id,create_time,title,desc,pic,keyword,author,click,catename')->order('click','desc')->paginate(10);
      //友情链接
      $link = db('link')->select();
      $this->assign(array(
        'article'=>$article,
        'link'=>$link
      ));
      return view();
    }
    
}