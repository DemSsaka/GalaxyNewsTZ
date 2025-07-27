<?php
require_once __DIR__ . '/../models/News.php';

class NewsController {
    public function index() {
        $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        $perPage = 4;

        $news = News::getPaginated($page, $perPage);
        $totalNews = News::countAll();
        $totalPages = ceil($totalNews / $perPage);

        $latestNews = News::getLatestOne();

        require __DIR__ . '/../views/news/index.php';
    }

    public function show() {
        if (!isset($_GET['id'])) {
            echo "ID не указан";
            return;
        }

        $id = (int) $_GET['id'];
        $article = News::getById($id);

        if (!$article) {
            echo "Новость не найдена";
            return;
        }

        require __DIR__ . '/../views/news/show.php';
    }
}
