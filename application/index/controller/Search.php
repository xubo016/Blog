<?php
namespace app\index\controller;
use app\index\controller\Base;
class Search extends Base
{
  public function  index(){
    if(input('key')){
      $map['title'] = ['like','%'.input('key').'%'];
      $article = db('article as a')->join('cate b','a.cateid=b.id','left')->where($map)->field('a.id,a.author,a.title,a.pic,a.create_time,a.desc,a.click,a.keyword,b.catename')->paginate($listRows = 2, $simple = false, $config = [
        'query'=>array('key'=>input('key'))
      ]);
      
      if($article){
        $this->assign(array(
          'article'=>$article,
          'key'=>input('key'),
          
        ));
      }else{
        $this->assign(array(
          'article'=>'',
          'key'=>input('key')
        ));
      }
    }else{
      $this->assign(array(
        'article'=>'',
        'key'=>'暂无数据'
      ));
    }
    return view();
  }

}

?>