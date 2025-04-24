<?php

namespace Raketa\BackendTestTask\Infrastructure\QueryBuilder\MySql;

use Raketa\BackendTestTask\Infrastructure\QueryBuilder\SelectInterfaces;
use Raketa\BackendTestTask\Infrastructure\QueryBuilder\Trait\SelectTrait;

class Select implements SelectInterface
{
    use SelectTrait;

    public function __toString()
    {
        $query = "SELECT {$this->columns} FROM {$this->from}";

        if (!empty($this->where)) {
            $query .= " WHERE (" . implode(') AND (', $this->where) . ') ';
        }

        if ($this->limit) {
            $query .= " LIMIT {$this->limit} ";
        }

        if ($this->offset) {
            $query .= " OFFSET {$this->offset} ";
        }

        return $query;

    }


}