<?php

namespace Rendix2\Giphy;

use GuzzleHttp\Client;

class Giphy
{

    public function __construct(
        private readonly string $apiKey,
        private readonly Client $client,
    )
    {

    }

    public function search(string $expression, $limit = 50, $offset = 0)
    {
        $params = [
            'q' => urlencode($expression),
            'limit' => (int)$limit,
            'offset' => (int) $offset,
        ];

        return $this->request('search', $params);
    }

    public function getByID ($id) {
        $endpoint = "$id";
        return $this->request($endpoint, []);
    }

    public function getByIDs (array $ids) {
        $endpoint = 'gifs';
        $params = [
            'ids' => implode(',', $ids)
        ];
        return $this->request($endpoint, $params);
    }

    public function translate ($query) {
        $endpoint = 'translate';
        $params = [
            's' => urlencode($query)
        ];
        return $this->request($endpoint, $params);
    }

    public function random ($tag = null) {
        $endpoint = 'random';
        $params = [
            'tag' => urlencode($tag)
        ];
        return $this->request($endpoint, $params);
    }

    public function trending ($limit = 25) {
        $endpoint = 'trending';
        $params = [
            'limit' => (int) $limit
        ];
        return $this->request($endpoint, $params);
    }

    private function request(string $endPoint, array $params)
    {
        $params['api_key'] = $this->apiKey;

        $url = 'https://api.giphy.com/v1/gifs/' . $endPoint . '/?';
        $url .= http_build_query($params);

        return json_decode($this->client->request('GET', $url)->getBody()->getContents());
    }

}
