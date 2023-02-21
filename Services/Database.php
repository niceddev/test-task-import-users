<?php

namespace Services;

use PDO;

class Database
{
    public PDO $connection;

    public function __construct(array $config)
    {
        $credentials = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($credentials, $config['user'], $config['password']);
    }

    public function query(string $query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }

}
