<?php

declare(strict_types=1);

namespace Raketa\BackendTestTask\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Raketa\BackendTestTask\Controller\Trait\JsonTrait;
use Raketa\BackendTestTask\Repository\ProductRepository;
use Raketa\BackendTestTask\View\ProductsView;

readonly class GetProductsController extends AbstractController
{
    use JsonTrait;

    public function __construct(
        private ProductsView      $productsVew,
        private ProductRepository $productRepository
    )
    {
    }

    public function get(RequestInterface $request): ResponseInterface
    {
        return $this->jsonResponse(
            $this->productsVew->toArray(
                $this->productRepository->getByCategory(
                    $this->getRawRequest($request)['category']
                )
            ),
        );

    }
}
