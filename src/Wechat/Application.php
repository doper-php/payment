<?php

namespace Doper\Payment\Wechat;

class Application
{
    private $config = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /** 扫码下单
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function createScanOrder(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_SCAN';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /** 条码下单
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function createMicroOrder(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_MICRO';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /** 公众号下单
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function createOfficialAccountOrder(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_JSAPI_OAUTH';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /** 小程序下单
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function createMiniProgramOrder(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_JSAPI_OAUTH';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /** 订单查询
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function orderQuery(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_ORDERQUERY';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function orderClose(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_CLOSE';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }


    /** 订单撤销
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function orderRevoke(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_REVOKE';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /** 订单退款
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function orderRefund(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_REFUND';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /** 退款查询
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function orderRefundQuery(array $params)
    {
        try {
            // 组装参数
            $params['service_type'] = 'WECHAT_REFUNDQUERY';
            $params['agent_num'] = $this->config['agentNum'];
            $params['mch_id'] = $this->config['mchId'];
            $params['sign'] = $this->signContract($params);
            $requestUrl = $this->config['payGateway']['url'];

            // 发请求
            $responseData = $this->postData($requestUrl, $params);
            return $responseData;
        } catch (\Exception $e) {
            throw $e;
        }
    }


    /** 签名接口
     * @param $data
     * @return mixed
     */
    public function signContract(array $data)
    {
        try {
            // 1.准备数据
            $url = $this->config['packSign']['url'];

            // 2.远程请求,记录日志
            $responseData = $this->postData($url, $data);

            // 3.返回数据
            $sign = $responseData['sign'] ?? '' ;
            return $sign;
        } catch (\Throwable $e) {
        }
    }


    /** post 提交
     * @param $url      请求地址
     * @param $request  请求参数
     * @return mixed    返回处理结果
     */
    public function postData($url, $request)
    {
        $data = json_encode($request);
        $headerArray = array("Content-type:application/json;charset='utf-8'", "Accept:application/json");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if (substr($url, 0, 5) === 'https') {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  // 信任任何证书
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 检查证书中是否设置域名
        }
        $output = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($output, true);
        return $response;
    }
}
