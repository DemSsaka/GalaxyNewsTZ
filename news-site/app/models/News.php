<?php

class News {
    public static function getPaginated($page = 1, $perPage = 4) {
        $offset = ($page - 1) * $perPage;
        $pdo = Database::connect();

        $stmt = $pdo->prepare("SELECT * FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countAll() {
        $pdo = Database::connect();
        return (int) $pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }

    public static function getById($id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getLatestOne() {
        $pdo = Database::connect();
        $stmt = $pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
