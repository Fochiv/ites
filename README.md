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

Bootstrap 5, Bootstrap Icons and Google Fonts are loaded from their CDNs. The supplied `logo_ites.jpg` is retained at the project root. It is a scanned company-registration declaration rather than a brand logo and contains personal information, so it is not published as a public-facing logo. The site uses a typographic I.T.E.S wordmark until a dedicated approved logo file is supplied.

## Contact form

The contact form validates input on the server, uses a session CSRF token, a honeypot field and a per-session submission delay. It sends mail only when both a confirmed recipient and sender are configured in `includes/contact-config.php` (or with the `ITES_CONTACT_EMAIL` and `ITES_CONTACT_FROM` environment variables). PHP's `mail()` must also be configured by the host. If any setting is missing, the site explains that sending is unavailable rather than claiming success.

The map is centered on Douala only; no street address or coordinates are specified. The imported `logo_ites.jpg` is a company-registration scan containing personal information, so it is not displayed and direct requests to it are blocked by the router and Apache rules. Replace it with an approved public logo when available.
