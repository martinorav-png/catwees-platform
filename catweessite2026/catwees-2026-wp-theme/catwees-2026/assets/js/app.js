/* ── PAGE ROUTER ── */
  function showPage(id) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('nav a').forEach(a => a.classList.remove('active'));

    const page = document.getElementById('page-' + id);
    if (page) {
      page.classList.add('active');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    const navLink = document.querySelector('nav a[data-page="' + id + '"]');
    if (navLink) navLink.classList.add('active');
  }

  /* ── HERO DECISION MENUS ── */
  const heroDecision = document.querySelector('.hero-decision');
  if (heroDecision) {
    heroDecision.addEventListener('click', function(e) {
      const choice = e.target.closest('[data-hero-menu]');
      if (!choice) return;

      const target = choice.dataset.heroMenu;
      this.querySelectorAll('[data-hero-menu]').forEach(btn => {
        const active = btn === choice;
        btn.classList.toggle('is-active', active);
        btn.setAttribute('aria-selected', active ? 'true' : 'false');
      });
      this.querySelectorAll('[data-hero-panel]').forEach(panel => {
        panel.classList.toggle('is-active', panel.dataset.heroPanel === target);
      });
    });
  }

  /* ── HERO IMAGE ROTATION ── */
  const heroSlide = document.querySelector('[data-hero-slideshow]');
  const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (heroSlide && !reduceMotion) {
    const heroSlides = [
      'hero-crv-2026.jpg',
      'honda-hero-crv.jpg',
      'honda-hero-zrv.jpg',
      'honda-hero-hrv.jpg',
      'honda-hero-jazz.jpg'
    ].map(src => (window.catweesTheme ? window.catweesTheme.assetsUrl : '') + src);
    const heroPreloads = heroSlides.map(src => {
      const img = new Image();
      img.src = src;
      return img;
    });

    let heroSlideIndex = 0;
    let heroSlideBusy = false;

    async function advanceHeroSlide() {
      if (heroSlideBusy) return;
      heroSlideBusy = true;
      heroSlideIndex = (heroSlideIndex + 1) % heroSlides.length;
      const preload = heroPreloads[heroSlideIndex];
      if (preload && preload.decode) {
        try { await preload.decode(); } catch (e) {}
      }

      heroSlide.classList.add('is-panning');
      window.setTimeout(() => {
        heroSlide.classList.add('is-loading-next');
        heroSlide.src = heroSlides[heroSlideIndex];
        heroSlide.classList.remove('is-panning');
        window.setTimeout(() => {
          heroSlide.classList.remove('is-loading-next');
        }, 120);
        heroSlideBusy = false;
      }, 1040);
    }

    setInterval(advanceHeroSlide, 5200);
  }

  /* ── HOME FILTER TABS ── */
  const filterTabs = document.getElementById('home-filter-tabs');
  if (filterTabs) {
    filterTabs.addEventListener('click', function(e) {
      const tab = e.target.closest('.filter-tab');
      if (!tab) return;
      this.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const filter = tab.dataset.filter;
      const cards = document.querySelectorAll('#home-models-grid .car-card');
      let visible = 0;
      cards.forEach(card => {
        const cats = (card.dataset.categories || '').split(' ');
        const show = filter === 'all' || cats.includes(filter);
        card.classList.toggle('hidden', !show);
        if (show) visible++;
      });
      const countTag = document.getElementById('model-count');
      if (countTag) countTag.textContent = visible;
    });
  }

  /* ── TIMELINE INTERSECTIONOBSERVER ── */
  document.querySelectorAll('[data-card-filter]').forEach(filterBar => {
    const filterName = filterBar.dataset.cardFilter;
    const grid = document.querySelector('[data-filter-grid="' + filterName + '"]');
    const empty = document.querySelector('[data-filter-empty="' + filterName + '"]');
    if (!grid) return;

    function applyCardFilters() {
      const selected = {};
      filterBar.querySelectorAll('[data-filter-field]').forEach(field => {
        selected[field.dataset.filterField] = field.value;
      });

      let visible = 0;
      grid.querySelectorAll('.car-card').forEach(card => {
        const matches = Object.entries(selected).every(([key, value]) => {
          if (!value || value === 'all') return true;
          if (key === 'price') return Number(card.dataset.price || 0) <= Number(value);
          return card.dataset[key] === value;
        });
        card.classList.toggle('hidden', !matches);
        if (matches) visible++;
      });

      if (empty) empty.classList.toggle('is-visible', visible === 0);
    }

    filterBar.addEventListener('change', applyCardFilters);
    filterBar.addEventListener('click', function(e) {
      if (!e.target.closest('[data-filter-submit]')) return;
      applyCardFilters();
    });
  });

  const timeline = document.getElementById('timeline-home');
  if (timeline) {
    new IntersectionObserver((entries, obs) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.25 }).observe(timeline);
  }

  /* ── SERVICE TYPE SELECTOR ── */
  function selectBookingService(service) {
    if (!service) return;

    document.querySelectorAll('[data-booking-service]').forEach(item => {
      const active = item.dataset.bookingService === service;
      item.classList.toggle('is-selected', active);
      item.setAttribute('aria-pressed', active ? 'true' : 'false');
    });

    document.querySelectorAll('.service-type-btn[data-service-type]').forEach(btn => {
      btn.classList.toggle('selected', btn.dataset.serviceType === service);
    });
  }

  const bookingServiceList = document.querySelector('.booking-left');
  if (bookingServiceList) {
    bookingServiceList.addEventListener('click', function(e) {
      const item = e.target.closest('[data-booking-service]');
      if (!item) return;
      selectBookingService(item.dataset.bookingService);
    });

    bookingServiceList.addEventListener('keydown', function(e) {
      if (e.key !== 'Enter' && e.key !== ' ') return;
      const item = e.target.closest('[data-booking-service]');
      if (!item) return;
      e.preventDefault();
      selectBookingService(item.dataset.bookingService);
    });
  }

  document.querySelectorAll('.service-types-swiss').forEach(group => {
    group.addEventListener('click', function(e) {
      const btn = e.target.closest('.service-type-btn');
      if (!btn) return;
      selectBookingService(btn.dataset.serviceType);
    });
  });
