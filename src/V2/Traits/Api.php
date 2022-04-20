<?php

namespace PHPShopee\V2\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait Api
{
    public $url;

    public $uri;

    protected $queryString;

    protected $body;

    protected $requestMethod = 'post';

    protected $timeout = 60;

    protected $times = 3;

    protected $sleep = 100;

    protected $httpClient;

    protected $response;

    protected array $headers = [
        'Content-type' => 'application/json',
        'Accept'       => 'application/json',
    ];

    protected function generateUrl(): static
    {
        $this->uri = $this->parentResource . $this->childResources;
        $this->url = $this->resourceUrl;
        return $this;
    }

    public function setHttpClient(): static
    {
        $this->httpClient = Http::timeout($this->timeout)->retry($this->times, $this->sleep);
        return $this;
    }

    public function setTimeout($timeout = 60): static
    {
        $this->timeout = $timeout;
        $this->httpClient->timeout($this->timeout);
        return $this;
    }

    public function setRetry(int $times, int $sleep = 0): static
    {
        $this->times = $times;
        $this->sleep = $sleep;
        $this->httpClient->retry($times, $sleep);
        return $this;
    }

    public function httpClient(): PendingRequest
    {
        return $this->httpClient;
    }

    /**
     * @Author: hwj
     * @DateTime: 2022/4/20 17:48
     * @return array|mixed
     * @throws RequestException
     */
    public function post()
    {
        return $this->setRequestMethod('post')->run();
    }

    /**
     * @Author: hwj
     * @DateTime: 2022/4/20 17:49
     * @return array|mixed
     * @throws RequestException
     */
    public function get()
    {
        return $this->setRequestMethod('get')->run();
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): Response
    {
        return $this->response = $response;
    }

    /**
     * @Author: hwj
     * @DateTime: 2022/4/20 17:49
     * @return array|mixed
     * @throws RequestException\
     */
    public function run()
    {
        $this->generateUrl();
        $resource = sprintf('%s%s', $this->url, $this->uri);
        $response = match ($this->requestMethod) {
            'get' => $this->httpClient()->get($resource, $this->queryString ?? []),
            'post' => $this->httpClient()->post($resource),
        };
        $this->setResponse($response);
        $response->throw();
        return $response->json();
    }

    protected function formatBody(): string
    {
        if ($this->requestMethod != 'post' || empty($this->body)) {
            return '';
        }

        return is_array($this->body) ? json_encode($this->body) : $this->body;
    }

    public function setRequestMethod($requestMethod): static
    {
        $this->requestMethod = $requestMethod;
        return $this;
    }

    public function withBody(mixed $body, $contentType = 'application/json'): static
    {
        $this->body = $body;
        $this->httpClient()->withBody($this->formatBody(), $contentType);
        return $this;
    }

    public function withQueryString(array $queryString): static
    {
        $this->queryString  = $queryString;
        return $this;
    }

    public function withHeaders(mixed $headers): static
    {
        $this->headers = array_merge($this->headers, $headers);
        $this->httpClient()->withHeaders($this->headers);
        return $this;
    }
}
