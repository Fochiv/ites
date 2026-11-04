<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('nav_services');
$pageDescription = t('services_hero_copy');
require __DIR__ . '/includes/header.php';
$serviceIcons = ['bi-lightbulb', 'bi-mortarboard', 'bi-megaphone', 'bi-box-seam', 'bi-currency-exchange', 'bi-buildings', 'bi-basket2', 'bi-tools'];
?>
<section class="page-hero" id="top">
  <div class="container">
    <div class="crumb"><a href="index.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('crumb_home')) ?></a><i class="bi bi-chevron-right" aria-hidden="true"></i><span><?= e(t('nav_services')) ?></span></div>
    <span class="eyebrow"><?= e(t('services_kicker')) ?></span>
    <h1 class="display-title"><?= e(t('services_title')) ?></h1>
    <p><?= e(t('services_hero_copy')) ?></p>
    <div class="page-hero-meta"><span></span><?= e(t('services_kicker')) ?> · <?= e(t('location')) ?></div>
  </div>
</section>
<section class="services-intro">
  <div class="container">
    <span class="eyebrow"><?= e(t('services_intro_eyebrow')) ?></span>
    <h2 class="section-title"><?= e(t('services_intro_title')) ?></h2>
    <p class="section-intro"><?= e(t('services_intro_copy')) ?></p>
  </div>
</section>
<section class="service-list">
  <div class="container">
    <?php for ($i = 1; $i <= 8; $i++): ?>
      <article class="service-row reveal">
        <span class="service-index">0<?= $i ?> / 08</span>
        <div class="service-name"><span class="service-symbol"><i class="bi <?= e($serviceIcons[$i - 1]) ?>" aria-hidden="true"></i></span><h2><?= e(t('service_' . $i . '_title')) ?></h2><small><?= e(t('services_kicker')) ?></small></div>
        <div class="service-details">
          <p><?= e(t('service_' . $i . '_intro')) ?></p>
          <ul>
            <?php foreach (['a', 'b', 'c'] as $suffix): ?>
              <?php $key = 'service_' . $i . '_' . $suffix; ?>
              <?php if (t($key) !== $key): ?><li><?= e(t($key)) ?></li><?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </article>
    <?php endfor; ?>
  </div>
</section>
<section class="cta-band">
  <div class="container cta-inner">
    <div class="reveal"><h2><?= e(t('cta_title')) ?></h2><p><?= e(t('cta_copy')) ?></p></div>
    <a class="btn-ites reveal reveal-delay-1" href="contact.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('cta_button')) ?> <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
