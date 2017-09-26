<?php
/**
 * @Author   : 周舟
 * @Email    : hzboye010@163.com
 * @DateTime : 2016-10-11 15:01:45
 * @Description : house api test
 */
namespace app\test\controller;

use app\extend\BoyeService;

class House extends Ava{
    //房源预修改
    public function preEdit(){
        if(IS_AJAX){
            $data = [
               'api_ver' => $this->api_ver,
               'type'    => 'BY_House_preEdit',
               'uid'     => input('post.uid',''),
               'house_no'=> input('post.house_no',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_preEdit');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',11,LL('need-mark uid')],
                ['house_no','HN33010062',LL('need-mark house_no')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源认证删除
    public function verifyDel(){
        if(IS_AJAX){
            $data = [
               'api_ver' => $this->api_ver,
               'type'    => 'AM_House_verifyDel',
               'aid'     => input('post.aid',''),
               'house_no'=> input('post.house_no',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','AM_House_verifyDel');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['aid',11,LL('need-mark operator-UID')],
                ['house_no','HN33010062',LL('need-mark house_no')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源认证申请
    public function verifyApply(){
        if(IS_AJAX){
            $data = [
               'api_ver' => $this->api_ver,
               'type'    => 'BY_House_verifyApply',
               'uid'     => input('post.uid',''),
               'house_no'=> input('post.house_no',''),
               'property'=> input('post.property',''),
               'address' => input('post.address',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_verifyApply');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',97,LL('need-mark operator-UID')],
                ['house_no','HN33010084',LL('need-mark house_no')],
                ['property','330100',LL('need-mark house_property_number')],
                ['address','杭州天德池浴场',LL('need-mark house_detail')]
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源小区搜索
    public function searchArea(){
        if(IS_AJAX){
            $data = [
               'api_ver' => $this->api_ver,
               'type'    => 'BY_House_searchArea',
               'uid'     => input('post.uid',''),
               'kword'   => input('post.kword',''),
               'city'    => input('post.city',''),
               'max'     => input('post.max',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_searchArea');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',11,LL('need-mark operator-UID')],
                ['kword','翠苑',LL('need-mark search_word')],
                ['city','330100',LL('need-mark city_code')],
                ['max',10,LL('max_count')]
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源批量上架
    public function onshelf(){
        if(IS_AJAX){
            $data = [
               'api_ver'  => $this->api_ver,
               'type'     => 'BY_House_onshelf',
               'uid'      => input('post.uid',''),
               'house_no' => input('post.house_no',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_onshelf');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',11,LL('need-mark operator-UID')],
                ['house_no','HN33010081',LL('need-mark house-no')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源批量下架
    public function offshelf(){
        if(IS_AJAX){
            $data = [
               'api_ver'  => $this->api_ver,
               'type'     => 'BY_House_offshelf',
               'uid'      => input('post.uid',''),
               'house_no' => input('post.house_no',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_offshelf');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','11',LL('need-mark operator-UID')],
                ['house_no','1',LL('need-mark house-no')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源批量删除
    public function del(){
        if(IS_AJAX){
            $data = [
               'api_ver'  => $this->api_ver,
               'type'     => 'BY_House_del',
               'uid'      => input('post.uid',''),
               'house_no' => input('post.house_no',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_del');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','11',LL('need-mark operator-UID')],
                ['house_no','1',LL('need-mark house-no')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源认证申请列表
    public function verifyList(){
        if(IS_AJAX){
            $data = [
               'api_ver' => $this->api_ver,
               'type'    => 'AM_House_verifyList',
               'aid'     => input('post.aid',''),
               'city'    => input('post.city',''),
               'current_page' => input('post.current_page',''),
               'per_page'     => input('post.per_page',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','AM_House_verifyList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['aid','',LL('need-mark admin_login_uid')],
                ['current_page','1',L('page-number')],
                ['city','330100',LL('need-mark city-code')],
                ['per_page','10',L('page-size')]
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-房源认证审核
    public function verify(){
        if(IS_AJAX){
            $data = [
               'api_ver'  => $this->api_ver,
               'type'     => 'AM_House_verify',
               'aid'      => input('post.aid',''),
               'house_no' => input('post.house_no',''),
               'pass'     => input('post.pass',''),
               'msg'      => input('post.msg',''),
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','AM_House_verify');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['aid','',LL('need-mark admin_login_uid')],
                ['house_no','HN33010081',LL('need-mark house-code')],
                ['pass','1',LL('need-mark house-code')],
                ['msg','not-pass-msg',L('not-pass-message')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //get area list - 就插了几条数据
    public function getAreaList(){
        if(IS_AJAX){
            $data = [
                'api_ver'   => $this->api_ver,
                'type'      => 'BY_House_getAreaList',
                'area_code' => input('post.area_code',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_getAreaList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['area_code','330110',L('area-code')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //get house dtree list
    public function getDtreeList(){
        if(IS_AJAX){
            $data = [
                'api_ver'   => $this->api_ver,
                'type'      => 'BY_House_getDtreeList',
                'city_code' => input('post.city_code',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_getDtreeList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['city_code','',L('city-code')],
            ]);
            return $this->fetch('ava/test');
        }
    }

    //test house-add and house-edit
    public function add(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_add',
                'house_no'     => input('post.house_no',''),
                'uid'          => input('post.uid',''),
                'imgs'         => input('post.imgs',''),
                'imgs_title'   => input('post.imgs_title',''),
                'community_code' => input('post.community_code',''),
                'rent_type'     => input('post.rent_type',''),
                'contact_phone' => input('post.contact_phone',''),
                'contact_name'  => input('post.contact_name',''),
                'rent'          => input('post.rent',''),
                'deposit'       => input('post.deposit',''),
                'size'          => input('post.size',''),
                'unit'          => input('post.unit',''),
                'house_floor'   => input('post.house_floor',''),
                'floors'        => input('post.floors',''),
                'house_decoration' => input('post.house_decoration',''),
                'house_pay'     => input('post.house_pay',''),
                'house_feature' => input('post.house_feature',''),
                'house_device'  => input('post.house_device',''),
                'house_dir'     => input('post.house_dir',''),
                'abstract'      => input('post.abstract',''),
                'transportation' => input('post.transportation',''),
                'education'      => input('post.education',''),
                'notice'        => input('post.notice',''),
                'title'         => input('post.title',''),
                // 'address'       => input('post.address',''),
                'onshelf'       => input('post.onshelf',''),
                'entrust_money' => input('post.entrust_money',''),
                'front_money'   => input('post.front_money',''),
                'service_money' => input('post.service_money',''),
                'house_brand'   => input('post.house_brand',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_add');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['house_no','',L('house_no')],
                ['uid',11,LL('need-mark uid')],
                ['imgs','111,112',LL('need-mark imgs multi-,')],
                ['imgs_title','title1,title2',LL('imgs_title multi-,')],
                ['community_code','33010603',LL('need-mark community-code')],
                ['rent_type',1,LL('need-mark rent-type')],//-6234
                ['contact_phone',17195862186,LL('need-mark linkman-phone')],
                ['contact_name','rainbow',LL('need-mark linkman-name')],
                //second
                ['rent',6666,LL('need-mark rent-money')],
                ['deposit',666,L('deposit-money')],
                ['size',66,LL('need-mark house-size')],
                ['unit','1,0,0',LL('need-mark house-units')],
                ['house_floor',8,LL('need-mark floor')],
                ['floors',88,LL('need-mark floors')],
                ['house_decoration',6201,LL('need-mark house-decoration')], //-6205
                ['house_pay','6225,6230',LL('need-mark pay-type multi-,')],
                ['house_feature','6241,6246',LL('need-mark house-feature multi-,')],
                ['house_device','13,23',LL('need-mark house-device multi-,')],
                ['house_dir',6194,LL('need-mark house-orientation')],
                ['abstract','',L('house-detail')],
                ['transportation','',L('house-transportation')],
                ['education','',L('house-education')],
                ['notice','',L('house-notice')],
                //forget
                ['title','',L('title')],
                // ['address','乔司中学',LL('need-mark address')],
                ['onshelf',1,LL('need-mark onshelf')],
                ['entrust_money','',L('entrust-money')],
                ['front_money','',L('front-money')],
                ['service_money','',L('service-money')],
                ['house_brand','',L('house-brand')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-house-query-page
    public function query(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_query',
            ];
            $filter = [
                ['uid'],
                ['city'],
                ['search_text'],
                ['area_or_zone'],
                ['rental'],
                ['acreage'],
                ['house_type'],
                ['rent_type'],
                ['decoration'],
                ['orientation'],
                ['floor'],
                ['source'],
                ['house_tag'],
                ['house_verify_tag'],
                ['order'],
                ['per_page'],
                ['current_page']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_query');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','178',LL('uid')],
                ['city','330100',LL('need-mark city_code')],
                ['search_text','',LL('search_text canEmpty')],
                ['area_or_zone','',LL('area_or_zone canEmpty')],
                ['rental','',LL('rental canEmpty')],
                ['acreage','',LL('acreage canEmpty')],
                ['house_type','',LL('house_type canEmpty')],
                ['rent_type','',LL('rent_type canEmpty')],
                ['decoration','',LL('decoration canEmpty')],
                ['orientation','',LL('orientation canEmpty')],
                ['floor','',LL('floor canEmpty')],
                ['source','',LL('house_source canEmpty')],
                ['house_tag','',LL('house_tag canEmpty')],
                ['house_verify_tag', '认证房源',LL('house_verify_tag canEmpty')],
                ['order','',LL('order canEmpty')],
                ['per_page','',LL('pageSize canEmpty')],
                ['current_page','',LL('currentPage canEmpty')]
            ]);
            return $this->fetch('ava/test');
        }
    }
    //test-house-detail-show
    public function detail(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_detail',
            ];
            $filter = [
                ['house_no'],
                ['uid']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_detail');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['house_no','HN3301001',LL('need-mark house_no')],
                ['uid','8', LL('uid')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //test-house-query-params
    public function getQueryParams(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type' => 'BY_House_getQueryParams',
                'city' => input('city')
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_getQueryParams');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['city','330100',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-hotKey
    public function hotKey(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_hotKey',
            ];
            $filter = [
                ['city'],
                ['max']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_hotKey');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['city','330100',LL('need-mark')],
                ['max','10',LL('max')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-update_time
    public function updateTime(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_updateTime',
            ];
            $filter = [
                ['uid'],
                ['house_no']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_updateTime');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','11',LL('need-mark uid')],
                ['house_no','HN3301001',LL('need-mark house_no')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //房东发布列表
    public function lend(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type' => 'BY_House_lend',
                'uid' => input('uid')
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_lend');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','1',LL('need-mark UID')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //test-house-community_rate_chart
    public function communityRateChart(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_communityRateChart',
            ];
            $filter = [
                ['community_id'],
                ['chart_type'],
                ['which'],
                ['house_room']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_communityRateChart');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['community_id',0,LL('need-mark community_id')],
                ['chart_type','month',LL('need-mark chart_type')],
                ['which',date('m'),LL('which')],
                ['house_room','',LL('house_room')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-wanted
    public function wanted(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_wanted',
            ];
            $filter = [
                ['uid'],
                ['city'],
                ['area'],
                ['area_zone'],
                ['rent'],
                ['house_type'],
                ['latest_check'],
                ['contact'],
                ['mobile'],
                ['is_open'],
                ['is_push'],
                ['is_entrust'],
                ['description']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_wanted');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',8,LL('need-mark')],
                ['city','330100',LL('need-mark')],
                ['area','330102',LL('need-mark')],
                ['area_zone','330102b3',LL('need-mark')],
                ['rent','0',LL('need-mark')],
                ['house_type','0',LL('need-mark')],
                ['latest_check',NOW_TIME,LL('need-mark')],
                ['contact','小周',LL('need-mark')],
                ['mobile','171111111',LL('need-mark')],
                ['is_open',0,LL('need-mark')],
                ['is_push',0,LL('need-mark')],
                ['is_entrust',0,LL('need-mark')],
                ['description','我要便宜的',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-update-wanted
    public function updateWanted(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_updateWanted',
            ];
            $filter = [
                ['uid'],
                ['wid'],
                ['area'],
                ['area_zone'],
                ['rent'],
                ['house_type'],
                ['latest_check'],
                ['contact'],
                ['mobile'],
                ['is_open'],
                ['is_push'],
                ['is_entrust'],
                ['description']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_updateWanted');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',8,LL('need-mark')],
                ['wid','1',LL('need-mark')],
                ['area','330102',LL('canEmpty')],
                ['area_zone','330102b3',LL('canEmpty')],
                ['rent','0',LL('canEmpty')],
                ['house_type','0',LL('canEmpty')],
                ['latest_check',NOW_TIME,LL('canEmpty')],
                ['contact','小周',LL('canEmpty')],
                ['mobile','171111111',LL('canEmpty')],
                ['is_open',0,LL('canEmpty')],
                ['is_push',0,LL('canEmpty')],
                ['is_entrust',0,LL('canEmpty')],
                ['description','我要便宜的',LL('canEmpty')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-wanted-list
    public function wantedList(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_wantedList',
            ];
            $filter = [
                ['uid'],
                ['search_text'],
                ['status'],
                ['per_page'],
                ['current_page']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_wantedList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',8,LL('need-mark')],
                ['search_text','',LL('search_text canEmpty')],
                ['status',2,LL('status')],
                ['per_page','',LL('pageSize canEmpty')],
                ['current_page','',LL('currentPage canEmpty')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-wanted-list
    public function deleteWanted(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_deleteWanted',
            ];
            $filter = [
                ['uid'],
                ['wid']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_wantedList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',8,LL('need-mark')],
                ['wid',1,LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //test-house-publish-manage
    public function publishManage(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_House_publishManage',
            ];
            $filter = [
                'uid',
                'city',
                'area',
                'area_zone',
                'house_room',
                'house_hall',
                'down_time',
                'status',
                'key_words',
                'order',
                'inter_rent',
                'per_page',
                'current_page'
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_House_wantedList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid',8,LL('need-mark')],
                ['city',330100,''],
                ['area','',''],
                ['house_room','',''],
                ['house_hall','',''],
                ['down_time','',''],
                ['status',1,''],
                ['key_words','',''],
                ['order','',''],
                ['inter_rent','',''],
                ['per_page','10',''],
                ['current_page','1',''],
            ]);
            return $this->fetch('ava/test');
        }

    }

}