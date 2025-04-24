<?php

namespace Raketa\BackendTestTask\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Raketa\BackendTestTask\Controller\Trait\JsonTrait;
use Raketa\BackendTestTask\Service\CartService;
use Raketa\BackendTestTask\View\CartView;

readonly class AddToCartController extends AbstractController
{
    use JsonTrait;

    public function __construct(
        private CartView    $cartView,
        private CartService $cartService
    )
    {
    }

    public function get(RequestInterface $request): ResponseInterface
    {
        $rawRequest = $this->getRawRequest($request);
        $cart = $this->cartService->addToCart(
                $rawRequest['productUUid'],
                $rawRequest['quantity']
            );

        return $this->jsonResponse([
            'status' => 'success',
            'cart'   => $this->cartView->toArray($cart)
        ]);
    }
}
