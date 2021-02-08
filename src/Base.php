<?php

namespace Challenge;

use GuzzleHttp\Client;

class Base
{
    public $client;

    protected string $endpoint;
    protected array $results = [];
    protected string $ch;

    /**
     * __construct.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://rickandmortyapi.com/api/',
            'verify' => false
        ]);

        $this->endpoint = strtolower($this->get_class_name());
    }

    /**
     * counter.
     *
     * @return int
     */
    public function getCount(string $ch) : int
    {
        $page = 1;
        $totalPages = $page;
        $results = [];
        $count = 0;
        while ($page <= $totalPages) {
            $response = $this->client->request('GET', $this->getEndpoint(), [
                'query' => ['page' => $page],
                'allow_redirects' => [
                    'max' => 10,
                    'strict' => false,
                    'referer' => false,
                    'protocols' => ['http', 'https'],
                    'track_redirects' => false
                ]
            ]);
            $response = json_decode($response->getBody(), true);
            foreach ($response['results'] as $result) {
                $results[] = $result;
                $count += substr_count($result['name'], $ch);
            }
            $totalPages = $response['info']['pages'];
            $page++;
        }
        $this->results = $results;
        return $count;
    }

    /**
     * setEndpoint.
     *
     * @param  string $endpoint
     *
     * @return self
     */
    public function setEndpoint(string $endpoint) : self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * getEndpoint.
     *
     * @return string
     */
    public function getEndpoint() : string
    {
        return $this->endpoint;
    }

    /**
     * get_class_name.
     *
     * @param  string $classname
     *
     * @return string
     */
    public function get_class_name(string $classname = null) : string
    {
        $classname = $classname ?? get_class($this);
        if ($pos = strrpos($classname, '\\')) {
            return substr($classname, $pos + 1);
        }
        return $pos;
    }

    /**
     * find.
     *
     * @param  int $page
     *
     * @return array
     */
    public static function find(int $page = 1) : array
    {
        $totalPages = $page;
        $class = new static();
        $results = [];
        while ($page <= $totalPages) {
            $url = $class->getEndpoint();
            $response = $class->client->request('GET', $url, [
                'query' => ['page' => $page]
            ]);
            $response = json_decode($response->getBody(), true);
            foreach ($response['results'] as $result) {
                $results[] = $result;
            }
            $totalPages = $response['info']['pages'];
            $page++;
        }
        return $results;
    }

    /**
     * findById.
     *
     * @param  array $id
     *
     * @return array
     */
    public static function findById(array $id = []) : array
    {
        $class = new static();
        $id = implode(',', $id);
        $url = $id ? "{$class->getEndpoint()}/{$id}" : "{$class->getEndpoint()}";
        $response = $class->client->request('GET', $url);
        $response = json_decode($response->getBody(), true);
        return $response;
    }

    /**
     * getResults.
     *
     * @return array
     */
    public function getResults() : array
    {
        return $this->results;
    }
}
