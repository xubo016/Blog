<?php
namespace app\index\controller;
use think\Controller;
class Base extends Controller
{
  public function _initialize(){
    $this->nav();
  }
  /**
   * 引入导航文件
   */ 
  public function nav(){
    $navs = db('cate')->select();
    $this->assign('navs',$navs);
  }

  // 空操作
  public function _empty(){
    $this->redirect('index/index');
  }
}



?>