<?php
include_once './src/Infrastructure/QueryBuilder/Select.php';


$select = new \Raketa\BackendTestTask\Infrastructure\QueryBuilder\MySql\Select();

$q = $select->columns('id')
    ->from('prod')
    ->orWhere(['w', 'q'])
    ->andWhere(['s', 'f'])
    ->limit(1)
    ->offset(4);

echo $q;