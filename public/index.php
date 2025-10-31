<?php
// Simple front controller for the starter app
require_once __DIR__ . '/../vendor/autoload.php';
use App\Core\Config;

// Load .env if exists
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line),'=')===false) continue;
        putenv($line);
    }
}

// Basic autoloader for src/ when composer not used
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) return;
    $rel = substr($class, strlen($prefix));
    $file = $base_dir . str_replace('\\', '/', $rel) . '.php';
    if (file_exists($file)) require $file;
});

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = rtrim($path, '/');

if ($path === '' || $path === '/' || $path === '/index.php') {
    $ctrl = new App\Controllers\HomeController();
    $ctrl->index();
    exit;
}

if (strpos($path, '/services') === 0) {
    $ctrl = new App\Controllers\ServiceController();
    $ctrl->index();
    exit;
}

// static files fallback
http_response_code(404);
echo '404 Not Found';
