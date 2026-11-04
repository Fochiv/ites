<?php
require_once __DIR__ . '/includes/functions.php';
start_contact_session();
$pageTitle = t('nav_contact');
$pageDescription = t('contact_hero_copy');
$formNotice = '';
$formValues = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';

if ($isPost) {
  foreach ($formValues as $field => $unused) {
    $formValues[$field] = isset($_POST[$field]) && is_string($_POST[$field])
      ? trim($_POST[$field])
      : '';
  }

  $postedToken = isset($_POST['csrf_token']) && is_string($_POST['csrf_token'])
    ? $_POST['csrf_token']
    : '';
  $honeypot = isset($_POST['website']) && is_string($_POST['website'])
    ? trim($_POST['website'])
    : '';
  $validToken = $postedToken !== '' && hash_equals(contact_csrf_token(), $postedToken);
  $nameLength = contact_text_length($formValues['name']);
  $subjectLength = contact_text_length($formValues['subject']);
  $messageLength = contact_text_length($formValues['message']);
  $validFields =
    $nameLength >= 2 && $nameLength <= 120 &&
    filter_var($formValues['email'], FILTER_VALIDATE_EMAIL) !== false &&
    strlen($formValues['email']) <= 190 &&
    $subjectLength >= 2 && $subjectLength <= 180 &&
    !preg_match('/[\r\n]/', $formValues['subject']) &&
    $messageLength >= 2 && $messageLength <= 3000;

  if ($honeypot !== '' || !$validToken || !$validFields) {
    $formNotice = t('form_invalid');
  } elseif (
    isset($_SESSION['contact_last_submission']) &&
    is_int($_SESSION['contact_last_submission']) &&
    time() - $_SESSION['contact_last_submission'] < 30
  ) {
    $formNotice = t('form_rate_limited');
  } else {
    $mailConfig = require __DIR__ . '/includes/contact-config.php';
    $recipient = getenv('ITES_CONTACT_EMAIL') ?: ($mailConfig['recipient'] ?? '');
    $sender = getenv('ITES_CONTACT_FROM') ?: ($mailConfig['sender'] ?? '');

    if (
      !is_string($recipient) || filter_var($recipient, FILTER_VALIDATE_EMAIL) === false ||
      !is_string($sender) || filter_var($sender, FILTER_VALIDATE_EMAIL) === false ||
      !function_exists('mail')
    ) {
      $formNotice = t('form_not_configured');
    } else {
      $safeSubject = 'I.T.E.S CONSULTING — ' . preg_replace('/[\r\n]+/', ' ', $formValues['subject']);
      if (function_exists('mb_encode_mimeheader')) {
        $safeSubject = mb_encode_mimeheader($safeSubject, 'UTF-8');
      }
      $body = "Nom : {$formValues['name']}\n"
        . "E-mail : {$formValues['email']}\n\n"
        . "Message :\n{$formValues['message']}\n";
      $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: I.T.E.S CONSULTING <' . $sender . '>',
        'Reply-To: ' . $formValues['email'],
      ];

      $_SESSION['contact_last_submission'] = time();
      if (mail($recipient, $safeSubject, $body, implode("\r\n", $headers))) {
        $_SESSION['contact_flash'] = t('form_sent');
        header('Location: contact.php' . (current_language() === 'en' ? '?lang=en' : ''), true, 303);
        exit;
      }

      $formNotice = t('form_delivery_error');
    }
  }
} elseif (isset($_SESSION['contact_flash']) && is_string($_SESSION['contact_flash'])) {
  $formNotice = $_SESSION['contact_flash'];
  unset($_SESSION['contact_flash']);
}

$csrfToken = contact_csrf_token();
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero" id="top">
  <div class="container">
    <div class="crumb"><a href="index.php<?= current_language() === 'en' ? '?lang=en' : '' ?>"><?= e(t('crumb_home')) ?></a><i class="bi bi-chevron-right" aria-hidden="true"></i><span><?= e(t('nav_contact')) ?></span></div>
    <span class="eyebrow"><?= e(t('contact_kicker')) ?></span>
    <h1 class="display-title"><?= e(t('contact_title')) ?></h1>
    <p><?= e(t('contact_hero_copy')) ?></p>
    <div class="page-hero-meta"><span></span><?= e(t('location')) ?> · I.T.E.S CONSULTING</div>
  </div>
</section>
<section class="contact-section">
  <div class="container contact-layout">
    <div class="contact-form-wrap reveal">
      <h2><?= e(t('contact_form_title')) ?></h2>
      <p><?= e(t('contact_form_copy')) ?></p>
      <form id="contact-form" action="contact.php<?= current_language() === 'en' ? '?lang=en' : '' ?>" method="post" data-message-invalid="<?= e(t('form_invalid')) ?>">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <div class="contact-trap" aria-hidden="true">
          <label for="contact-website">Leave this field empty</label>
          <input id="contact-website" name="website" type="text" tabindex="-1" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label" for="contact-name"><?= e(t('field_name')) ?> <span aria-hidden="true">*</span></label>
          <input class="form-control" id="contact-name" name="name" type="text" autocomplete="name" minlength="2" maxlength="120" placeholder="<?= e(t('placeholder_name')) ?>" value="<?= e($formValues['name']) ?>" required aria-describedby="name-error">
          <div class="invalid-feedback" id="name-error"><?= e(t('form_required')) ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="contact-email"><?= e(t('field_email')) ?> <span aria-hidden="true">*</span></label>
          <input class="form-control" id="contact-email" name="email" type="email" autocomplete="email" maxlength="190" placeholder="<?= e(t('placeholder_email')) ?>" value="<?= e($formValues['email']) ?>" required aria-describedby="email-error">
          <div class="invalid-feedback" id="email-error"><?= e(t('form_email_error')) ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="contact-subject"><?= e(t('field_subject')) ?> <span aria-hidden="true">*</span></label>
          <input class="form-control" id="contact-subject" name="subject" type="text" minlength="2" maxlength="180" placeholder="<?= e(t('placeholder_subject')) ?>" value="<?= e($formValues['subject']) ?>" required aria-describedby="subject-error">
          <div class="invalid-feedback" id="subject-error"><?= e(t('form_required')) ?></div>
        </div>
        <div class="mb-4">
          <label class="form-label" for="contact-message"><?= e(t('field_message')) ?> <span aria-hidden="true">*</span></label>
          <textarea class="form-control" id="contact-message" name="message" minlength="2" maxlength="3000" placeholder="<?= e(t('placeholder_message')) ?>" required aria-describedby="message-error"><?= e($formValues['message']) ?></textarea>
          <div class="invalid-feedback" id="message-error"><?= e(t('form_required')) ?></div>
        </div>
        <button class="btn-ites" type="submit"><?= e(t('form_submit')) ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
        <div class="form-status" id="form-status" role="status" aria-live="polite"<?= $formNotice === '' ? ' hidden' : '' ?>><?= e($formNotice) ?></div>
      </form>
    </div>
    <aside class="contact-aside reveal reveal-delay-1">
      <span class="eyebrow"><?= e(t('contact_aside_eyebrow')) ?></span>
      <h2 class="section-title"><?= e(t('contact_aside_title')) ?></h2>
      <p class="section-intro"><?= e(t('contact_aside_copy')) ?></p>
      <div class="location-card" aria-label="<?= e(t('contact_location_name') . ', ' . t('contact_location_detail')) ?>">
        <iframe src="https://maps.google.com/maps?q=Douala%20Cameroon&t=&z=11&ie=UTF8&iwloc=&output=embed" title="<?= e(t('contact_location_name') . ', ' . t('contact_location_detail')) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-label="<?= e(t('contact_location_name') . ', ' . t('contact_location_detail')) ?>"></iframe>
        <div class="location-label"><small><?= e(t('contact_location_label')) ?></small><strong><?= e(t('contact_location_name')) ?></strong></div>
      </div>
      <div class="contact-location"><i class="bi bi-geo-alt" aria-hidden="true"></i><div><strong><?= e(t('contact_location_name')) ?></strong><span><?= e(t('contact_location_detail')) ?></span></div></div>
    </aside>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
