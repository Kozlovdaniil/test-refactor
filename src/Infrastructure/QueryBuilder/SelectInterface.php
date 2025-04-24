<?php

namespace Raketa\BackendTestTask\Infrastructure\QueryBuilder;

use Raketa\BackendTestTask\Infrastructure\QueryBuilder\MySql\Select;

interface SelectInterface
{
    public function from(string $from): self;

    public function columns(string $columns): self;

    public function where(array $where): self;

    public function andWhere(array $where): self;

    public function orWhere(array $where): self;

    public function limit(int $limit): self;

    public function offset(int $offset): self;

    public function __toString();
}