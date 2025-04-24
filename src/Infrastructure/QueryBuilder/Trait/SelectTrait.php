<?php

namespace Raketa\BackendTestTask\Infrastructure\QueryBuilder\Trait;

trait SelectTrait
{
    private string $from;
    private string $columns = '*';
    private array $where;

    private ?int $limit = null;
    private ?int $offset = null;
    public function from(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function columns(string $columns): self
    {
        $this->columns = $columns;
        return $this;
    }

    public function where(array $where): self
    {
        $this->where = $where;
        return $this;
    }

    public function andWhere(array $where): self
    {
        $this->where[] = implode(' AND ', $where);
        return $this;

    }
    public function orWhere(array $where): self
    {
        $this->where[] = implode(' OR ', $where);
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

}