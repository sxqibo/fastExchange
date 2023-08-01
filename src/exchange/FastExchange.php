<?php

namespace sxqibo\fastexchange\exchange;

use Exception;
use GuzzleHttp\Client;

final class FastExchange
{
    const HOST = 'https://jisuhuilv.market.alicloudapi.com';

    /**
     * 汇率转换接口
     */
    const CONVERT = '/exchange/convert';
    /**
     * 所有货币查询接口
     */
    const CURRENCY = '/exchange/currency';
    /**
     * 单个货币查询接口
     */
    const SINGLE = '/exchange/single';

    private $appcode = '';

    /**
     * 汇率转换接口
     *
     * @param string $from 要换算的单位（所有货币接口中获取）
     * @param string $amount 数量
     * @param string $to 换算后的单位（所有货币接口中获取）
     * @return string
     */
    public function getConvert(string $from, string $amount, string $to): string
    {
        if ((!isset($from) || empty($from))
            || (!isset($amount) || empty($amount))
            || (!isset($to) || empty($to))) {
            throw new Exception('要换算的单位、数量、换算后的单位 不能为空');
        }

        $query = [
            'from' => $from,
            'amount' => $amount,
            'to' => $to
        ];

        return $this->request($query, self::CONVERT);
    }

    /**
     * 所有货币查询接口
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->request([], self::CURRENCY);
    }

    /**
     * 单个货币查询接口
     *
     * @param string $currency 货币（所有货币查询接口中获取）
     * @return string
     */
    public function getSingle(string $currency): string
    {
        if (!isset($currency) || empty($currency)) {
            throw new Exception('货币 不能为空');
        }

        $query = ['currency' => $currency];

        return $this->request($query, self::SINGLE);
    }

    private function request($query, string $apiUri): string
    {
        $headers = [
            'Authorization' => 'APPCODE ' . $this->appcode
        ];

        $uri = http_build_query($query);

        $client   = new Client();
        $response = $client->request('GET', self::HOST . $apiUri . '?' . $uri, [
            'headers' => $headers
        ]);

        return (string)$response->getBody();
    }
}
