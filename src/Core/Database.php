<?php
namespace App\Core;
use PDO;

class Database {
    private static $pdo = null;
    public static function get() {
        if (self::$pdo) return self::$pdo;
        $dsn = 'mysql:host=' . Config::get('db_host') . ';dbname=' . Config::get('db_name') . ';charset=utf8mb4';
        self::$pdo = new PDO($dsn, Config::get('db_user'), Config::get('db_pass'), [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return self::$pdo;
    }
}
