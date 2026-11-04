# I.T.E.S CONSULTING — company showcase

Responsive, bilingual company website for INNOVATION TRAINING AND EMPLOYMENT SERVICES (I.T.E.S CONSULTING), built with native PHP includes, HTML, CSS, JavaScript and Bootstrap 5 / Bootstrap Icons via CDN.

## Pages

- `index.php` — company overview, areas of work and approach
- `about.php` — identity, vision, mission, values and commitments
- `services.php` — the eight service categories in the project brief
- `contact.php` — accessible enquiry form and Douala location

French is the default language. Add `?lang=en` to any page for English; the language controls preserve the current route.

## Run locally

Use the included router so private imported files are not served by PHP's built-in server:

```sh
php -S 127.0.0.1:8000 router.php
```

Then visit `http://127.0.0.1:8000/index.php`.

## Assets and customization

- Styles: `assets/css/style.css`
- Interactions: `assets/js/main.js`
- Shared translations/helpers: `includes/functions.php`
- Shared page shell: `includes/header.php`, `includes/footer.php`
- Hero image: `assets/images/ites-hero.jpg`
- Company logo: `assets/images/ites-logo.jpg` (cropped display copy of the uploaded `logo_ites2.jpg`)

Bootstrap 5, Bootstrap Icons and Google Fonts are loaded from their CDNs. The new official I.T.E.S logo is displayed in the navigation and footer. The original uploaded file remains at the workspace root, but only the optimized crop in `assets/images/` is served by the site.

## Contact form

The contact form validates input on the server, uses a session CSRF token, a honeypot field and a per-session submission delay. It sends mail only when both a confirmed recipient and sender are configured in `includes/contact-config.php` (or with the `ITES_CONTACT_EMAIL` and `ITES_CONTACT_FROM` environment variables). PHP's `mail()` must also be configured by the host. If any setting is missing, the site explains that sending is unavailable rather than claiming success.

The map is centered on Douala only; no street address or coordinates are specified.
