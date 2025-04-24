<?php

declare(strict_types = 1);

namespace Raketa\BackendTestTask\Infrastructure\QueryBuilder\MySql;

use Doctrine\DBAL\Connection;

/**
 * Примитивный QueryBuilder, просто для примера
 */
class QueryBuilder
{

    /**
     * @return Select
     */
    public function select(): Select
    {
        return new Select();
    }
}
