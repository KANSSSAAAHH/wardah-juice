// Mobile nav toggle
  const burgerBtn = document.getElementById('burgerBtn');
  const navLinks = document.getElementById('navLinks');
  burgerBtn.addEventListener('click', () => navLinks.classList.toggle('open'));
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));

  // Footer year
  document.getElementById('year').textContent = new Date().getFullYear();

  // ===== HELPER =====
  function slugify(str){
    return str.toLowerCase().replace(/[^a-z0-9]+/g,'-').replace(/(^-|-$)/g,'');
  }
  function formatRp(n){ return 'Rp ' + n.toLocaleString('id-ID'); }

  // slug produk = dipakai untuk link ke detail-produk.blade.php DAN untuk nama file foto (kecuali di-override)
  function makeProduct(name, price, category, imgOverride){
    const slug = slugify(name);
    return { name, price, category, slug, img: imgOverride || `images/${slug}.png` };
  }

const anekaJus = [
  makeProduct('Jus Apukat',    10000, 'aneka-jus', 'images/jusapukat.png'),
  makeProduct('Jus Jambu',      10000, 'aneka-jus', 'images/jusjambu.png'),
  makeProduct('Jus Nanas',      10000, 'aneka-jus', 'images/jusnanas.png'),
  makeProduct('Jus Nangka',     10000, 'aneka-jus', 'images/jusnangka.png'),
  makeProduct('Jus Semangka',   10000, 'aneka-jus', 'images/jussemangka.png'),
  makeProduct('Jus Durian',     10000, 'aneka-jus', 'images/jusdurian.png'),
  makeProduct('Jus Blimbing',   10000, 'aneka-jus', 'images/jusbelimbing.png'),
  makeProduct('Jus Melon',      10000, 'aneka-jus', 'images/jus melon.png'),
  makeProduct('Es Jeruk',       10000, 'aneka-jus', 'images/jusjeruk.png'),
  makeProduct('Jus Strawberry', 10000, 'aneka-jus', 'images/jusstoberi.png'),
  makeProduct('Jus Sirsak',     10000, 'aneka-jus', 'images/jussirsak.png'),
  makeProduct('Jus Wortel',     10000, 'aneka-jus', 'images/juswortel.png'),
  makeProduct('Jus Tomat',      10000, 'aneka-jus', 'images/justomat.png'),
  makeProduct('Jus Mentimun',   10000, 'aneka-jus', 'images/justimun.png'),
  makeProduct('Jus Mangga',     10000, 'aneka-jus', 'images/jusmangga.png'),
];

  // Produk dengan foto yang sudah ada di folder images/ (nama file lama, tanpa tanda hubung)
  const esTeler = [ makeProduct('Es Teler', 10000, 'es-teler', 'images/esteler.png') ];
  const sopBuah = [ makeProduct('Sop Buah', 10000, 'sop-buah', 'images/sopbuah.png') ];

  // Kategori baru — harga masih perkiraan, silakan sesuaikan. Foto: images/es-campur.png, images/es-teh.png
const esCampur = [ makeProduct('Es Campur', 10000, 'es-campur', 'images/escampur.png') ];
const esTeh   = [ makeProduct('Es Teh', 3000, 'es-teh', 'images/teh1.png') ];

// Flavor Series — direvisi sesuai catatan: 4 rasa
const flavorSeries = [
  makeProduct('Coklat Silver', 12000, 'flavor-series', 'images/escoklat.png'),
  makeProduct('Redvelvet',     12000, 'flavor-series', 'images/esredvelvet.png'),
  makeProduct('Matcha',        12000, 'flavor-series', 'images/esmatcha.png'),
  makeProduct('Black Forest',  12000, 'flavor-series', 'images/blackforiest.png'),
];

  // Daftar topping khusus Flavor Series
  const toppingOptions = ['Crumble Redvelvet', 'Crumble Matcha', 'Oreo'];

  // ===== RENDER PRODUCT GRID =====
  // Flavor Series: kartu membuka modal pilih topping.
  // Kategori lain: kartu tetap link ke halaman detail-produk.
  function renderGrid(gridId, items){
    const grid = document.getElementById(gridId);
    grid.innerHTML = items.map(item => {
      if(item.category === 'flavor-series'){
        return `
          <div class="product-card sortable-item" data-name="${item.name}" data-price="${item.price}"
               onclick='openToppingModal(${JSON.stringify(item)})'>
            <div class="thumb"><img src="${item.img}" alt="${item.name}"></div>
            <div class="product-info">
              <h4>${item.name}</h4>
              <span class="price">${formatRp(item.price)}</span>
              <span class="topping-hint">+ Pilih Topping</span>
            </div>
          </div>
        `;
      }
      const params = new URLSearchParams({
        produk: item.slug,
        nama: item.name,
        harga: item.price,
        gambar: item.img,
        kategori: item.category
      });
      const detailUrl = `/detail-produk?${params.toString()}`;
      return `
        <a href="${detailUrl}" class="product-card sortable-item" data-name="${item.name}" data-price="${item.price}">
          <div class="thumb"><img src="${item.img}" alt="${item.name}"></div>
          <div class="product-info">
            <h4>${item.name}</h4>
            <span class="price">${formatRp(item.price)}</span>
            <span class="detail-link">Lihat Detail →</span>
          </div>
        </a>
      `;
    }).join('');
  }

  renderGrid('grid-aneka-jus', anekaJus);
  renderGrid('grid-es-teler', esTeler);
  renderGrid('grid-sop-buah', sopBuah);
  renderGrid('grid-es-campur', esCampur);
  renderGrid('grid-es-teh', esTeh);
  renderGrid('grid-flavor-series', flavorSeries);

  // ===== TOPPING MODAL LOGIC =====
  const toppingOverlay = document.getElementById('toppingOverlay');
  const toppingModalImg = document.getElementById('toppingModalImg');
  const toppingModalName = document.getElementById('toppingModalName');
  const toppingModalPrice = document.getElementById('toppingModalPrice');
  const toppingList = document.getElementById('toppingList');
  const toppingOrderBtn = document.getElementById('toppingOrderBtn');
  const toppingModalClose = document.getElementById('toppingModalClose');
  let currentFlavorItem = null;

  function openToppingModal(item){
    currentFlavorItem = item;
    toppingModalImg.src = item.img;
    toppingModalImg.alt = item.name;
    toppingModalName.textContent = item.name;
    toppingModalPrice.textContent = formatRp(item.price);

    toppingList.innerHTML = toppingOptions.map((t, i) => `
      <label class="topping-option" for="topping-${i}">
        <input type="checkbox" id="topping-${i}" value="${t}">
        <span>${t}</span>
      </label>
    `).join('');

    // toggle style saat dicentang
    toppingList.querySelectorAll('.topping-option').forEach(opt => {
      const cb = opt.querySelector('input');
      cb.addEventListener('change', () => opt.classList.toggle('checked', cb.checked));
    });

    toppingOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeToppingModal(){
    toppingOverlay.classList.remove('open');
    document.body.style.overflow = '';
    currentFlavorItem = null;
  }

  toppingModalClose.addEventListener('click', closeToppingModal);
  toppingOverlay.addEventListener('click', (e) => {
    if(e.target === toppingOverlay) closeToppingModal();
  });
  document.addEventListener('keydown', (e) => {
    if(e.key === 'Escape' && toppingOverlay.classList.contains('open')) closeToppingModal();
  });

  toppingOrderBtn.addEventListener('click', () => {
    if(!currentFlavorItem) return;
    const selected = Array.from(toppingList.querySelectorAll('input:checked')).map(cb => cb.value);

    let text = `Halo Wardah Juice, saya ingin memesan:%0A`;
    text += `Menu: ${currentFlavorItem.name} (Flavor Series)%0A`;
    text += `Harga: ${formatRp(currentFlavorItem.price)}%0A`;
    text += selected.length ? `Topping: ${selected.join(', ')}` : `Topping: Tanpa topping`;

    window.open(`https://wa.me/6283892606102?text=${text}`, '_blank');
    closeToppingModal();
  });

  // ===== FILTER KATEGORI (pill) =====
  const pillRow = document.getElementById('pillRow');
  const catSections = document.querySelectorAll('.cat-section');

  function setCategory(cat){
    pillRow.querySelectorAll('.pill').forEach(p => p.classList.toggle('active', p.dataset.cat === cat));
    catSections.forEach(sec => {
      sec.style.display = (cat === 'semua' || sec.dataset.category === cat) ? '' : 'none';
    });
  }
  pillRow.querySelectorAll('.pill').forEach(p => {
    p.addEventListener('click', () => setCategory(p.dataset.cat));
  });

  // "Lihat Semua" per section -> filter ke kategori itu
  document.querySelectorAll('[data-goto]').forEach(link => {
    link.addEventListener('click', () => {
      const cat = link.dataset.goto;
      setCategory(cat);
      document.getElementById('cat-' + cat).scrollIntoView({ behavior:'smooth', block:'start' });
    });
  });

  // ===== SEARCH (nama produk) =====
  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('input', () => {
    const q = searchInput.value.trim().toLowerCase();
    document.querySelectorAll('.sortable-item').forEach(el => {
      const name = el.dataset.name.toLowerCase();
      el.style.display = name.includes(q) ? '' : 'none';
    });
  });