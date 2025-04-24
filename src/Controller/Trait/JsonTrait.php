<?php

namespace Raketa\BackendTestTask\Controller\Trait;

use Psr\Http\Message\ResponseInterface;
use Raketa\BackendTestTask\Controller\Response\JsonResponse;

trait JsonTrait
{

    public function jsonResponse(array $data, int $status = 200): ResponseInterface
    {
        $response = new JsonResponse();
        $response->getBody()->write(
            json_encode(
                $data,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            )
        );
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withStatus($status);
    }

}