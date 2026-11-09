<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#17110d" />
  <meta name="description" content="KapeTeria Coffee Co. — premium coffee, cozy ambiance, and a community that feels like home." />
  <title>KapeTeria Coffee Co. | Sip, Relax, Be Inspired.</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Tailwind CDN keeps this file usable without a build setup. -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            espresso: '#17110d',
            roast: '#241912',
            crema: '#e8bc82',
            cream: '#f8f1e8',
            mutedcream: '#c5b6a5'
          },
          fontFamily: {
            sans: ['DM Sans', 'sans-serif'],
            display: ['Playfair Display', 'serif']
          }
        }
      }
    };
  </script>

  <style>
    :root {
      --espresso: #17110d;
      --roast: #241912;
      --crema: #e8bc82;
      --cream: #f8f1e8;
      --muted: #c5b6a5;
      --line: rgba(232, 188, 130, .23);
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; scroll-padding-top: 90px; }
    body {
      margin: 0;
      background: var(--espresso);
      color: var(--cream);
      font-family: 'DM Sans', sans-serif;
    }
    a { color: inherit; text-decoration: none; }
    button, a { -webkit-tap-highlight-color: transparent; }

    .site-header {
      position: absolute;
      inset: 0 0 auto;
      z-index: 50;
      border-bottom: 1px solid rgba(248,241,232,.15);
      background: rgba(17, 12, 9, .38);
      backdrop-filter: blur(12px);
    }
    .header-inner {
      width: min(1440px, calc(100% - 64px));
      min-height: 78px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 28px;
    }
    .brand {
      display: inline-flex;
      align-items: center;
      gap: 11px;
      flex-shrink: 0;
    }
    .brand-mark {
      width: 43px;
      height: 43px;
      color: var(--cream);
    }
    .brand-name {
      display: block;
      font-size: 21px;
      font-weight: 700;
      line-height: 1;
      letter-spacing: -.04em;
    }
    .brand-sub {
      display: block;
      margin-top: 5px;
      font-size: 9px;
      font-weight: 600;
      letter-spacing: .28em;
    }
    .desktop-nav {
      display: flex;
      align-items: center;
      gap: clamp(22px, 3.3vw, 48px);
      margin-left: auto;
      margin-right: auto;
    }
    .desktop-nav a {
      position: relative;
      padding: 10px 0;
      color: rgba(248,241,232,.88);
      font-size: 14px;
      transition: color .2s ease;
    }
    .desktop-nav a::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: 3px;
      width: 0;
      height: 1px;
      background: var(--crema);
      transition: width .2s ease;
    }
    .desktop-nav a:hover { color: var(--crema); }
    .desktop-nav a:hover::after { width: 100%; }

    .outline-button, .cream-button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      min-height: 46px;
      padding: 0 23px;
      border-radius: 999px;
      font-size: 13px;
      font-weight: 700;
      transition: transform .2s ease, background .2s ease, border-color .2s ease;
      white-space: nowrap;
    }
    .outline-button {
      border: 1px solid rgba(248,241,232,.8);
      color: var(--cream);
    }
    .outline-button:hover { border-color: var(--crema); color: var(--crema); transform: translateY(-2px); }
    .cream-button {
      min-height: 48px;
      padding: 0 27px;
      background: var(--crema);
      color: #21150f;
    }
    .cream-button:hover { background: #f3d3a7; transform: translateY(-2px); }
    .menu-toggle {
      display: none;
      width: 44px;
      height: 44px;
      border: 1px solid var(--line);
      border-radius: 50%;
      background: transparent;
      color: var(--cream);
      font-size: 22px;
      cursor: pointer;
    }

    /* IMAGE SLOT: replace the URL with your chosen hero photograph. */
    .hero {
      position: relative;
      min-height: 610px;
      display: flex;
      align-items: center;
      overflow: hidden;
      isolation: isolate;
      background-color: #21150f;
      background-image:
        linear-gradient(90deg, rgba(18,12,8,.97) 0%, rgba(18,12,8,.88) 34%, rgba(18,12,8,.35) 67%, rgba(18,12,8,.08) 100%),
        linear-gradient(0deg, rgba(18,12,8,.35), transparent 38%),
        url("images/coffee-hero.jpg");
      background-position: center, center, center 54%;
      background-size: cover;
      background-repeat: no-repeat;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -1;
      opacity: .15;
      pointer-events: none;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.18'/%3E%3C/svg%3E");
    }
    .hero-inner {
      width: min(1320px, calc(100% - 80px));
      margin: 0 auto;
      padding: 142px 0 74px;
    }
    .eyebrow {
      margin: 0 0 17px;
      color: var(--crema);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .31em;
      text-transform: uppercase;
    }
    .hero h1 {
      max-width: 680px;
      margin: 0;
      color: var(--cream);
      font-size: clamp(54px, 7.3vw, 91px);
      font-weight: 700;
      line-height: .99;
      letter-spacing: -.065em;
    }
    .hero h1 em {
      display: block;
      color: var(--crema);
      font-family: 'Playfair Display', serif;
      font-weight: 600;
      letter-spacing: -.045em;
    }
    .hero-copy {
      max-width: 420px;
      margin: 22px 0 27px;
      color: rgba(248,241,232,.88);
      font-size: 17px;
      line-height: 1.65;
    }

    .benefits {
      border-bottom: 1px solid rgba(232,188,130,.12);
      background: linear-gradient(90deg, #281c14, #1b130f 55%, #211710);
    }
    .benefit-inner {
      width: min(1120px, calc(100% - 64px));
      min-height: 86px;
      margin: auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      align-items: center;
    }
    .benefit {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 19px;
      min-height: 48px;
      padding: 8px 24px;
      color: var(--cream);
      font-size: 14px;
      line-height: 1.4;
    }
    .benefit + .benefit { border-left: 1px solid rgba(248,241,232,.42); }
    .benefit svg { width: 36px; height: 36px; flex-shrink: 0; color: var(--crema); }

    .section-wrap {
      width: min(1320px, calc(100% - 80px));
      margin: 0 auto;
    }
    .about-section {
      position: relative;
      padding: 38px 0 49px;
      overflow: hidden;
      background:
        radial-gradient(ellipse at 82% 50%, rgba(92,56,31,.12), transparent 34%),
        var(--espresso);
    }
    .about-grid {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      align-items: center;
      gap: clamp(38px, 5vw, 68px);
    }
    .about-photo {
      position: relative;
      min-height: 335px;
      overflow: hidden;
      border: 1px solid rgba(232,188,130,.2);
      border-radius: 13px;
      background: #332217;
    }
    /* IMAGE SLOT: café interior photograph. */
    .about-photo img {
      display: block;
      width: 100%;
      height: 100%;
      min-height: 335px;
      position: absolute;
      inset: 0;
      object-fit: cover;
      object-position: center;
    }
    .about-copy { max-width: 470px; }
    .about-copy h2, .section-heading {
      margin: 0;
      color: var(--cream);
      font-size: clamp(34px, 4vw, 48px);
      font-weight: 700;
      line-height: 1.1;
      letter-spacing: -.045em;
    }
    .about-copy p:not(.eyebrow) {
      margin: 19px 0 23px;
      color: var(--muted);
      font-size: 15px;
      line-height: 1.7;
    }

    .products-section {
      padding: 0 0 52px;
      background: var(--espresso);
    }
    .products-topline {
      display: flex;
      align-items: end;
      gap: 20px;
      margin-bottom: 20px;
    }
    .products-topline .eyebrow { margin-bottom: 8px; }
    .products-topline .section-heading { font-size: clamp(30px, 3.5vw, 39px); }
    .heading-rule {
      flex: 1;
      height: 1px;
      margin-bottom: 12px;
      background: rgba(248,241,232,.48);
    }
    .menu-link {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      margin-bottom: 8px;
      color: var(--crema);
      font-size: 13px;
      white-space: nowrap;
    }
    .menu-link:hover { color: #f7d7ad; }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
    }
    .product-card {
      overflow: hidden;
      border: 1px solid rgba(232,188,130,.2);
      border-radius: 11px;
      background: linear-gradient(145deg, #302117, #211711);
      transition: transform .25s ease, border-color .25s ease;
    }
    .product-card:hover { transform: translateY(-5px); border-color: rgba(232,188,130,.6); }
    .product-image {
      height: 185px;
      overflow: hidden;
      background: #392719;
    }
    .product-image img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .5s ease;
    }
    .product-card:hover .product-image img { transform: scale(1.05); }
    .product-info { padding: 12px 14px 14px; }
    .product-name { margin: 0 0 3px; color: var(--cream); font-size: 14px; font-weight: 600; }
    .product-price { margin: 0; color: var(--muted); font-size: 13px; }

    .promo-banner {
      position: relative;
      min-height: 160px;
      display: flex;
      align-items: center;
      overflow: hidden;
      isolation: isolate;
      border-top: 1px solid rgba(232,188,130,.15);
      border-bottom: 1px solid rgba(232,188,130,.15);
      background-color: #2b1a11;
      /* IMAGE SLOT: replace with a wide, close-up coffee-bean photograph. */
      background-image:
        linear-gradient(90deg, rgba(25,14,8,.68), rgba(25,14,8,.52)),
        url("images/coffee-beans.jpg");
      background-size: cover;
      background-position: center 53%;
    }
    .promo-inner {
      width: min(1120px, calc(100% - 80px));
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 32px;
    }
    .promo-title {
      max-width: 600px;
      margin: 0;
      color: var(--cream);
      font-family: 'Playfair Display', serif;
      font-size: clamp(36px, 5vw, 59px);
      font-style: italic;
      font-weight: 600;
      line-height: 1.05;
      letter-spacing: -.04em;
    }
    .promo-button { min-height: 58px; padding: 0 34px; font-size: 15px; }

    .footer {
      background: #130e0b;
      border-top: 1px solid rgba(232,188,130,.16);
    }
    .footer-inner {
      width: min(1320px, calc(100% - 80px));
      min-height: 105px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 30px;
    }
    .footer-nav {
      display: flex;
      align-items: center;
      gap: 25px;
      padding: 0 30px;
      border-left: 1px solid var(--line);
      border-right: 1px solid var(--line);
    }
    .footer-nav a { color: var(--muted); font-size: 11px; transition: color .2s; }
    .footer-nav a:hover { color: var(--crema); }
    .socials { display: flex; align-items: center; gap: 17px; }
    .socials a {
      display: grid;
      width: 27px;
      height: 27px;
      place-items: center;
      color: var(--cream);
      transition: color .2s, transform .2s;
    }
    .socials a:hover { color: var(--crema); transform: translateY(-2px); }
    .socials svg { width: 19px; height: 19px; }
    .copyright { color: #a99a8c; font-size: 10px; line-height: 1.5; }

    .mobile-nav {
      display: none;
      padding: 8px 24px 20px;
      background: rgba(19,14,11,.98);
      border-top: 1px solid var(--line);
    }
    .mobile-nav a {
      display: block;
      padding: 12px 0;
      color: var(--cream);
      border-bottom: 1px solid rgba(248,241,232,.08);
      font-size: 14px;
    }

    @media (max-width: 900px) {
      .header-inner, .section-wrap, .footer-inner { width: min(100% - 48px, 720px); }
      .desktop-nav, .header-order { display: none; }
      .menu-toggle { display: inline-grid; place-items: center; }
      .mobile-nav.open { display: block; }
      .hero { min-height: 590px; background-position: center, center, 60% center; }
      .hero-inner { width: min(100% - 48px, 720px); }
      .about-grid { grid-template-columns: 1fr 1fr; gap: 28px; }
      .about-photo, .about-photo img { min-height: 290px; }
      .product-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-inner { flex-wrap: wrap; justify-content: center; padding: 25px 0; }
      .footer-nav { border-right: 0; }
    }
    @media (max-width: 600px) {
      .header-inner { width: calc(100% - 36px); min-height: 70px; }
      .brand-name { font-size: 19px; }
      .hero { min-height: 650px; background-image:
        linear-gradient(90deg, rgba(18,12,8,.9), rgba(18,12,8,.58)),
        linear-gradient(0deg, rgba(18,12,8,.55), transparent 60%),
        url("images/coffee-hero.jpg");
        background-position: center, center, 62% center;
      }
      .hero-inner { width: calc(100% - 40px); padding: 135px 0 65px; }
      .hero h1 { font-size: clamp(48px, 14vw, 68px); }
      .hero-copy { max-width: 330px; font-size: 15px; }
      .benefit-inner { width: 100%; grid-template-columns: 1fr; padding: 8px 20px; }
      .benefit { justify-content: flex-start; min-height: 64px; padding: 9px 15px; }
      .benefit + .benefit { border-left: 0; border-top: 1px solid rgba(248,241,232,.17); }
      .section-wrap { width: calc(100% - 40px); }
      .about-section { padding: 36px 0 42px; }
      .about-grid { grid-template-columns: 1fr; gap: 25px; }
      .about-photo, .about-photo img { min-height: 250px; }
      .about-copy h2 { font-size: 37px; }
      .products-section { padding-bottom: 40px; }
      .products-topline { align-items: start; flex-wrap: wrap; gap: 10px; }
      .heading-rule { display: none; }
      .menu-link { margin-left: auto; align-self: end; }
      .product-grid { gap: 12px; }
      .product-image { height: 145px; }
      .product-info { padding: 10px; }
      .product-name { font-size: 12px; }
      .product-price { font-size: 12px; }
      .promo-inner { width: calc(100% - 40px); flex-direction: column; align-items: flex-start; padding: 35px 0; gap: 22px; }
      .promo-title { font-size: 42px; }
      .footer-inner { width: calc(100% - 40px); flex-direction: column; gap: 22px; }
      .footer-nav { order: 2; width: 100%; justify-content: center; flex-wrap: wrap; gap: 18px; padding: 18px 0; border-left: 0; border-top: 1px solid var(--line); }
      .socials { order: 3; }
      .copyright { order: 4; text-align: center; }
    }
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; }
    }
  </style>
</head>

<body>
  <header class="site-header">
    <div class="header-inner">
      <a class="brand" href="#home" aria-label="BeanVista home">
        <svg class="brand-mark" viewBox="0 0 64 64" fill="none" aria-hidden="true">
          <path d="M19 25h26l-2.5 19a7 7 0 0 1-7 6h-7a7 7 0 0 1-7-6L19 25Z" stroke="currentColor" stroke-width="2.5"/>
          <path d="M45 29h5a6 6 0 0 1 0 12h-7M25 20c-5-5 5-7 0-13M35 19c-5-5 5-7 0-13M16 56h34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <path d="M24 32c5 5 11 5 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <span>
          <span class="brand-name">KapeTeria</span>
          <span class="brand-sub">COFFEE CO.</span>
        </span>
      </a>

      <nav class="desktop-nav" aria-label="Main navigation">
        <a href="#home">Home</a>
        <a href="#menu">Menu</a>
        <a href="#about">About</a>
        <a href="#story">Blog</a>
        <a href="#contact">Contact</a>
      </nav>

      <a class="outline-button header-order" href="#menu">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 8h12l1 13H5L6 8Z" stroke="currentColor" stroke-width="1.8"/><path d="M9 8V6a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        Order Online
      </a>
      <button class="menu-toggle" id="menuToggle" aria-label="Open navigation menu" aria-expanded="false" aria-controls="mobileNav">☰</button>
    </div>
    <nav class="mobile-nav" id="mobileNav" aria-label="Mobile navigation">
      <a href="#home">Home</a>
      <a href="#menu">Menu</a>
      <a href="#about">About</a>
      <a href="#story">Blog</a>
      <a href="#contact">Contact</a>
      <a href="#menu">Order Online →</a>
    </nav>
  </header>

  <main>
    <section class="hero" id="home">
      <div class="hero-inner">
        <p class="eyebrow">Good Coffee. Better Mood.</p>
        <h1>Sip, Relax,<em>Be Inspired.</em></h1>
        <p class="hero-copy">Premium coffee, cozy ambiance, and a community that feels like home.</p>
        <a class="cream-button" href="{{ route('login') }}">
    Explore Our Menu <span aria-hidden="true">→</span>
</a>
      </div>
    </section>

    <section class="benefits" aria-label="Why choose BeanVista">
      <div class="benefit-inner">
        <div class="benefit">
          <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M31.8 6.5C21 5.5 9.3 13.3 8.1 25.2c-.5 4.7 2.3 8.4 6.7 8.4 11.7 0 19.4-15.1 17-27.1Z" fill="currentColor"/><path d="M9 34c5-10 11-16 20-23" stroke="#241912" stroke-width="1.8" stroke-linecap="round"/></svg>
          <span>Premium<br>Arabica Beans</span>
        </div>
        <div class="benefit">
          <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M10 17h20l-2 13a4 4 0 0 1-4 3H16a4 4 0 0 1-4-3l-2-13Z" stroke="currentColor" stroke-width="2.2"/><path d="M30 20h3a4 4 0 0 1 0 8h-4M15 12c-4-4 4-5 0-9M23 12c-4-4 4-5 0-9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
          <span>Expertly<br>Crafted</span>
        </div>
        <div class="benefit">
          <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M20 34S5 25 5 15.5C5 7 15.5 5 20 13c4.5-8 15-6 15 2.5C35 25 20 34 20 34Z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/></svg>
          <span>A Cozy Space<br>for Everyone</span>
        </div>
      </div>
    </section>

    <section class="about-section" id="about">
      <div class="section-wrap about-grid">
        <div class="about-photo">
          <!-- Replace this file with your own café interior photo. -->
          <img src="images/coffee-shop-interior.jpg" alt="Warm and welcoming BeanVista café interior" loading="lazy"
               onerror="this.style.display='none'; this.parentElement.classList.add('image-placeholder');" />
        </div>
        <div class="about-copy" id="story">
          <p class="eyebrow">About KapeTeria</p>
          <h2>More Than Just<br>A Coffee Shop</h2>
          <p>KapeTeria is where great coffee meets good vibes. Whether you're studying, working, or just taking a break — we've got your perfect cup.</p>
          <a class="outline-button" href="#contact">Our Story <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </section>

    <section class="products-section" id="menu">
      <div class="section-wrap">
        <div class="products-topline">
          <div>
            <p class="eyebrow">Featured Drinks</p>
            <h2 class="section-heading">Our Signature Picks</h2>
          </div>
          <div class="heading-rule"></div>
          <a class="menu-link" href="#contact">View Full Menu <span aria-hidden="true">→</span></a>
        </div>

        <div class="product-grid">
          <article class="product-card">
            <div class="product-image">
              <img src="images/iced-caramel-macchiato.jpg" alt="Iced caramel macchiato" loading="lazy">
            </div>
            <div class="product-info">
              <h3 class="product-name">Iced Caramel Macchiato</h3>
              <p class="product-price">₱140</p>
            </div>
          </article>
          <article class="product-card">
            <div class="product-image">
              <img src="images/matcha-latte.jpg" alt="Matcha latte" loading="lazy">
            </div>
            <div class="product-info">
              <h3 class="product-name">Matcha Latte</h3>
              <p class="product-price">₱150</p>
            </div>
          </article>
          <article class="product-card">
            <div class="product-image">
              <img src="images/mocha-bliss.jpg" alt="Mocha bliss" loading="lazy">
            </div>
            <div class="product-info">
              <h3 class="product-name">Mocha Bliss</h3>
              <p class="product-price">₱150</p>
            </div>
          </article>
          <article class="product-card">
            <div class="product-image">
              <img src="images/classic-latte.jpg" alt="Classic latte" loading="lazy">
            </div>
            <div class="product-info">
              <h3 class="product-name">Classic Latte</h3>
              <p class="product-price">₱130</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="promo-banner">
      <div class="promo-inner">
        <h2 class="promo-title">Fuel Your Day<br>with KapeTeria</h2>
        <a class="cream-button promo-button" href="#menu">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 8h12l1 13H5L6 8Z" stroke="currentColor" stroke-width="1.8"/><path d="M9 8V6a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
          Order Now <span aria-hidden="true">→</span>
        </a>
      </div>
    </section>
  </main>

  <footer class="footer" id="contact">
    <div class="footer-inner">
      <a class="brand" href="#home" aria-label="BeanVista home">
        <svg class="brand-mark" viewBox="0 0 64 64" fill="none" aria-hidden="true">
          <path d="M19 25h26l-2.5 19a7 7 0 0 1-7 6h-7a7 7 0 0 1-7-6L19 25Z" stroke="currentColor" stroke-width="2.5"/>
          <path d="M45 29h5a6 6 0 0 1 0 12h-7M25 20c-5-5 5-7 0-13M35 19c-5-5 5-7 0-13M16 56h34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <path d="M24 32c5 5 11 5 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <span>
          <span class="brand-name">KapeTeria</span>
          <span class="brand-sub">COFFEE CO.</span>
        </span>
      </a>

      <nav class="footer-nav" aria-label="Footer navigation">
        <a href="#home">Home</a>
        <a href="#menu">Menu</a>
        <a href="#about">About</a>
        <a href="#story">Blog</a>
        <a href="#contact">Contact</a>
      </nav>

      <div class="socials" aria-label="Social media links">
        <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1v-2c0-.9.3-1.5 1.6-1.5h1.7V3.6c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.1H7.3V13h2.8v8h3.4Z"/></svg></a>
        <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"/></svg></a>
        <a href="#" aria-label="TikTok"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.6 8.1a6.8 6.8 0 0 1-4.2-1.5v7.1a5.7 5.7 0 1 1-5-5.7v3.6a2.2 2.2 0 1 0 1.5 2.1V2.8h3.5c.2 2 1.6 3.6 4.2 3.9v1.4Z"/></svg></a>
        <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23 7.2a3 3 0 0 0-2.1-2.1C19 4.6 12 4.6 12 4.6s-7 0-8.9.5A3 3 0 0 0 1 7.2 31 31 0 0 0 .5 12 31 31 0 0 0 1 16.8a3 3 0 0 0 2.1 2.1c1.9.5 8.9.5 8.9.5s7 0 8.9-.5a3 3 0 0 0 2.1-2.1 31 31 0 0 0 .5-4.8 31 31 0 0 0-.5-4.8ZM9.7 15.2V8.8l6 3.2-6 3.2Z"/></svg></a>
      </div>

      <p class="copyright">© 2025 KapeTeria Coffee Co.<br>All rights reserved.</p>
    </div>
  </footer>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileNav = document.getElementById('mobileNav');

    menuToggle.addEventListener('click', () => {
      const isOpen = mobileNav.classList.toggle('open');
      menuToggle.setAttribute('aria-expanded', String(isOpen));
      menuToggle.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
      menuToggle.textContent = isOpen ? '×' : '☰';
    });

    mobileNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNav.classList.remove('open');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Open navigation menu');
        menuToggle.textContent = '☰';
      });
    });
  </script>
</body>
</html>
