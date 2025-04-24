<?php

namespace Raketa\BackendTestTask\Infrastructure\QueryBuilder;

use Raketa\BackendTestTask\Infrastructure\QueryBuilder\MySql\Select;

interface QueryBuilderInterface
{
    public function select():Select;
}