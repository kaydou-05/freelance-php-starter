<?php
namespace App\Controllers;
use App\Models\Service;

class ServiceController {
    public function index() {
        $q = $_GET['q'] ?? '';
        $category = $_GET['category'] ?? '';
        $services = Service::search($q, $category, null, null, 'relevance', 50, 0);
        require __DIR__ . '/../../templates/services.php';
    }
}
