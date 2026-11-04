<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('nav_about');
$pageDescription = t('about_hero_copy');
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero" id="top">
  <div class="container">
    <div class="crumb"><a href="index.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('crumb_home')) ?></a><i class="bi bi-chevron-right" aria-hidden="true"></i><span><?= e(t('nav_about')) ?></span></div>
    <span class="eyebrow"><?= e(t('about_kicker')) ?></span>
    <h1 class="display-title"><?= e(t('about_title')) ?></h1>
    <p><?= e(t('about_hero_copy')) ?></p>
    <div class="page-hero-meta"><span></span><?= e(t('location')) ?> · I.T.E.S CONSULTING</div>
  </div>
</section>
<section class="about-lead">
  <div class="container about-lead-layout">
    <div class="reveal"><span class="eyebrow"><?= e(t('about_general_eyebrow')) ?></span><h2 class="section-title"><?= e(t('about_general_title')) ?></h2></div>
    <div class="about-lead-copy reveal reveal-delay-1">
      <p><?= e(t('about_general_p1')) ?></p>
      <p><?= e(t('about_general_p2')) ?></p>
      <p><?= e(t('about_general_p3')) ?></p>
    </div>
  </div>
</section>
<section class="identity-section">
  <div class="container">
    <div class="reveal"><span class="eyebrow"><?= e(t('identity_eyebrow')) ?></span><h2 class="section-title"><?= e(t('identity_title')) ?></h2><p class="section-intro"><?= e(t('identity_intro')) ?></p></div>
    <div class="identity-grid">
      <article class="identity-panel reveal"><span class="identity-icon"><i class="bi bi-compass" aria-hidden="true"></i></span><h3><?= e(t('identity_label')) ?></h3><p><?= e(t('identity_copy')) ?></p></article>
      <article class="identity-panel reveal reveal-delay-1"><span class="identity-icon"><i class="bi bi-eye" aria-hidden="true"></i></span><h3><?= e(t('vision_label')) ?></h3><p><?= e(t('vision_copy')) ?></p></article>
      <article class="identity-panel reveal reveal-delay-2"><span class="identity-icon"><i class="bi bi-signpost-split" aria-hidden="true"></i></span><h3><?= e(t('mission_label')) ?></h3><p><?= e(t('mission_copy')) ?></p></article>
    </div>
  </div>
</section>
<section class="values-section">
  <div class="container values-layout">
    <div class="reveal"><span class="eyebrow"><?= e(t('values_eyebrow')) ?></span><h2 class="section-title"><?= e(t('values_title')) ?></h2></div>
    <div class="values-list reveal reveal-delay-1">
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="value-row"><i class="bi bi-plus-lg" aria-hidden="true"></i><strong><?= e(t('value_' . $i)) ?></strong></div>
      <?php endfor; ?>
    </div>
  </div>
</section>
<section class="commitment">
  <div class="container commitment-grid">
    <div class="reveal"><span class="eyebrow"><?= e(t('commitment_kicker')) ?></span><h2><?= e(t('commitment_title')) ?></h2></div>
    <p class="reveal reveal-delay-1"><?= e(t('commitment_copy')) ?></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
