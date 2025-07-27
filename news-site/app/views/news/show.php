<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
  <div class="container header-container">
    <a href="/" class="logo-link">
      <img src="/assets/logo.png" alt="Галактический вестник" class="site-logo">
    </a>
  </div>
</header>

<main class="container">
<nav class="breadcrumbs">
    <a href="/" class="breadcrumbs__link">Главная</a>
    <span class="breadcrumbs__separator">/</span>
    <span class="breadcrumbs__current"><?= htmlspecialchars($article['title']) ?></span>
  </nav>
  <h1 class="news-detail__title"><?= htmlspecialchars($article['title']) ?></h1>

  <div class="news-detail__wrapper">
    <div class="news-detail__textblock">
      <span class="news-detail__date"><?= date('d.m.Y', strtotime($article['date'])) ?></span>
      <div class="news-detail__lead"><?= $article['announce'] ?></div>
      <div class="news-detail__content">
        <?= $article['content'] ?>
      </div>
      <a class="back-link" href="/">← НАЗАД К НОВОСТЯМ</a>
    </div>

    <?php if (!empty($article['image'])): ?>
      <div class="news-detail__imageblock">
        <img src="/images/<?= htmlspecialchars($article['image']) ?>" alt="Изображение">
      </div>
    <?php endif; ?>
  </div>
</main>

<footer class="footer">
  <hr class="footer-divider">
  <div class="footer-content">
    © 2023 — 2412 «Галактический вестник»
  </div>
</footer>

</body>
</html>
