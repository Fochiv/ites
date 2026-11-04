(() => {
  const root = document.documentElement;
  const menuButton = document.querySelector('.nav-toggle');
  const menu = document.querySelector('.nav-links');

  if (menuButton && menu) {
    const setMenu = (open) => {
      menu.classList.toggle('open', open);
      menuButton.setAttribute('aria-expanded', String(open));
      menuButton.setAttribute('aria-label', open ? menuButton.dataset.closeLabel : menuButton.dataset.openLabel);
      const icon = menuButton.querySelector('i');
      if (icon) icon.className = open ? 'bi bi-x-lg' : 'bi bi-list';
    };
    menuButton.addEventListener('click', () => setMenu(menuButton.getAttribute('aria-expanded') !== 'true'));
    menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenu(false)));
    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && menu.classList.contains('open')) {
        setMenu(false);
        menuButton.focus();
      }
    });
    window.addEventListener('resize', () => {
      if (window.innerWidth > 880) setMenu(false);
    });
  }

  const revealItems = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const observer = new IntersectionObserver((entries, instance) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          instance.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -36px 0px' });
    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
  }

  const backToTop = document.querySelector('.back-to-top');
  if (backToTop) {
    const updateBackToTop = () => backToTop.classList.toggle('visible', window.scrollY > 420);
    window.addEventListener('scroll', updateBackToTop, { passive: true });
    updateBackToTop();
    backToTop.addEventListener('click', (event) => {
      event.preventDefault();
      window.scrollTo({ top: 0, behavior: root.classList.contains('reduce-motion') ? 'auto' : 'smooth' });
    });
  }

  const contactForm = document.querySelector('#contact-form');
  if (contactForm) {
    const status = document.querySelector('#form-status');
    const fields = Array.from(contactForm.querySelectorAll('input[required], textarea[required]'));
    const updateField = (field) => {
      const invalid = !field.validity.valid;
      field.classList.toggle('is-invalid', invalid && (field.dataset.touched === 'true' || contactForm.dataset.submitted === 'true'));
      field.setAttribute('aria-invalid', String(invalid && field.classList.contains('is-invalid')));
    };
    fields.forEach((field) => {
      field.addEventListener('blur', () => {
        field.dataset.touched = 'true';
        updateField(field);
      });
      field.addEventListener('input', () => updateField(field));
    });
    contactForm.addEventListener('submit', (event) => {
      contactForm.dataset.submitted = 'true';
      fields.forEach(updateField);
      if (!contactForm.checkValidity()) {
        event.preventDefault();
        if (status) {
          status.hidden = false;
          status.textContent = contactForm.dataset.messageInvalid || '';
        }
        const firstInvalid = fields.find((field) => !field.validity.valid);
        if (firstInvalid) firstInvalid.focus();
      }
    });
  }
})();
