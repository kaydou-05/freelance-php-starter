<?php
namespace App\Models;
use App\Core\Database;

class Service {
    public static function search($q = '', $category = null, $min = null, $max = null, $sort = 'relevance', $limit = 20, $offset = 0) {
        $pdo = Database::get();
        $where = [];
        $params = [];
        if ($q !== '') {
            $where[] = '(title LIKE :q OR description LIKE :q)';
            $params[':q'] = '%' . $q . '%';
        }
        if ($category) {
            $where[] = 'category = :category';
            $params[':category'] = $category;
        }
        $sql = 'SELECT * FROM services';
        if (count($where)) $sql .= ' WHERE ' . implode(' AND ', $where);
        $sql .= ' ORDER BY created_at DESC';
        $sql .= ' LIMIT :limit OFFSET :offset';
        $stmt = $pdo->prepare($sql);
        foreach ($params as $k => $v) $stmt->bindValue($k, $v);
        $stmt->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
