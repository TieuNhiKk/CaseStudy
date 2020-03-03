<?php

namespace Core\Database;

use PDO;
use PDOException;

class ConectDB
{
    protected static $config = [
        'host' => 'localhost:3306',
        'db'   => 'casestudy',
        'user' => 'root',
        'pass' => '',
        'charset' => 'utf8mb4',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    ];

    public static function connect($config = null)
    {
        if ($config)
            foreach ($config as $key => $value) {
                static::$config[$key] = $value;
            };

        $dsn = "mysql:host=" . static::$config['host'] . ";dbname=" . static::$config['db'] . ";charset=" . static::$config['charset'];

        try {
            return new PDO($dsn, static::$config['user'], static::$config['pass'], static::$config['options']);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
