const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initHeaderScrollState();
    initScrollProgress();
    initRevealAnimations();
    initCounters();
    initHeroParallax();
    initContactForm();
});

function initMobileMenu() {
    const toggle = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');

    if (!toggle || !menu) return;

    toggle.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('flex');
        menu.classList.toggle('hidden', !isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        toggle.classList.toggle('is-open', isOpen);
    });
}

function initHeaderScrollState() {
    const header = document.querySelector('[data-site-header]');
    if (!header) return;

    const update = () => header.classList.toggle('is-scrolled', window.scrollY > 12);
    update();
    window.addEventListener('scroll', update, { passive: true });
}

function initScrollProgress() {
    const bar = document.querySelector('[data-scroll-progress]');
    if (!bar) return;

    let ticking = false;

    const update = () => {
        const scrollTop = window.scrollY;
        const height = document.documentElement.scrollHeight - window.innerHeight;
        const progress = height > 0 ? (scrollTop / height) * 100 : 0;
        bar.style.width = `${Math.min(progress, 100)}%`;
        ticking = false;
    };

    const onScroll = () => {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    };

    update();
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', update);
}

function initRevealAnimations() {
    const elements = document.querySelectorAll('[data-reveal]');
    if (!elements.length) return;

    if (prefersReducedMotion) {
        elements.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    elements.forEach((el) => {
        if (el.dataset.revealDelay) {
            el.style.setProperty('--reveal-delay', `${el.dataset.revealDelay}ms`);
        }
    });

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -60px 0px' }
    );

    elements.forEach((el) => observer.observe(el));
}

function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    const animate = (el) => {
        const target = parseFloat(el.dataset.counter);
        const suffix = el.dataset.counterSuffix || '';

        if (prefersReducedMotion || Number.isNaN(target)) {
            el.textContent = `${target}${suffix}`;
            return;
        }

        const duration = 1500;
        const start = performance.now();

        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const value = Math.round(target * eased);
            el.textContent = `${value}${suffix}`;
            if (progress < 1) requestAnimationFrame(step);
        };

        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.6 }
    );

    counters.forEach((el) => observer.observe(el));
}

function initContactForm() {
    const form = document.querySelector('[data-contact-form]');
    const feedback = document.querySelector('[data-form-feedback]');
    if (!form || !feedback) return;

    const submitButton = form.querySelector('button[type="submit"]');
    const submitLabel = submitButton ? submitButton.textContent : '';

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = 'Versturen…';
        }

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: { Accept: 'application/json' },
                body: new FormData(form),
            });

            const data = await response.json().catch(() => ({}));

            if (response.ok) {
                feedback.innerHTML = renderFeedback(
                    'success',
                    data.message || 'Bedankt voor uw bericht. Wij nemen zo spoedig mogelijk contact met u op.'
                );
                form.reset();
            } else if (response.status === 422 && data.errors) {
                feedback.innerHTML = renderFeedback('error', null, Object.values(data.errors).flat());
            } else {
                feedback.innerHTML = renderFeedback('error', 'Er ging iets mis bij het versturen. Probeer het later opnieuw.');
            }

            feedback.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'center' });
        } catch {
            feedback.innerHTML = renderFeedback('error', 'Er ging iets mis bij het versturen. Controleer uw internetverbinding en probeer het opnieuw.');
        } finally {
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = submitLabel;
            }
        }
    });
}

function renderFeedback(kind, message, errorList) {
    if (kind === 'success') {
        return `<div class="animate-fade-in-down mb-6 rounded-xl border border-brand-300 bg-brand-50 px-5 py-4 text-sm text-brand-800">${message}</div>`;
    }

    if (errorList && errorList.length) {
        const items = errorList.map((error) => `<li>${error}</li>`).join('');
        return `<div class="animate-fade-in-down mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700"><p class="font-semibold">Controleer de volgende velden:</p><ul class="mt-2 list-inside list-disc space-y-1">${items}</ul></div>`;
    }

    return `<div class="animate-fade-in-down mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">${message}</div>`;
}

function initHeroParallax() {
    if (prefersReducedMotion) return;
    if (!window.matchMedia('(pointer: fine)').matches) return;

    const hero = document.querySelector('[data-parallax-hero]');
    if (!hero) return;

    const layers = hero.querySelectorAll('[data-parallax-layer]');
    if (!layers.length) return;

    hero.addEventListener('mousemove', (event) => {
        const rect = hero.getBoundingClientRect();
        const x = (event.clientX - rect.left) / rect.width - 0.5;
        const y = (event.clientY - rect.top) / rect.height - 0.5;

        layers.forEach((layer) => {
            const strength = parseFloat(layer.dataset.parallaxLayer) || 10;
            layer.style.transform = `translate3d(${x * strength}px, ${y * strength}px, 0)`;
        });
    });

    hero.addEventListener('mouseleave', () => {
        layers.forEach((layer) => {
            layer.style.transform = 'translate3d(0, 0, 0)';
        });
    });
}
