<?php

use GuzzleHttp\Client;

if (!function_exists('curl')) {
    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function curl(string $url, string $method = 'get', array $data = []): stdClass
    {
        $client = new Client();
        $field = strtoupper($method) === 'GET' ? 'query' : 'form_params';
        $options = [
            'http_errors' => false,
            $field => $data
        ];

        try {
            $response = $client->request($method, $url, $options);
            $result = json_decode($response->getBody()->getContents());
        } catch (Exception $exception) {
            $result = (object)['ok' => false];
        }
        return $result;
    }
}
