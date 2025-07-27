<?php

class Database {
    public static function connect() {
        return new PDO(
            'mysql:host=localhost;dbname=news_db;charset=utf8',
            'root',
            'root', // <-- ВАЖНО: здесь теперь 'root', а не ''
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}
