<?php

namespace core;

use PDO;

/*
* Abstract Connect & Query For Models
*/
abstract class Model
{
    private $pdo;

    // Get Connection
    protected function getPDO()
    {
        if (!isset($this->pdo)) {
            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            );
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR;
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        return $this->pdo;
    }

    // Run Query
    public function run($sql, $args = [])
    {
        if (!$args) {
            return $this->getPDO()->query($sql);
        }
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}