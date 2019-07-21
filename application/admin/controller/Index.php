<?php
namespace app\admin\controller;

use think\Db;

class Index extends Base
{
    public function index($pid = 0,$id = 0)
    {
        //导航信息
        $data['navigator'] = Db::table("web_navigator")
                      ->field("id,name,display_name")
                      ->where([
                          "is_show"   => 1,
                          "parent_id" => 0,
                          "is_delete" => 0
                      ])
                      ->order('sort','desc')
                      ->select();
        $data['leftNavigator'] = [];
        if($pid){
            $data['leftNavigator'] = Db::table("web_navigator")
                ->field("id,name,display_name")
                ->where([
                    "is_show"   => 1,
                    "parent_id" => $pid,
                    "is_delete" => 0
                ])
                ->order('sort','desc')
                ->select();
        }

        $data['pid'] = $pid;
        $data['id']  = $id;
        return view("index",$data);
    }
}
