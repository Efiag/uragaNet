const dots = document.querySelectorAll('.dot');
const heroVideo = document.getElementById('heroVideo');
const hero = document.getElementById('hero');
const title = document.querySelector('.descri h1');
const desc = document.querySelector('.descri p');

dots.forEach(dot => {
  dot.addEventListener('click', () => {
    // Remove active from all dots
    dots.forEach(d => d.classList.remove('active'));
    dot.classList.add('active');

    // Change hero background/video
    const bg = dot.getAttribute('data-bg');
    heroVideo.pause();
    heroVideo.src = bg; // replace video with image if needed
    heroVideo.load();
    heroVideo.play();

    // Update text
    title.textContent = dot.getAttribute('data-title');
    desc.textContent = dot.getAttribute('data-desc');
  });
});



  // Initialize ScrollReveal

  const sr = ScrollReveal ({
    distance: '65px',
    duration: 2600,
    delay: 450,
    reset: true
});

  sr.reveal('.fan-wrapper',{delay: 450, origin: 'right'});
  sr.reveal('.mission-visiont', { origin: 'bottom', delay: 300 });
  sr.reveal('.image-selectors img', { interval: 150, scale: 0.8 });



  sr.reveal('.company-description .image', { origin: 'left', delay: 300 });
  sr.reveal('.company-description .text-content', { origin: 'right', delay: 300 });

  // Products Section
  sr.reveal('.products h2', { origin: 'top', delay: 300 });
  sr.reveal('.product-cards .card', { interval: 150, scale: 0.9 });

  // Why Choose Us & Origins
  sr.reveal('.why-and-origins .why-choose', { origin: 'left', delay: 300 });
  sr.reveal('.why-and-origins .origins', { origin: 'right', delay: 300 });

  // Mission & Vision
  sr.reveal('.mission-vision .mission-text', { origin: 'bottom', delay: 300 });
  sr.reveal('.goals-cards .goal-card', { interval: 150, scale: 0.9 });

  // Founders Section
  sr.reveal('.founders h2', { origin: 'top', delay: 300 });
  sr.reveal('.founder-container .founder', { interval: 150, scale: 0.9 });

  // Footer
  sr.reveal('.footer-content .footer-column', { interval: 150, scale: 0.9 });
  sr.reveal('.footer-bottom', { origin: 'bottom', delay: 300 });
 
  function toggleMenu() {
    document.querySelector(".nav-links").classList.toggle("active");
}



// Reveal on scroll (banner, cards, etc.)
(function(){
  const targets = document.querySelectorAll('.animate-on-scroll, .p-card, .i-card, .f-card, .tl-item');
  if(!targets.length) return;

  const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if(!('IntersectionObserver' in window) || prefersReduced){
    targets.forEach(el => el.classList.add('show'));
    return;
  }

  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add('show');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.15 });

  targets.forEach(el => io.observe(el));
})();

// Animated counters
(function(){
  const nums = document.querySelectorAll('.stat .num');
  if(!nums.length) return;

  const animate = (el) => {
    const target = parseInt(el.dataset.target, 10) || 0;
    const dur = 1400; // ms
    const start = performance.now();
    const step = (now) => {
      const p = Math.min(1, (now - start) / dur);
      const eased = 1 - Math.pow(1 - p, 3); // easeOutCubic
      el.textContent = Math.floor(eased * target);
      if(p < 1) requestAnimationFrame(step);
      else el.textContent = target;
    };
    requestAnimationFrame(step);
  };

  // Trigger counters when stats appear
  const section = document.querySelector('.stats');
  if(!section){ nums.forEach(animate); return; }

  const obs = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        nums.forEach(animate);
        obs.disconnect();
      }
    });
  }, { threshold: 0.25 });

  obs.observe(section);
})();
