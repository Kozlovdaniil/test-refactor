<?php

declare(strict_types=1);

namespace Raketa\BackendTestTask\Repository;

use Doctrine\DBAL\Connection;
use Raketa\BackendTestTask\Infrastructure\QueryBuilder\QueryBuilderInterface;
use Raketa\BackendTestTask\Repository\Entity\Product;

class ProductRepository
{

    public function __construct(private Connection $connection, private QueryBuilderInterface $queryBuilder)
    {
    }

    public function getByUuid(string $uuid): Product
    {
        $row = $this->connection->fetchOne(
            $this->queryBuilder
                ->select()
                ->from('products')
                ->where(["uuid = {$uuid}"])
        );

        if (empty($row)) {
            throw new Exception('Product not found');
        }

        return $this->make($row);
    }

    public function getByCategory(string $category): array
    {
        return array_map(
            static fn(array $row): Product => $this->make($row),
            $this->connection->fetchAllAssociative(
                $this->queryBuilder
                    ->select()
                    ->columns('id')
                    ->from('products')
                    ->andWhere(['is_active = 1', "category = {$category}"])
            )
        );
    }

    public function make(array $row): Product
    {
        return new Product(
            $row['id'],
            $row['uuid'],
            $row['is_active'],
            $row['category'],
            $row['name'],
            $row['description'],
            $row['thumbnail'],
            $row['price'],
        );
    }
}
