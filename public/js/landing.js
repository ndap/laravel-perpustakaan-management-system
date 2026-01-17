// Landing Page Interactive Scripts

document.addEventListener('DOMContentLoaded', function() {
  
  // Mobile Menu Toggle
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  
  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', function() {
      mobileMenu.classList.toggle('active');
      
      // Toggle icon
      const icon = this.querySelector('svg');
      if (mobileMenu.classList.contains('active')) {
        icon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        `;
      } else {
        icon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        `;
      }
    });
  }
  
  // Navbar Scroll Effect
  const navbar = document.getElementById('navbar');
  let lastScroll = 0;
  
  window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 50) {
      navbar.classList.add('navbar-blur', 'shadow-md');
      navbar.classList.add('bg-white/95');
    } else {
      navbar.classList.remove('navbar-blur', 'shadow-md');
      navbar.classList.remove('bg-white/95');
    }
    
    lastScroll = currentScroll;
  });
  
  // Smooth Scroll for Navigation Links
  const navLinks = document.querySelectorAll('a[href^="#"]');
  
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      if (href !== '#' && href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        
        if (target) {
          const offsetTop = target.offsetTop - 80; // Account for fixed navbar
          window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
          });
          
          // Close mobile menu if open
          if (mobileMenu && mobileMenu.classList.contains('active')) {
            mobileMenu.classList.remove('active');
            const icon = mobileMenuBtn.querySelector('svg');
            icon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            `;
          }
        }
      }
    });
  });
  
  // Book Card Interaction - Add subtle tilt effect on hover (optional, minimal)
  const bookCards = document.querySelectorAll('.book-card');
  
  bookCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-8px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });
  
  // CTA Button Click Handler
  const ctaButtons = document.querySelectorAll('[data-cta]');
  
  ctaButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      const action = this.getAttribute('data-cta');
      
      // You can add custom logic here based on the CTA action
      console.log('CTA clicked:', action);
      
      // Example: Redirect to specific sections or pages
      if (action === 'explore') {
        const booksSection = document.getElementById('koleksi-buku');
        if (booksSection) {
          e.preventDefault();
          booksSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });
  
  // Intersection Observer for Fade In Animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in-up');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  // Observe elements for animation
  const animateElements = document.querySelectorAll('.animate-on-scroll');
  animateElements.forEach(el => observer.observe(el));
  
});
