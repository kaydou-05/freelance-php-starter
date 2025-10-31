<?php
namespace App\Core;

class Config {
    public static function get($key, $default = null) {
        $map = [
            'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
            'db_name' => getenv('DB_NAME') ?: 'freelance',
            'db_user' => getenv('DB_USER') ?: 'root',
            'db_pass' => getenv('DB_PASS') ?: '',
            'base_url' => getenv('BASE_URL') ?: 'http://localhost:8000',
        ];
        return $map[$key] ?? $default;
    }
}
