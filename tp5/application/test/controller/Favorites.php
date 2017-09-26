<?php
/**
 * 张健 hzboye013@163.com
 * addby sublime snippets
 * File Test 附件测试类
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Favorites extends Ava {
    //收藏

    public function add(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Favorites_add',
                'uid'          => input('post.uid',''),
                'f_type'         => input('post.type','1'),
                'favorite_id' => input('post.favorite_id',''),
                'status'    =>input('post.status','1'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_favorites_add');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',14,LL('need-mark uid')],
                ['f_type','1',LL('need-mark 收藏类型，1：房源，2：帖子,')],
                ['favorite_id','HN3301008',LL('need-mark 房源传房源编号;帖子传Id,')],
                ['status','1',LL('need-mark 1：添加收藏，0：删除收藏,')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //收藏列表
    public function show(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Favorites_show',
                'uid'          => input('post.uid',''),
                'status'          => input('post.status',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_favorites_show');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',14,LL('need-mark uid')],
                ['status',1,LL('need-mark status 1房源')],
            ]);
            return $this->fetch('ava/test');
        }

    }



}