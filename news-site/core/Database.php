<?php

class Database {
    public static function connect() {
        return new PDO(
            'mysql:host=localhost;dbname=news_db;charset=utf8',
            'root',
            'root',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}
