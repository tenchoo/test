<?php
/**
 * Created by PhpStorm.
 * User: Gooraye
 * Date: 2016/10/26
 * Time: 9:50
 */

namespace app\test\controller;


use app\extend\BoyeService;

class Contract extends Ava{

    //房东选择租客
    public function selectRenter(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_selectRenter',
            ];
            $filter = [
                ['owner_uid'],
                ['renter_uid'],
                ['house_no'],
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_selectRenter');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['owner_uid','11', LL('need-mark owner_uid')],
                ['renter_uid', '8', LL('need-mark renter_uid')],
                ['house_no','HN3301001',LL('need-mark house_no')]

            ]);
            return $this->fetch('ava/test');
        }
    }

    //房东选择租客
    public function getParams(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_getParams',
            ];
            $filter = [
                ['subject'],
                ['contract_no']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_getParams');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['subject','0', LL('need-mark subject')],
                ['contract_no','CTR20161102165', LL('need-mark contract_no')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //房东/房客 填写合同
    public function write(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_write',
            ];
            $filter = [
                ['subject'],
                ['uid'],
                ['contract_no'],
                ['params']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_write');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid', '11', LL('need-mark uid')],
                ['contract_no','CTR20161026151', LL('need-mark contract_no')],
                ['params', '{"lesser":"小周"}', LL('need-mark params')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //房东/房客确认合同
    public function confirm(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_confirm',
            ];
            $filter = [
                ['uid'],
                ['contract_no'],
                ['aid']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_confirm');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid', '11', LL('need-mark uid')],
                ['contract_no','CTR20161026151', LL('need-mark contract_no')],
                ['aid','0',""]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //签约管理
    public function contractManage(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_contractManage',
            ];
            $filter = [
                ['uid'],
                ['sort']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_contractManage');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','11', LL('need-mark uid')],
                ['sort','0', LL('need-mark sort')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //签约详情
    public function detail(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_detail',
            ];
            $filter = [
                ['uid'],
                ['contract_no']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_detail');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','11', LL('need-mark uid')],
                ['contract_no','CTR20161026151', LL('need-mark contract_no')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //申请终止合同
    public function terminateApply(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_terminateApply',
            ];
            $filter = [
                ['uid'],
                ['contract_no'],
                ['apply_reason']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_terminateApply');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','98', LL('need-mark uid')],
                ['contract_no','CTR20161028161', LL('need-mark contract_no')],
                ['apply_reason','我不租了',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //通过终止合同申请
    public function passTerminate(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_passTerminate',
            ];
            $filter = [
                ['uid'],
                ['contract_no'],
                ['refuse_reason'],
                ['pass']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_passTerminate');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','98', LL('need-mark uid')],
                ['contract_no','CTR20161028161', LL('need-mark contract_no')],
                ['refuse_reason','不行',LL('need-mark')],
                ['pass','0',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }
    }

    //确认资产清单
    public function confirmFacility(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Contract_confirmFacility',
            ];
            $filter = [
                ['uid'],
                ['contract_no']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Contract_confirmFacility');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','0', LL('need-mark uid')],
                ['contract_no','CTR20161028161', LL('need-mark contract_no')]
            ]);
            return $this->fetch('ava/test');
        }
    }



}