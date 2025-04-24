<?php

namespace Raketa\BackendTestTask\Controller;
use Psr\Http\Message\RequestInterface;

/**
 * Общие для всех контроллеров методы
 */
readonly class AbstractController
{
    public function getRawRequest(RequestInterface $request, string $key): array
    {
        return json_decode($request->getBody()->getContents(), true);
    }
}