<?php
namespace App\Controllers;
class HomeController {
    public function index() {
        $stats = [
            'freelancers' => 15420,
            'projects' => 8934,
            'categories' => 48,
        ];
        require __DIR__ . '/../../templates/home.php';
    }
}
