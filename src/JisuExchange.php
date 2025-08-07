<?php

namespace Sxqibo\FastExchange;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class JisuExchange
{
    private $appCode;
    private $client;

    public function __construct($appCode)
    {
        $this->appCode = $appCode;
        $this->client = new Client([
            'base_uri' => 'https://jisuhuilv.market.alicloudapi.com',
            'timeout' => 30,
        ]);
    }

    /**
     * 货币转换
     *
     * @param string $from
     * @param string $amount
     * @param string $to
     * @return array
     * @throws GuzzleException
     */
    public function getConvert(string $from, string $amount, string $to): array
    {
        $params = [
            'from' => $from,
            'amount' => $amount,
            'to' => $to
        ];

        return $this->request($params, '/exchange/convert');
    }

    /**
     * 获取货币列表
     *
     * @return array
     * @throws GuzzleException
     */
    public function getCurrencyList(): array
    {
        return $this->request([], '/exchange/currency');
    }

    /**
     * 获取汇率
     *
     * @param string $from
     * @param string $to
     * @return array
     * @throws GuzzleException
     */
    public function getRate(string $from, string $to): array
    {
        $params = [
            'from' => $from,
            'to' => $to
        ];

        return $this->request($params, '/exchange/rate');
    }

    /**
     * 发起请求
     *
     * @param array $params
     * @param string $uri
     * @return array
     * @throws GuzzleException
     */
    private function request(array $params, string $uri): array
    {
        $options = [
            'headers' => [
                'Authorization' => 'APPCODE ' . $this->appCode,
                'Content-Type' => 'application/json',
            ]
        ];

        if (!empty($params)) {
            $options['query'] = $params;
        }

        $response = $this->client->request('GET', $uri, $options);
        $contents = $response->getBody()->getContents();

        return json_decode($contents, true);
    }
}