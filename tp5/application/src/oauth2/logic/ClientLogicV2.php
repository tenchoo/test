<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2016-10-12
 * Time: 11:47
 */

namespace app\src\oauth2\logic;

use app\src\base\logic\BaseLogicV2;
use app\src\oauth2\model\Client;

class ClientLogicV2 extends BaseLogicV2
{

    /**
     * @return mixed
     */
    protected function _init() {
        $this->setModel(new Client);
    }

    /**
     * 获取密钥信息
     * @param $client_id
     * @return array
     */
    public function getClientSecret($client_id) {
        $info = $this->getInfo(['client_id' => $client_id]);
        if (empty($info['client_secret'])) {
            return returnErr(Llack('client_id'));
        }
        return returnSuc($info['client_secret']);
    }
}