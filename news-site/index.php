<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Подключаем основные компоненты
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Router.php';

// Запускаем маршрутизатор
Router::handle();
