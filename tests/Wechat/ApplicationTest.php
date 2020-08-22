<?php

namespace DoperPayment\Tests\Wechat;

use Doper\Payment\Tests\TestCase;
use Doper\Payment\Wechat\Application as wechatApp;

class ApplicationTest extends TestCase
{
    public function testScanOrder()
    {
        $config = [
            'agentNum' => 'A10000000000000000',
            'mchId' => 'C00000000000000000',
            'packSign' => [
                'url' => 'http://dzsd.bctpay.com/util/packSign',
            ],
            'payGateway' => [
                'url' => 'https://dzsd.klb.cn/dzsd/pay/gateway',
            ]
        ];
        $wechatApp = new wechatApp($config);
        $params = [
            'service_type' => 'WECHAT_JSAPI_OAUTH',
            'out_trade_no' => 'BCT' . date('YmdHis') . time(),
            'body' => 'mini',
            'total_fee' => (string)1,
            'spbill_create_ip' => '127.0.0.1',
            'notify_url' => 'http://corn-mini.bctpay.com/v1/Pay/WechatCallback111',
            'openid' => 'oIXCY5Ow3HSgT5OBTY2FvLnu6ivU',
            'appid' => 'wx3d2579ab45ddd961',
            'trade_type' => 'JSAPI',
            'nonce_str' => date('YmdHis') . date('His'),
        ];
        $result = $wechatApp->createScanOrder($params);
        $this->assertSame('SUCCESS', $result['return_code']);
    }

    public function testMiniProgramOrder()
    {
        $config = [
            'agentNum' => 'A10000000000000000',
            'mchId' => 'C00000000000000000',
            'packSign' => [
                'url' => 'http://dzsd.bctpay.com/util/packSign',
            ],
            'payGateway' => [
                'url' => 'https://dzsd.klb.cn/dzsd/pay/gateway',
            ]
        ];
        $wechatApp = new wechatApp($config);
        $params = [
            'service_type' => 'WECHAT_JSAPI_OAUTH',
            'out_trade_no' => 'BCT' . date('YmdHis') . time(),
            'body' => 'mini',
            'total_fee' => (string)1,
            'spbill_create_ip' => '127.0.0.1',
            'notify_url' => 'http://corn-mini.bctpay.com/v1/Pay/WechatCallback111',
            'openid' => 'oIXCY5Ow3HSgT5OBTY2FvLnu6ivU',
            'appid' => 'wx3d2579ab45ddd961',
            'trade_type' => 'JSAPI',
            'nonce_str' => date('YmdHis') . date('His'),
        ];
        $result = $wechatApp->createMiniProgramOrder($params);
        $this->assertSame('SUCCESS', $result['return_code']);
    }
}
