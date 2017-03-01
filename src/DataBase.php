<?php

class DataBase
{
    protected $connection;

    public function __construct(array $config)
    {
        $dsn = sprintf(
            '%1$s:host=%2$s;port=%3$s;dbname=%4$s',
            $config['drive'],
            $config['host'],
            $config['port'],
            $config['name']
        );
        try {
            $this->connection = new \PDO($dsn, $config['user'], $config['pass']);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo sprintf('Conexão error: %s', $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
