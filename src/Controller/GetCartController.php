<?php

declare(strict_types=1);

namespace Raketa\BackendTestTask\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Raketa\BackendTestTask\Controller\Trait\JsonTrait;
use Raketa\BackendTestTask\Repository\CartManager;
use Raketa\BackendTestTask\View\CartView;

readonly class GetCartController extends AbstractController
{
    use JsonTrait;

    public function __construct(
        public CartView    $cartView,
        public CartManager $cartManager
    )
    {
    }

    public function get(RequestInterface $request): ResponseInterface
    {
        $cart = $this->cartManager->getCart();

        if (!$cart) {
            return $this->jsonResponse(['message' => 'Cart not found'], 404);
        }

        return $this->jsonResponse($this->cartView->toArray($cart));
    }
}
