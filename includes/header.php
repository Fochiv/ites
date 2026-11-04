<?php
require_once __DIR__ . '/functions.php';
$lang = current_language();
$currentPage = basename((string) ($_SERVER['PHP_SELF'] ?? 'index.php'));
$pageTitle = $pageTitle ?? t('site_name');
$active = static fn(string $page): string => $currentPage === $page ? 'active' : '';
?>
<!doctype html>
<html lang="<?= e($lang) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#14263f">
  <meta name="description" content="<?= e($pageDescription ?? t('hero_copy')) ?>">
  <title><?= e($pageTitle) ?> — I.T.E.S CONSULTING</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=DM+Serif+Display&amp;display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg">
  <script>document.documentElement.classList.add('js-enabled');</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/main.js" defer></script>
</head>
<body>
<header class="site-header">
  <div class="main-nav">
    <div class="container nav-inner">
      <a class="brand" href="index.php<?= $lang === 'en' ? '?lang=en' : '' ?>" aria-label="I.T.E.S Consulting — <?= e(t('nav_home')) ?>">
        <img class="brand-logo" src="assets/images/ites-logo.jpg" width="1150" height="720" alt="I.T.E.S Consulting — Innovation Training and Employment Services">
      </a>
      <nav class="nav-links" id="primary-navigation" aria-label="<?= $lang === 'fr' ? 'Navigation principale' : 'Main navigation' ?>">
        <a class="<?= $active('index.php') ?>" href="index.php<?= $lang === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_home')) ?></a>
        <a class="<?= $active('about.php') ?>" href="about.php<?= $lang === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_about')) ?></a>
        <a class="<?= $active('services.php') ?>" href="services.php<?= $lang === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_services')) ?></a>
        <a href="index.php<?= $lang === 'en' ? '?lang=en#domains' : '#domains' ?>"><?= e(t('nav_domains')) ?></a>
        <a class="<?= $active('contact.php') ?>" href="contact.php<?= $lang === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_contact')) ?></a>
        <div class="nav-social" aria-label="<?= $lang === 'fr' ? 'Réseaux sociaux' : 'Social media' ?>">
          <button class="social-button" type="button" aria-label="Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></button>
          <button class="social-button" type="button" aria-label="WhatsApp"><i class="bi bi-whatsapp" aria-hidden="true"></i></button>
          <button class="social-button" type="button" aria-label="X"><i class="bi bi-twitter-x" aria-hidden="true"></i></button>
          <button class="social-button" type="button" aria-label="LinkedIn"><i class="bi bi-linkedin" aria-hidden="true"></i></button>
          <button class="social-button" type="button" aria-label="Google"><i class="bi bi-google" aria-hidden="true"></i></button>
        </div>
        <a class="btn-ites nav-cta" href="contact.php<?= $lang === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_cta')) ?> <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
      </nav>
      <div class="nav-tools">
        <div class="lang-switch" aria-label="<?= $lang === 'fr' ? 'Choisir la langue' : 'Choose language' ?>">
          <a href="<?= language_url('fr') ?>" class="<?= $lang === 'fr' ? 'active' : '' ?>" <?= $lang === 'fr' ? 'aria-current="page"' : '' ?>>FR</a>
          <span aria-hidden="true">/</span>
          <a href="<?= language_url('en') ?>" class="<?= $lang === 'en' ? 'active' : '' ?>" <?= $lang === 'en' ? 'aria-current="page"' : '' ?>>EN</a>
        </div>
        <button class="nav-toggle" type="button" aria-label="<?= $lang === 'fr' ? 'Ouvrir le menu' : 'Open menu' ?>" data-open-label="<?= $lang === 'fr' ? 'Ouvrir le menu' : 'Open menu' ?>" data-close-label="<?= $lang === 'fr' ? 'Fermer le menu' : 'Close menu' ?>" aria-expanded="false" aria-controls="primary-navigation">
          <i class="bi bi-list" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</header>
<main id="main-content">
