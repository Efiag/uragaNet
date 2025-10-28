/* ========= Helpers ========= */
const $ = (sel, root=document) => root.querySelector(sel);
const $$ = (sel, root=document) => [...root.querySelectorAll(sel)];

/* ========= Scroll reveal (header, filters, items) ========= */
const observer = new IntersectionObserver((entries)=>{
  entries.forEach(e=>{
    if(e.isIntersecting){
      e.target.classList.add('show');
      observer.unobserve(e.target);
    }
  });
},{ threshold: .15 });

$$('.animate-on-scroll').forEach(el=>observer.observe(el));

/* Reveal items gradually for a waterfall feel */
const itemObserver = new IntersectionObserver((entries)=>{
  entries.forEach((e,i)=>{
    if(e.isIntersecting){
      setTimeout(()=> e.target.classList.add('show'), (i%8)*60); // stagger
      itemObserver.unobserve(e.target);
    }
  });
},{ rootMargin: '0px 0px -50px 0px' });

$$('.ug-item').forEach(el=>itemObserver.observe(el));

/* ========= Filters ========= */
const filterButtons = $$('.ug-filters button');
const items = $$('.ug-item');

filterButtons.forEach(btn=>{
  btn.addEventListener('click', ()=>{
    filterButtons.forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    const key = btn.dataset.filter;

    items.forEach(card=>{
      const show = key === '*' || card.classList.contains(key);
      card.classList.toggle('hidden', !show);
    });
  });
});

/* ========= Lightbox ========= */
const lightbox = $('#ugLightbox');
const lbImg   = $('#ugLightboxImg');
const lbCap   = $('#ugLightboxCap');
const closeBtn= $('.ug-close');
const prevBtn = $('.ug-prev');
const nextBtn = $('.ug-next');

let currentIndex = 0;
const visibleItems = () => $$('.ug-item:not(.hidden)');

function openLightbox(idx){
  const list = visibleItems();
  if(!list.length) return;

  currentIndex = (idx+list.length)%list.length;
  const fig = list[currentIndex];
  const img = $('img', fig);

  lbImg.src = img.src;
  lbImg.alt = img.alt || 'Gallery image';
  lbCap.textContent = fig.dataset.caption || img.alt || '';
  lightbox.classList.add('open');
  lightbox.setAttribute('aria-hidden','false');
}

function closeLightbox(){
  lightbox.classList.remove('open');
  lightbox.setAttribute('aria-hidden','true');
  // stop any high-res loading if you implement later
}

function nav(step){
  openLightbox(currentIndex + step);
}

$$('.ug-item').forEach((fig, idx)=>{
  fig.addEventListener('click', ()=> openLightbox(idx));
});

closeBtn.addEventListener('click', closeLightbox);
prevBtn.addEventListener('click', ()=> nav(-1));
nextBtn.addEventListener('click', ()=> nav(1));

/* Keyboard controls */
window.addEventListener('keydown', (e)=>{
  if(!lightbox.classList.contains('open')) return;
  if(e.key === 'Escape') closeLightbox();
  if(e.key === 'ArrowLeft') nav(-1);
  if(e.key === 'ArrowRight') nav(1);
});

/* Close when clicking backdrop (but not image/buttons) */
lightbox.addEventListener('click', (e)=>{
  const isBackdrop = e.target === lightbox || e.target === lbImg || e.target === lbCap;
  if(isBackdrop) closeLightbox();
});
