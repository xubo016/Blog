<?php 
namespace app\index\controller;
use app\index\controller\Base;
class Tags extends Base
{
  public function index(){
    $map['keyword'] = ['like','%'.input('tageid').'%'];
    $artres = db('article as a')->join('cate b','a.cateid = b.id','left')->field('a.id,a.author,a.title,a.pic,a.create_time,a.desc,a.click,a.keyword,b.catename')->order('a.id','desc')->where($map)->paginate(5);
    $this->assign(array(
      'artres'=>$artres
    ));
    return view();
  }

}
?>