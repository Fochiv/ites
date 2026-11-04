<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('nav_home');
$pageDescription = t('hero_copy');
require __DIR__ . '/includes/header.php';
$domainIcons = ['bi-lightbulb', 'bi-mortarboard', 'bi-car-front', 'bi-megaphone', 'bi-box-seam', 'bi-graph-up-arrow', 'bi-buildings', 'bi-shop', 'bi-basket2', 'bi-tools'];
?>
<section class="hero" id="top">
  <div class="hero-image" aria-hidden="true"></div>
  <div class="hero-watermark" aria-hidden="true">ITES</div>
  <div class="container hero-content">
    <span class="eyebrow reveal"><?= e(t('hero_eyebrow')) ?></span>
    <h1 class="display-title reveal reveal-delay-1"><?= e(t('hero_title')) ?></h1>
    <p class="hero-copy reveal reveal-delay-2"><?= e(t('hero_copy')) ?></p>
    <div class="hero-actions reveal reveal-delay-3">
      <a class="btn-ites" href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('hero_services')) ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
      <a class="btn-ites-outline" href="contact.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('hero_contact')) ?></a>
    </div>
  </div>
  <div class="hero-index"><span></span><?= e(t('hero_index')) ?></div>
</section>

<section class="intro-section">
  <div class="container intro-layout">
    <div class="reveal">
      <span class="eyebrow"><?= e(t('intro_eyebrow')) ?></span>
      <h2 class="section-title"><?= e(t('intro_title')) ?></h2>
      <div class="intro-mark">
        <strong><?= e(t('intro_mark_title')) ?></strong>
        <p><?= e(t('intro_mark_copy')) ?></p>
      </div>
    </div>
    <div class="intro-copy reveal reveal-delay-1">
      <p><?= e(t('intro_text_1')) ?></p>
      <p><?= e(t('intro_text_2')) ?></p>
      <a class="btn-text" href="about.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('intro_more')) ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
      <div class="intro-foot"><span><?= e(t('intro_note')) ?></span><span aria-hidden="true"></span><i class="bi bi-arrow-down-right" aria-hidden="true"></i></div>
    </div>
  </div>
</section>

<section class="domains-section" id="domains">
  <div class="container">
    <div class="section-heading-row reveal">
      <div><span class="eyebrow"><?= e(t('domains_eyebrow')) ?></span><h2 class="section-title"><?= e(t('domains_title')) ?></h2></div>
      <p class="section-intro"><?= e(t('domains_intro')) ?></p>
    </div>
    <div class="domain-grid">
      <?php for ($i = 1; $i <= 10; $i++): ?>
        <article class="domain-card reveal reveal-delay-<?= (($i - 1) % 4) ?>">
          <span class="domain-icon"><i class="bi <?= e($domainIcons[$i - 1]) ?>" aria-hidden="true"></i></span>
          <h3><?= e(t('domain_' . $i)) ?></h3>
          <p><?= e(t('domain_' . $i . '_desc')) ?></p>
          <span class="domain-number">0<?= $i ?></span>
        </article>
      <?php endfor; ?>
    </div>
    <div class="mt-4 reveal"><a class="btn-text" href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('domains_more')) ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a></div>
  </div>
</section>

<section class="approach-section">
  <div class="container approach-layout">
    <div class="approach-visual reveal" role="img" aria-label="<?= e(t('why_caption')) ?>">
      <div class="visual-caption"><small><?= e(t('why_caption_small')) ?></small><strong><?= e(t('why_caption')) ?></strong></div>
    </div>
    <div class="reveal reveal-delay-1">
      <span class="eyebrow"><?= e(t('why_eyebrow')) ?></span>
      <h2 class="section-title"><?= e(t('why_title')) ?></h2>
      <p class="section-intro"><?= e(t('why_copy')) ?></p>
      <div class="approach-list">
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <div class="approach-item">
            <span>0<?= $i ?></span>
            <div><strong><?= e(t('why_' . $i . '_title')) ?></strong><p><?= e(t('why_' . $i . '_desc')) ?></p></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container cta-inner">
    <div class="reveal"><h2><?= e(t('cta_title')) ?></h2><p><?= e(t('cta_copy')) ?></p></div>
    <a class="btn-ites reveal reveal-delay-1" href="contact.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('cta_button')) ?> <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
