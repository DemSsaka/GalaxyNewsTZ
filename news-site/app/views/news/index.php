<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галактический Вестник</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="site-header">
  <div class="container header-container">
    <a href="/" class="logo-link">
      <img src="/assets/logo.png" alt="Галактический вестник" class="site-logo">
    </a>
  </div>
</header>

<?php if (isset($latestNews)) : ?>
  <section class="latest-banner" style="background-image: url('/images/<?= $latestNews['image'] ?>')">
  <div class="latest-banner__overlay">
    <div class="latest-banner__content container">
      <h1><?= $latestNews['title'] ?></h1>
      <p><?= $latestNews['announce'] ?></p>
    </div>
  </div>
</section>
<?php endif; ?>


<main class="container">
<h1 class="news-page__title">Новости</h1>
  <div class="news-grid">
  <?php foreach ($news as $item): ?>
    <div class="news-card">
      <div class="news-card__content">
        <span class="news-card__date"><?= date('d.m.Y', strtotime($item['date'])) ?></span>
        <h3 class="news-card__title"><?= $item['title'] ?></h3>
        <p class="news-card__announce"><?= strip_tags($item['announce']) ?></p>
      </div>
      <a class="read-more-button" href="?route=news/show&id=<?= $item['id'] ?>">
        ПОДРОБНЕЕ <span class="arrow">→</span>
      </a>
    </div>
  <?php endforeach; ?>
</div>


  <div class="pagination">
    <?php
    $start = max(1, $page - 1);
    $end = min($totalPages, $page + 1);
    if ($page == 1) {
        $end = min($totalPages, 3);
    } elseif ($page == $totalPages) {
        $start = max(1, $totalPages - 2);
    }

    for ($i = $start; $i <= $end; $i++): ?>
        <?php if ($i == $page): ?>
            <span class="pagination__item active"><?= $i ?></span>
        <?php else: ?>
            <a class="pagination__item" href="?page=<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a class="pagination__item arrow" href="?page=<?= $page + 1 ?>">
            <span class="arrow-icon">→</span>
        </a>
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
