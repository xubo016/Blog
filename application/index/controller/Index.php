<?php
namespace app\index\controller;
use app\index\controller\Base;
class Index extends Base
{
    public function index()
    {
        return view();
    }
    // 空操作
    public function _empty(){
      $this->redirect('index/index');
    }
    
}