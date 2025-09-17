const header = document.querySelector('.site-header');
const menuToggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.site-nav');
const scrollTopButton = document.querySelector('.scroll-top');
const yearSpan = document.getElementById('year');

const setYear = () => {
  if (yearSpan) {
    yearSpan.textContent = new Date().getFullYear();
  }
};

const toggleMenu = () => {
  const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
  menuToggle.setAttribute('aria-expanded', !expanded);
  nav.classList.toggle('open', !expanded);
  document.body.classList.toggle('nav-open', !expanded);
};

const closeMenuOnLink = (event) => {
  if (event.target.closest('a')) {
    menuToggle.setAttribute('aria-expanded', 'false');
    nav.classList.remove('open');
    document.body.classList.remove('nav-open');
  }
};

const handleScroll = () => {
  const scrolled = window.scrollY > 10;
  header.classList.toggle('scrolled', scrolled);
  scrollTopButton.classList.toggle('visible', window.scrollY > 400);
};

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

const initObserver = () => {
  if (!('IntersectionObserver' in window)) {
    return;
  }

  const sections = document.querySelectorAll('section[id]');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const id = entry.target.getAttribute('id');
        const link = document.querySelector(`.site-nav a[href="#${id}"]`);
        if (!link) return;
        if (entry.isIntersecting) {
          document.querySelectorAll('.site-nav a').forEach((anchor) => anchor.classList.remove('active'));
          link.classList.add('active');
        }
      });
    },
    {
      rootMargin: '-45% 0px -45% 0px',
      threshold: 0.1,
    }
  );

  sections.forEach((section) => observer.observe(section));
};

const init = () => {
  setYear();
  handleScroll();
  initObserver();

  window.addEventListener('scroll', handleScroll, { passive: true });
  menuToggle.addEventListener('click', toggleMenu);
  nav.addEventListener('click', closeMenuOnLink);
  scrollTopButton.addEventListener('click', scrollToTop);
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
