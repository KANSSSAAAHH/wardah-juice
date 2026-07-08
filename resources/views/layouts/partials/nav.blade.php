<nav id="wjNav" class="navbar navbar-expand-lg position-fixed start-0 end-0 mx-3" style="z-index:1050;">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="/images/logo/wardah-juice2.png" alt="Wardah Juice" height="44" class="me-2">
      <span class="fw-bold">Wardah Juice</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#wjNavMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="wjNavMenu">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link px-3" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/about">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/katalog">Katalog Produk</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/kontak">Kontak</a></li>
        <li class="nav-item ms-3">
          <a class="btn btn-order rounded-pill px-4 py-2 fw-semibold" href="https://wa.me/6283892606102" target="_blank" id="orderBtn">Pesan Sekarang</a>
        </li>
      </ul>
    </div>
  </div>

  <style>
    :root{--lime:#7ee36c;--mint-100:#eafef3;--dark:#073229}
    #wjNav{backdrop-filter: blur(6px); background: rgba(255,255,255,0.6); border-radius:40px; box-shadow:0 6px 18px rgba(5,39,29,0.08); padding:.45rem 1rem}
    #wjNav .nav-link{color:var(--dark)}
    .btn-order{background:linear-gradient(90deg,#b8f28d,#7ee36c);border:none;color:#08321f}
    #wjNav.scrolled{backdrop-filter: blur(10px); box-shadow:0 8px 28px rgba(5,39,29,0.12)}
    @media(min-width:992px){#wjNav{left:2rem;right:2rem}}
  </style>

  <script>
    (function(){
      const nav=document.getElementById('wjNav');
      window.addEventListener('scroll',()=>{
        if(window.scrollY>20) nav.classList.add('scrolled'); else nav.classList.remove('scrolled');
      });
    })();
  </script>
</nav>
