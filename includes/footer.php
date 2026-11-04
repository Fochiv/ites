</main>
<footer class="site-footer">
  <div class="container">
    <div class="footer-main">
      <div class="footer-brand">
        <a class="brand" href="index.php<?= current_language() === 'en' ? '?lang=en' : '' ?>" aria-label="I.T.E.S Consulting">
          <img class="brand-logo" src="assets/images/ites-logo.jpg" width="1150" height="720" alt="I.T.E.S Consulting — Innovation Training and Employment Services">
        </a>
        <p class="footer-description"><?= e(t('footer_description')) ?></p>
        <div class="footer-location"><i class="bi bi-geo-alt" aria-hidden="true"></i><?= e(t('location')) ?></div>
        <div class="footer-legal"><?= e(t('footer_legal')) ?></div>
      </div>
      <div class="footer-column">
        <h3><?= e(t('footer_quick')) ?></h3>
        <div class="footer-links">
          <a href="index.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_home')) ?></a>
          <a href="about.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_about')) ?></a>
          <a href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_services')) ?></a>
          <a href="contact.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('nav_contact')) ?></a>
        </div>
      </div>
      <div class="footer-column">
        <h3><?= e(t('footer_sectors')) ?></h3>
        <div class="footer-links">
          <a href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('domain_1')) ?></a>
          <a href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('domain_2')) ?></a>
          <a href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('domain_4')) ?></a>
          <a href="services.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('domain_7')) ?></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span class="footer-copyright">© <?= date('Y') ?> I.T.E.S CONSULTING. <?= e(t('footer_rights')) ?></span>
    </div>
  </div>
</footer>
<a href="#top" class="back-to-top" aria-label="<?= e(t('back_top')) ?>" title="<?= e(t('back_top')) ?>"><i class="bi bi-arrow-up" aria-hidden="true"></i></a>
</body>
</html>
