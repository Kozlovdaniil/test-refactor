<?php

namespace Raketa\BackendTestTask\Service;

use Raketa\BackendTestTask\Domain\Cart;
use Raketa\BackendTestTask\Domain\CartItem;
use Raketa\BackendTestTask\Repository\CartManager;
use Raketa\BackendTestTask\Repository\ProductRepository;
use Ramsey\Uuid\Uuid;

class CartService
{
    public function __construct(
        private ProductRepository $productRepository,
        private CartManager $cartManager
    )
    {
    }
    public function addToCart(string $productUUid, int $quantity): Cart
    {

        $product = $this->productRepository->getByUuid($productUUid);

        $cart = $this->cartManager->getCart();
        $cart->addItem(new CartItem(
            Uuid::uuid4()->toString(),
            $product->getUuid(),
            $product->getPrice(),
            $quantity,
        ));

        return $cart;

    }
}