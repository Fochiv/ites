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
        <div class="footer-contact-wrap">
          <span class="footer-social-title"><?= e(t('nav_contact')) ?></span>
          <div class="footer-contact-links">
            <a class="contact-method footer-contact-method" href="tel:+237696214027" aria-label="<?= e(t('contact_call') . ' +237 696 214 027') ?>">
              <span class="contact-method-icon"><i class="bi bi-telephone-fill" aria-hidden="true"></i></span>
              <span class="contact-method-text"><small><?= e(t('contact_call')) ?></small><strong>696 214 027</strong></span>
            </a>
            <a class="contact-method contact-method-whatsapp footer-contact-method" href="https://wa.me/237654428607" aria-label="<?= e(t('contact_whatsapp') . ' 654 428 607') ?>" target="_blank" rel="noopener noreferrer">
              <span class="contact-method-icon"><i class="bi bi-whatsapp" aria-hidden="true"></i></span>
              <span class="contact-method-text"><small><?= e(t('contact_whatsapp')) ?></small><strong>654 428 607</strong></span>
            </a>
          </div>
        </div>
        <div class="footer-social-wrap">
          <span class="footer-social-title"><?= e(t('footer_social_title')) ?></span>
          <div class="footer-social" role="group" aria-label="<?= e(t('footer_social_title')) ?>">
            <span class="footer-social-icon" role="img" aria-label="Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></span>
            <span class="footer-social-icon" role="img" aria-label="X"><i class="bi bi-twitter-x" aria-hidden="true"></i></span>
            <span class="footer-social-icon" role="img" aria-label="LinkedIn"><i class="bi bi-linkedin" aria-hidden="true"></i></span>
            <span class="footer-social-icon" role="img" aria-label="Google"><i class="bi bi-google" aria-hidden="true"></i></span>
          </div>
        </div>
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
