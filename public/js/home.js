// Mobile nav toggle
  const burgerBtn = document.getElementById('burgerBtn');
  const navLinks = document.getElementById('navLinks');
  burgerBtn.addEventListener('click', () => navLinks.classList.toggle('open'));
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));

  // Video — plays automatically once scrolled into view, pauses when scrolled away
// Photo slider — ganti foto tiap 1.8 detik
const slides = document.querySelectorAll('#photoSlider .photo-slide');
let slideIndex = 0;
setInterval(() => {
  slides[slideIndex].classList.remove('active');
  slideIndex = (slideIndex + 1) % slides.length;
  slides[slideIndex].classList.add('active');
}, 1800);

  // Footer year
  document.getElementById('year').textContent = new Date().getFullYear();

  // ===== Looping typewriter (hero highlight line) =====
  function initLoopTyper(el){
    let phrases;
    try{ phrases = JSON.parse(el.dataset.phrases); }catch(e){ return; }
    if(!phrases || !phrases.length) return;
    let phraseIndex = 0, charIndex = 0, deleting = false;
    function tick(){
      const current = phrases[phraseIndex];
      if(!deleting){
        charIndex++;
        el.textContent = current.slice(0, charIndex);
        if(charIndex === current.length){
          deleting = true;
          setTimeout(tick, 1500);
          return;
        }
      } else {
        charIndex--;
        el.textContent = current.slice(0, charIndex);
        if(charIndex === 0){
          deleting = false;
          phraseIndex = (phraseIndex + 1) % phrases.length;
        }
      }
      setTimeout(tick, deleting ? 30 : 65);
    }
    tick();
  }

  // ===== Typewriter that retypes every time it scrolls into view =====
  function initRepeatTyper(el){
    const text = el.dataset.text || el.textContent.trim();
    el.dataset.text = text;
    let timer = null;
    let i = 0;
    function typeTick(){
      i++;
      el.textContent = text.slice(0, i);
      if(i < text.length) timer = setTimeout(typeTick, 35);
    }
    const obs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        clearTimeout(timer);
        if(entry.isIntersecting){
          i = 0;
          el.textContent = '';
          typeTick();
        }
      });
    }, { threshold: 0.4 });
    obs.observe(el);
  }

  document.querySelectorAll('.type-loop').forEach(initLoopTyper);
  document.querySelectorAll('.type-once').forEach(initRepeatTyper);