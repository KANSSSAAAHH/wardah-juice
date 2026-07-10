<?php
    $nama     = request('nama', 'Produk');
    $harga    = request('harga', 0);
    $gambar   = request('gambar', 'images/default.png');
    $kategori = request('kategori', '');
    $slug     = request('produk', '');

    $waNumber = '6283892606102';
    $waText   = 'Halo, saya ingin pesan ' . $nama . ' (Rp ' . number_format($harga, 0, ',', '.') . ')';

    // Checklist deskripsi disesuaikan per kategori
    $checklistByCategory = [
        'aneka-jus' => [
            'Dibuat dari buah segar pilihan',
            'Tanpa pengawet & pemanis buatan',
            'Fresh diblender saat dipesan',
            'Kaya vitamin & menyehatkan',
        ],
        'es-teler' => [
            'Fresh dibuat saat dipesan',
            'Alpukat, kelapa muda & nangka pilihan',
            'Susu & sirup berkualitas',
            'Higienis & terjaga kebersihannya',
        ],
        'sop-buah' => [
            'Buah segar potong pilihan',
            'Kuah sop yang menyegarkan',
            'Fresh dibuat saat dipesan',
            'Higienis & terjaga kebersihannya',
        ],
        'es-campur' => [
            'Aneka topping pilihan',
            'Es serut halus & segar',
            'Fresh dibuat saat dipesan',
            'Higienis & terjaga kebersihannya',
        ],
        'es-teh' => [
            'Diseduh dari teh berkualitas',
            'Racikan gula pas, segar & tidak eneg',
            'Disajikan dingin saat dipesan',
            'Higienis & terjaga kebersihannya',
        ],
        'flavor-series' => [
            'Rasa premium favorit',
            'Bisa tambah topping kesukaanmu',
            'Fresh dibuat saat dipesan',
            'Higienis & terjaga kebersihannya',
        ],
    ];

    // Default fallback kalau kategori tidak dikenali
    $defaultChecklist = [
        'Fresh dibuat saat dipesan',
        'Tanpa pengawet',
        'Bahan pilihan berkualitas',
        'Higienis & terjaga kebersihannya',
    ];

    $checklist = $checklistByCategory[$kategori] ?? $defaultChecklist;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $nama }} - Wardah Juice</title>
<style>
  :root{
    --green-900:#123317;
    --green-800:#164d20;
    --green-700:#1f6b2a;
    --green-600:#2f8c3a;
    --green-500:#3fa34a;
    --green-100:#eaf7e6;
    --green-050:#f5fbf3;
    --cream:#fffdf8;
    --ink:#16241a;
    --ink-soft:#5b6b5e;
    --line:#e3ede1;
    --gold:#e8b64b;
    --radius-lg:22px;
    --radius-md:14px;
    --shadow-soft:0 12px 30px -14px rgba(18,51,23,.25);
    --font-display:'Fredoka', 'Poppins', sans-serif;
    --font-body:'Inter', sans-serif;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  html{scroll-behavior:smooth;}
  body{ font-family:var(--font-body); color:var(--ink); background:var(--cream); overflow-x:hidden; }
  img{max-width:100%; display:block;}
  a{text-decoration:none; color:inherit;}
  ul{list-style:none;}
  .wrap{max-width:1400px; margin:0 auto; padding:0 40px;}
  .btn{
    display:inline-flex; align-items:center; justify-content:center; gap:8px;
    font-family:var(--font-display); font-weight:600; font-size:15px;
    padding:14px 26px; border-radius:999px; border:2px solid transparent;
    cursor:pointer; transition:transform .18s ease, box-shadow .18s ease, background .18s ease;
    white-space:nowrap;
  }
  .btn-primary{
    background:linear-gradient(135deg, var(--green-700) 0%, var(--green-900) 100%);
    color:#fff; box-shadow:0 10px 22px -8px rgba(18,51,23,.5);
  }
  .btn-primary:hover{ transform:translateY(-2px); background:linear-gradient(135deg, var(--green-800) 0%, var(--green-900) 100%); }
  .btn-outline{background:#fff; color:var(--green-700); border-color:var(--green-600);}
  .btn-outline:hover{background:var(--green-050); transform:translateY(-2px);}
  .btn-dark{
    background:linear-gradient(135deg, var(--green-700) 0%, var(--green-900) 100%);
    color:#fff; border-color:var(--green-800); box-shadow:0 10px 22px -8px rgba(18,51,23,.5);
  }
  .btn-dark:hover{ background:linear-gradient(135deg, var(--green-800) 0%, var(--green-900) 100%); transform:translateY(-2px); }
  .btn-full{width:100%;}

  /* ===== HEADER ===== */
  header{
    position:sticky; top:0; z-index:50;
    background:rgba(255,253,248,.9); backdrop-filter:blur(10px);
    border-bottom:1px solid var(--line);
  }
  .nav{display:flex; align-items:center; justify-content:space-between; padding:16px 40px; max-width:1400px; margin:0 auto;}
  .logo{font-family:var(--font-display); font-weight:700; font-size:22px; color:var(--ink);}
  .logo span{color:var(--green-600);}
  .nav-links{display:flex; align-items:center; gap:34px;}
  .nav-links a{font-weight:600; font-size:15px; color:var(--ink-soft); position:relative; padding:4px 0;}
  .nav-links a.active,.nav-links a:hover{color:var(--green-700);}
  .nav-links a.active::after{content:''; position:absolute; left:0; right:0; bottom:-4px; height:2px; background:var(--green-600); border-radius:2px;}
  .nav-cta{display:flex; align-items:center; gap:14px;}
  .burger{display:none; flex-direction:column; gap:5px; cursor:pointer; background:none; border:none;}
  .burger span{width:24px; height:2px; background:var(--ink); border-radius:2px;}

  /* ===== BACK LINK ===== */
  .back-row{padding:22px 0 0;}
  .back-link{
    display:inline-flex; align-items:center; gap:10px; font-weight:600; font-size:14.5px; color:var(--ink);
  }
  .back-link .circle{
    width:34px; height:34px; border-radius:50%; border:1.5px solid var(--line);
    display:flex; align-items:center; justify-content:center; transition:background .15s ease;
  }
  .back-link:hover .circle{ background:var(--green-100); }
  .back-link svg{width:16px; height:16px;}

  /* ===== DETAIL PRODUK ===== */
  .detail{padding:24px 0 56px;}
  .detail-grid{display:grid; grid-template-columns:0.95fr 1.05fr; gap:40px; align-items:start;}
  .detail-media img{
    width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-soft); aspect-ratio:1/1; object-fit:cover;
  }
  .detail-info h1{
    font-family:var(--font-display); font-weight:700; font-size:clamp(26px,3.2vw,34px); margin-bottom:10px;
  }
  .detail-info .price{
    font-family:var(--font-display); font-weight:700; font-size:clamp(24px,2.8vw,30px);
    color:var(--green-600); display:block; margin-bottom:18px;
  }
  .detail-checklist{display:flex; flex-direction:column; gap:12px; margin-bottom:28px;}
  .detail-checklist li{display:flex; align-items:center; gap:10px; font-size:14.5px; color:var(--ink);}
  .detail-checklist .check{
    width:22px; height:22px; border-radius:50%; background:var(--green-600); flex-shrink:0;
    display:flex; align-items:center; justify-content:center;
  }
  .detail-checklist .check svg{width:13px; height:13px; color:#fff;}

  /* ===== SECTION HEAD ===== */
  .section-head{display:flex; align-items:baseline; justify-content:space-between; margin-bottom:22px;}
  .section-head h2{font-family:var(--font-display); font-weight:700; font-size:clamp(20px,2.4vw,24px);}
  .section-head a{font-weight:600; color:var(--green-700); font-size:14px;}
  .section-head a:hover{text-decoration:underline;}

  /* ===== PRODUK LAINNYA ===== */
  .lainnya{padding:8px 0 56px;}
  .product-grid{display:grid; grid-template-columns:repeat(4,1fr); gap:18px;}
  .product-card{
    display:block; background:#fff; border:1px solid var(--line); border-radius:var(--radius-md); overflow:hidden;
    transition:transform .2s ease, box-shadow .2s ease;
  }
  .product-card:hover{transform:translateY(-4px); box-shadow:var(--shadow-soft);}
  .product-card .thumb{aspect-ratio:1/1; overflow:hidden; background:var(--green-050);}
  .product-card .thumb img{width:100%; height:100%; object-fit:cover;}
  .product-info{padding:14px 16px 18px;}
  .product-info h4{font-family:var(--font-display); font-weight:600; font-size:15px; margin-bottom:6px;}
  .product-info .price{color:var(--green-700); font-weight:700; font-size:14.5px; display:block;}

  /* ===== CTA ===== */
  .cta{padding:10px 0 70px;}
  .cta-inner{
    background:var(--green-100); border-radius:var(--radius-lg); text-align:center;
    padding:54px 24px; position:relative; overflow:hidden;
  }
  .cta-inner::before{content:'🍃'; position:absolute; font-size:80px; opacity:.15; top:-10px; left:20px; transform:rotate(-15deg);}
  .cta-inner::after{content:'🍋'; position:absolute; font-size:80px; opacity:.15; bottom:-20px; right:20px; transform:rotate(20deg);}
  .cta-inner h3{font-family:var(--font-display); font-weight:700; font-size:clamp(22px,3vw,30px); margin-bottom:8px;}
  .cta-inner h3 em{font-style:normal; color:var(--green-600);}
  .cta-inner p{color:var(--ink-soft); font-size:14.5px; max-width:520px; margin:0 auto 24px; line-height:1.6;}
  .cta-actions{display:flex; gap:14px; justify-content:center; flex-wrap:wrap; position:relative; z-index:1;}

  /* ===== FOOTER ===== */
  footer{background:var(--green-900); color:#cfe6cf; padding:56px 0 22px;}
  .footer-grid{display:grid; grid-template-columns:1.4fr 1fr 1fr 1.2fr; gap:32px; margin-bottom:36px;}
  .footer-brand .logo{color:#fff; margin-bottom:10px; margin-top:4px; display:block;}
  .footer-brand .logo span{color:var(--green-500);}
  .footer-brand p{font-size:13.5px; color:#a9c6ab; line-height:1.7; max-width:260px;}
  .footer-col h5{font-family:var(--font-display); color:#fff; font-size:14.5px; margin-bottom:16px;}
  .footer-col ul li{margin-bottom:10px;}
  .footer-col ul li a{font-size:13.5px; color:#a9c6ab; transition:color .15s ease;}
  .footer-col ul li a:hover{color:#fff;}
  .avail-links{display:flex; flex-direction:column; gap:10px;}
  .avail-links a{
    display:flex; align-items:center; gap:10px; font-size:13.5px; color:#a9c6ab;
    background:rgba(255,255,255,.06); padding:9px 12px; border-radius:10px; transition:background .15s ease, color .15s ease;
  }
  .avail-links a:hover{background:rgba(255,255,255,.12); color:#fff;}
  .avail-links img{width:18px; height:18px; object-fit:contain;}
  .contact-list li{display:flex; align-items:flex-start; gap:10px; font-size:13.5px; color:#a9c6ab; margin-bottom:14px; line-height:1.6;}
  .contact-list svg{width:17px; height:17px; flex-shrink:0; margin-top:2px; color:var(--green-500);}
  .contact-list a:hover{color:#fff;}
  .footer-bottom{border-top:1px solid rgba(255,255,255,.1); padding-top:20px; text-align:center; font-size:12.5px; color:#7fa082;}

  /* ===== WA FLOATING BUTTON ===== */
  .wa-float{
    position:fixed; bottom:22px; right:22px; z-index:60;
    width:58px; height:58px; border-radius:50%; background:#25D366;
    display:flex; align-items:center; justify-content:center;
    box-shadow:0 10px 22px -6px rgba(0,0,0,.35); transition:transform .2s ease;
  }
  .wa-float:hover{transform:scale(1.08);}
  .wa-float svg{width:30px; height:30px; color:#fff;}

  /* ===== RESPONSIVE ===== */
  @media (max-width:960px){
    .detail-grid{grid-template-columns:1fr;}
    .product-grid{grid-template-columns:repeat(2,1fr);}
    .footer-grid{grid-template-columns:1fr 1fr; row-gap:30px;}
  }
  @media (max-width:720px){
    .nav-links{position:fixed; top:68px; left:0; right:0; background:#fff; flex-direction:column; padding:18px 24px; gap:18px; border-bottom:1px solid var(--line); transform:translateY(-140%); transition:transform .25s ease; box-shadow:0 12px 24px -12px rgba(0,0,0,.15);}
    .nav-links.open{transform:translateY(0);}
    .burger{display:flex;}
    .nav-cta .btn-primary{display:none;}
    .footer-grid{grid-template-columns:1fr;}
    .product-grid{grid-template-columns:repeat(2,1fr);}
  }
</style>
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
      <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn btn-primary">Pesan Sekarang</a>
      <button class="burger" id="burgerBtn" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ===== BACK LINK ===== -->
<div class="back-row">
  <div class="wrap">
    <a href="/katalog" class="back-link">
      <span class="circle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
      </span>
      Kembali ke Katalog
    </a>
  </div>
</div>

<!-- ===== DETAIL PRODUK ===== -->
<section class="detail">
  <div class="wrap">
    <div class="detail-grid">
      <div class="detail-media">
        <img src="{{ asset($gambar) }}" alt="{{ $nama }}">
      </div>
      <div class="detail-info">
        <h1>{{ $nama }}</h1>
        <span class="price">{{ number_format($harga, 0, ',', '.') }}</span>

        <ul class="detail-checklist">
          @foreach ($checklist as $item)
          <li>
            <span class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
            {{ $item }}
          </li>
          @endforeach
        </ul>

        <a href="https://wa.me/{{ $waNumber }}?text={{ rawurlencode($waText) }}" target="_blank" class="btn btn-dark btn-full">Pesan Sekarang</a>
      </div>
    </div>
  </div>
</section>

<!-- ===== PRODUK LAINNYA ===== -->
<section class="lainnya">
  <div class="wrap">
    <div class="section-head">
      <h2>Produk Lainnya</h2>
      <a href="/katalog">Lihat Semua</a>
    </div>
    <div class="product-grid">
      <a href="/detail-produk?produk=jus-apukat&nama=Jus%20Apukat&harga=10000&gambar=images/jusapukat.png&kategori=aneka-jus" class="product-card">
        <div class="thumb"><img src="{{ asset('images/jusapukat.png') }}" alt="Jus Apukat"></div>
        <div class="product-info"><h4>Jus Apukat</h4><span class="price">Rp 10.000</span></div>
      </a>
      <a href="/detail-produk?produk=jus-durian&nama=Jus%20Durian&harga=10000&gambar=images/jusdurian.png&kategori=aneka-jus" class="product-card">
        <div class="thumb"><img src="{{ asset('images/jusdurian.png') }}" alt="Jus Durian"></div>
        <div class="product-info"><h4>Jus Durian</h4><span class="price">Rp 10.000</span></div>
      </a>
      <a href="/detail-produk?produk=es-teler&nama=Es%20Teler&harga=10000&gambar=images/esteler.png&kategori=es-teler" class="product-card">
        <div class="thumb"><img src="{{ asset('images/esteler.png') }}" alt="Es Teler"></div>
        <div class="product-info"><h4>Es Teler</h4><span class="price">Rp 10.000</span></div>
      </a>
      <a href="/detail-produk?produk=sop-buah&nama=Sop%20Buah&harga=10000&gambar=images/sopbuah.png&kategori=sop-buah" class="product-card">
        <div class="thumb"><img src="{{ asset('images/sopbuah.png') }}" alt="Sop Buah"></div>
        <div class="product-info"><h4>Sop Buah</h4><span class="price">Rp 10.000</span></div>
      </a>
    </div>
  </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta">
  <div class="wrap">
    <div class="cta-inner">
      <h3>Segarnya Alami, Nikmatnya <em>Berarti</em></h3>
      <p>Wardah Juice menghadirkan minuman segar dari buah pilihan yang diolah fresh setiap hari.</p>
      <div class="cta-actions">
        <a href="/katalog" class="btn btn-dark">Lihat Menu</a>
        <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn btn-outline">
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
            <img src="{{ asset('images/gofood.png') }}" alt="GoFood"> GoFood
          </a>
          <a href="#" target="_blank" rel="noopener">
            <img src="{{ asset('images/shopeefood.png') }}" alt="ShopeeFood"> ShopeeFood
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
            <a href="https://wa.me/{{ $waNumber }}" target="_blank">0838-9260-6102</a>
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
<a href="https://wa.me/{{ $waNumber }}" target="_blank" class="wa-float" aria-label="Chat via WhatsApp">
  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.31-1.93 1.39-.5.08-1.12.11-1.8-.11-.42-.13-.95-.3-1.64-.6-2.88-1.24-4.76-4.14-4.9-4.34-.14-.2-1.17-1.56-1.17-2.97 0-1.42.74-2.11 1-2.4.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.58.81 2 .88 2.15.07.15.11.33.02.53-.09.2-.14.32-.28.5-.14.17-.29.38-.42.51-.14.14-.28.29-.12.57.16.28.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.14.44.12.6-.07.16-.19.68-.79.86-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.07.11.07.62-.17 1.3Z"/></svg>
</a>

<script>
  const burgerBtn = document.getElementById('burgerBtn');
  const navLinks = document.getElementById('navLinks');
  burgerBtn.addEventListener('click', () => navLinks.classList.toggle('open'));
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));
  document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>