// Mobile nav toggle
  const burgerBtn = document.getElementById('burgerBtn');
  const navLinks = document.getElementById('navLinks');
  burgerBtn.addEventListener('click', () => navLinks.classList.toggle('open'));
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));

  // Footer year
  document.getElementById('year').textContent = new Date().getFullYear();

  // Quote banner slider — ganti foto tiap 1.8 detik (16.png - 20.png)
  const quoteSlides = document.querySelectorAll('#quoteSlider .quote-slide');
  let quoteIndex = 0;
  if (quoteSlides.length > 0) {
    setInterval(() => {
      quoteSlides[quoteIndex].classList.remove('active');
      quoteIndex = (quoteIndex + 1) % quoteSlides.length;
      quoteSlides[quoteIndex].classList.add('active');
    }, 1800);
  }