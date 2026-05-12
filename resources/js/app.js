import './bootstrap';

// ===== Inisialisasi semua library setelah DOM siap =====
function initAll() {

    // ===== AOS Scroll Animation =====
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 700,
            easing: 'ease-out-cubic',
            once: true,
            offset: 60,
            disable: 'mobile'
        });
    } else {
        // Fallback: hapus atribut AOS agar elemen tetap terlihat
        document.querySelectorAll('[data-aos]').forEach(el => {
            el.removeAttribute('data-aos');
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
    }

    // ===== Sticky Navbar =====
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl');
                navbar.style.background = 'linear-gradient(135deg, #14532d 0%, #166534 50%, #15803d 100%)';
            } else {
                navbar.classList.remove('shadow-xl');
                navbar.style.background = '';
            }
        }, { passive: true });
    }

    // ===== Mobile Menu Toggle =====
    const menuBtn   = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            const isOpen = !mobileMenu.classList.contains('hidden');
            menuBtn.setAttribute('aria-expanded', isOpen);
        });
        // Tutup mobile menu saat klik link di dalam menu
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        });
    }

    // ===== Back to Top =====
    const backTop = document.getElementById('back-to-top');
    if (backTop) {
        window.addEventListener('scroll', () => {
            const show = window.scrollY > 400;
            backTop.classList.toggle('opacity-0', !show);
            backTop.classList.toggle('pointer-events-none', !show);
        }, { passive: true });
        backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    // ===== Counter Animation =====
    const counters = document.querySelectorAll('[data-counter]');
    if (counters.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el      = entry.target;
                    const target  = parseInt(el.getAttribute('data-counter'));
                    const duration = 2000;
                    const step    = target / (duration / 16);
                    let current   = 0;
                    const timer   = setInterval(() => {
                        current += step;
                        if (current >= target) { current = target; clearInterval(timer); }
                        el.textContent = Math.floor(current).toLocaleString('id-ID');
                    }, 16);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(el => observer.observe(el));
    }

    // ===== Swiper Hero =====
    if (typeof Swiper !== 'undefined' && document.querySelector('.hero-swiper')) {
        new Swiper('.hero-swiper', {
            loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 800,
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        });
    }

    // ===== GLightbox =====
    if (typeof GLightbox !== 'undefined' && document.querySelector('.glightbox')) {
        GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });
    }

    // ===== Auto-dismiss alerts =====
    document.querySelectorAll('.auto-dismiss').forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });

    // ===== Smooth scroll untuk anchor links =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

// Jalankan setelah DOM dan semua script tersedia
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
} else {
    // DOM sudah siap (karena script type=module defer)
    initAll();
}
