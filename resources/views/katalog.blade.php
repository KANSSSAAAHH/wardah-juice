<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Katalog - Wardah Juice</title>
<link rel="stylesheet" href="css/katalog.css">
</head>
<body>

<!-- ===== HEADER ===== -->
<header>
  <div class="nav">
    <a href="/" class="logo">Wardah <span>Juice</span></a>
    <nav class="nav-links" id="navLinks">
      <a href="/">Home</a>
      <a href="/about">About</a>
      <a href="/katalog" class="active">Katalog</a>
      <a href="/kontak">Kontak</a>
    </nav>
    <div class="nav-cta">
      <a href="https://wa.me/6283892606102" target="_blank" class="btn btn-primary">Pesan Sekarang</a>
      <button class="burger" id="burgerBtn" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ===== KATALOG HERO ===== -->
<section class="katalog-hero">
  <div class="wrap">
    <div class="katalog-leaf">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 4 13V4a1 1 0 0 1 1-1h9a7 7 0 0 1 7 7v0a10 10 0 0 1-10 10Z"/><path d="M4 13c4-1 8-3 11-9"/></svg>
    </div>
    <h1>Katalog Produk</h1>
    <p>Temukan berbagai pilihan minuman segar terbaik dari Wardah Juice yang dibuat dari bahan berkualitas.</p>

    <div class="pill-row" id="pillRow">
      <button class="pill active" data-cat="semua">Semua</button>
      <button class="pill" data-cat="aneka-jus">Aneka Jus</button>
      <button class="pill" data-cat="es-teler">Es Teler</button>
      <button class="pill" data-cat="sop-buah">Sop Buah</button>
      <button class="pill" data-cat="es-campur">Es Campur</button>
      <button class="pill" data-cat="es-teh">Es Teh</button>
      <button class="pill" data-cat="flavor-series">Flavor Series</button>
    </div>

    <div class="search-sort-row">
      <div class="search-box">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" id="searchInput" placeholder="Cari Menu Favoritmu...">
      </div>
    </div>
  </div>
</section>

<!-- ===== ANEKA JUS ===== -->
<section class="cat-section" data-category="aneka-jus" id="cat-aneka-jus">
  <div class="wrap">
    <div class="section-head">
      <h2>Aneka Jus</h2>
      <a data-goto="aneka-jus">Lihat Semua</a>
    </div>
    <div class="product-grid sortable-grid" id="grid-aneka-jus"></div>
  </div>
</section>

<!-- ===== ES TELER ===== -->
<section class="cat-section" data-category="es-teler" id="cat-es-teler">
  <div class="wrap">
    <div class="section-head">
      <h2>Es Teler</h2>
      <a data-goto="es-teler">Lihat Semua</a>
    </div>
    <div class="product-grid sortable-grid" id="grid-es-teler"></div>
  </div>
</section>

<!-- ===== SOP BUAH ===== -->
<section class="cat-section" data-category="sop-buah" id="cat-sop-buah">
  <div class="wrap">
    <div class="section-head">
      <h2>Sop Buah</h2>
      <a data-goto="sop-buah">Lihat Semua</a>
    </div>
    <div class="product-grid sortable-grid" id="grid-sop-buah"></div>
  </div>
</section>

<!-- ===== ES CAMPUR ===== -->
<section class="cat-section" data-category="es-campur" id="cat-es-campur">
  <div class="wrap">
    <div class="section-head">
      <h2>Es Campur</h2>
      <a data-goto="es-campur">Lihat Semua</a>
    </div>
    <div class="product-grid sortable-grid" id="grid-es-campur"></div>
  </div>
</section>

<!-- ===== ES TEH ===== -->
<section class="cat-section" data-category="es-teh" id="cat-es-teh">
  <div class="wrap">
    <div class="section-head">
      <h2>Es Teh</h2>
      <a data-goto="es-teh">Lihat Semua</a>
    </div>
    <div class="product-grid sortable-grid" id="grid-es-teh"></div>
  </div>
</section>

<!-- ===== FLAVOR SERIES ===== -->
<section class="cat-section" data-category="flavor-series" id="cat-flavor-series">
  <div class="wrap">
    <div class="section-head">
      <h2>Flavor Series</h2>
      <a data-goto="flavor-series">Lihat Semua</a>
    </div>
    <div class="product-grid sortable-grid" id="grid-flavor-series"></div>
  </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta">
  <div class="wrap">
    <div class="cta-inner">
      <h3>Segarnya Alami, Nikmatnya <em>Berarti</em></h3>
      <p>Wardah Juice menghadirkan minuman segar dari buah pilihan yang diolah fresh setiap hari.</p>
      <div class="cta-actions">
        <a href="/" class="btn btn-dark">Lihat Menu</a>
        <a href="https://wa.me/6283892606102" target="_blank" class="btn btn-outline">
          <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.31-1.93 1.39-.5.08-1.12.11-1.8-.11-.42-.13-.95-.3-1.64-.6-2.88-1.24-4.76-4.14-4.9-4.34-.14-.2-1.17-1.56-1.17-2.97 0-1.42.74-2.11 1-2.4.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.58.81 2 .88 2.15.07.15.11.33.02.53-.09.2-.14.32-.28.5-.14.17-.29.38-.42.51-.14.14-.28.29-.12.57.16.28.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.14.44.12.6-.07.16-.19.68-.79.86-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.07.11.07.62-.17 1.3Z"/></svg>
          Pesan Sekarang
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer id="kontak">
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="logo">Wardah <span>Juice</span></a>
        <p>Minuman Sehat dari Buah Pilihan, Dibuat Fresh Setiap Hari.</p>
      </div>
      <div class="footer-col">
        <h5>Navigasi</h5>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/about">Tentang Kami</a></li>
          <li><a href="/katalog">Katalog Produk</a></li>
          <li><a href="/kontak">Kontak</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Tersedia di</h5>
        <div class="avail-links">
          <a href="#" target="_blank" rel="noopener">
            <img src="images/gofood.png" alt="GoFood"> GoFood
          </a>
          <a href="#" target="_blank" rel="noopener">
            <img src="images/shopeefood.png" alt="ShopeeFood"> ShopeeFood
          </a>
        </div>
      </div>
      <div class="footer-col">
        <h5>Hubungi Kami</h5>
        <ul class="contact-list">
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>Perumahan kahuripan nirwana village blok D nomor 95</span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.68 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.32 1.85.55 2.81.68A2 2 0 0 1 22 16.92Z"/></svg>
            <a href="https://wa.me/6283892606102" target="_blank">0838-9260-6102</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      &copy; <span id="year"></span> Wardah Juice. All rights reserved.
    </div>
  </div>
</footer>

<!-- ===== WA FLOATING BUTTON ===== -->
<a href="https://wa.me/6283892606102" target="_blank" class="wa-float" aria-label="Chat via WhatsApp">
  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.31-1.93 1.39-.5.08-1.12.11-1.8-.11-.42-.13-.95-.3-1.64-.6-2.88-1.24-4.76-4.14-4.9-4.34-.14-.2-1.17-1.56-1.17-2.97 0-1.42.74-2.11 1-2.4.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.58.81 2 .88 2.15.07.15.11.33.02.53-.09.2-.14.32-.28.5-.14.17-.29.38-.42.51-.14.14-.28.29-.12.57.16.28.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.14.44.12.6-.07.16-.19.68-.79.86-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.07.11.07.62-.17 1.3Z"/></svg>
</a>

<!-- ===== TOPPING MODAL (khusus Flavor Series) ===== -->
<div class="topping-overlay" id="toppingOverlay">
  <div class="topping-modal" role="dialog" aria-modal="true">
    <div class="topping-modal-head" style="position:relative;">
      <img id="toppingModalImg" src="" alt="">
      <div>
        <h3 id="toppingModalName"></h3>
        <span class="price" id="toppingModalPrice"></span>
      </div>
      <button class="topping-modal-close" id="toppingModalClose" aria-label="Tutup">&times;</button>
    </div>
    <div class="topping-modal-body">
      <h5>Pilih Topping (opsional)</h5>
      <div class="topping-list" id="toppingList"></div>
    </div>
    <div class="topping-modal-foot">
      <button class="btn btn-primary" id="toppingOrderBtn">
        <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.31-1.93 1.39-.5.08-1.12.11-1.8-.11-.42-.13-.95-.3-1.64-.6-2.88-1.24-4.76-4.14-4.9-4.34-.14-.2-1.17-1.56-1.17-2.97 0-1.42.74-2.11 1-2.4.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.58.81 2 .88 2.15.07.15.11.33.02.53-.09.2-.14.32-.28.5-.14.17-.29.38-.42.51-.14.14-.28.29-.12.57.16.28.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.14.44.12.6-.07.16-.19.68-.79.86-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.07.11.07.62-.17 1.3Z"/></svg>
        Pesan via WhatsApp
      </button>
      <p class="topping-note">Topping tanpa biaya tambahan. Konfirmasi akhir via WhatsApp.</p>
    </div>
  </div>
</div>

<script src="js/katalog.js"></script>
</body>
</html>