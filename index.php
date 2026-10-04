<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#f7f7f2" />
    <meta
      name="description"
      content="Thoughtful finds for modern living. Discover considered design, everyday essentials and good things made to last at NOVA."
    />
    <title>NOVA — Find your everyday</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/products.js" defer></script>
    <script src="js/script.js" defer></script>
  </head>

  <body data-page="home">
    <div class="announcement">
      A little something extra: complimentary shipping on orders over $100
      <a href="products.html"
        >Explore the collection <span aria-hidden="true">↗</span></a
      >
    </div>
    <header class="site-header">
      <div class="header-main wrap">
        <button
          class="icon-button menu-toggle"
          type="button"
          aria-label="Open navigation"
          aria-expanded="false"
        >
          ☰
        </button>
        <a class="brand" href="index.html" aria-label="NOVA home"
          >NOVA<span>.</span></a
        >
        <nav class="primary-nav" aria-label="Main navigation">
          <a class="active" href="index.html">Home</a
          ><a href="products.html">Shop</a
          ><a href="products.html#categories">Categories</a
          ><a href="index.html#story">Our story</a
          ><a href="index.html#contact">Contact</a>
        </nav>
        <form class="header-search" role="search" action="products.html">
          <label class="sr-only" for="header-search">Search products</label
          ><span aria-hidden="true">⌕</span
          ><input
            id="header-search"
            name="q"
            type="search"
            placeholder="Find something lovely"
            autocomplete="off"
          />
        </form>
        <div class="header-actions">
          <a
            class="icon-button wishlist-link"
            href="wishlist.html"
            aria-label="Wishlist"
            >♡<span class="count-badge wishlist-count">0</span></a
          ><a
            class="icon-button cart-link"
            href="cart.html"
            aria-label="Shopping bag"
            >♧<span class="count-badge cart-count">0</span></a
          >
        </div>
      </div>
    </header>
    <main>
      <section class="hero wrap">
        <div class="hero-copy">
          <p class="eyebrow">GOOD THINGS, CHOSEN WELL</p>
          <h1>Make room for<br /><em>the good stuff.</em></h1>
          <p>
            Everyday pieces with a little more thought behind them. Discover
            your next forever favorite.
          </p>
          <a class="button button-dark" href="products.html"
            >Shop the collection <span aria-hidden="true">↗</span></a
          >
          <div class="hero-note">
            <span class="avatar-stack" aria-hidden="true">●●●</span
            ><span>Loved by <strong>12,000+</strong> thoughtful shoppers</span>
          </div>
        </div>
        <div class="hero-visual">
          <img
            src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1200&q=85"
            alt="A considered edit of modern wardrobe essentials"
          /><span class="hero-stamp">NOVA<br />EDIT Nº 08</span
          ><span class="hero-caption"
            >Objects for a life well lived. <span>01 / 04</span></span
          >
        </div>
        <span class="hero-side-note"
          >A BETTER KIND OF EVERYDAY · EST. 2024</span
        >
      </section>
      <section class="category-section wrap" id="categories">
        <div class="section-heading">
          <div>
            <p class="eyebrow">A PLACE TO START</p>
            <h2>Find your kind of <em>good.</em></h2>
          </div>
          <a class="text-link" href="products.html"
            >All categories <span aria-hidden="true">↗</span></a
          >
        </div>
        <div class="category-grid">
          <a
            class="category-tile category-fashion"
            href="products.html?category=Fashion"
            ><span>01 / WEAR</span><strong>Fashion</strong
            ><span class="tile-arrow" aria-hidden="true">↗</span></a
          ><a
            class="category-tile category-home"
            href="products.html?category=Home"
            ><span>02 / LIVE</span><strong>Home</strong
            ><span class="tile-arrow" aria-hidden="true">↗</span></a
          ><a
            class="category-tile category-beauty"
            href="products.html?category=Beauty"
            ><span>03 / CARE</span><strong>Beauty</strong
            ><span class="tile-arrow" aria-hidden="true">↗</span></a
          ><a
            class="category-tile category-electronics"
            href="products.html?category=Electronics"
            ><span>04 / PLAY</span><strong>Electronics</strong
            ><span class="tile-arrow" aria-hidden="true">↗</span></a
          >
        </div>
      </section>
      <section class="product-section section-soft">
        <div class="wrap">
          <div class="section-heading">
            <div>
              <p class="eyebrow">A FEW VERY GOOD THINGS</p>
              <h2>The current <em>favorites.</em></h2>
            </div>
            <a class="text-link" href="products.html"
              >Shop all products <span aria-hidden="true">↗</span></a
            >
          </div>
          <div class="product-grid" id="featured-products"></div>
        </div>
      </section>
      <section class="editorial-banner wrap" id="story">
        <div class="editorial-image">
          <img
            src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1100&q=85"
            alt="A calm, sunlit living room with natural textures"
          />
        </div>
        <div class="editorial-copy">
          <p class="eyebrow">LESS, BUT LOVELIER</p>
          <h2>Thoughtful by nature.<br /><em>Better by design.</em></h2>
          <p>
            We believe good design should feel good in your hands, at home, and
            in the choices behind it. So we look a little closer, choose a
            little better, and bring you pieces worth keeping.
          </p>
          <a class="button button-outline" href="products.html"
            >Meet your new favorite <span aria-hidden="true">↗</span></a
          ><span class="editorial-mark">N</span>
        </div>
      </section>
      <section class="product-section wrap bestsellers">
        <div class="section-heading">
          <div>
            <p class="eyebrow">THE ONES YOU KEEP COMING BACK TO</p>
            <h2>Good things, <em>well loved.</em></h2>
          </div>
          <a class="text-link" href="products.html?sort=rating"
            >See bestsellers <span aria-hidden="true">↗</span></a
          >
        </div>
        <div class="product-grid" id="bestseller-products"></div>
      </section>
      <section class="benefit-strip">
        <div class="wrap benefit-grid">
          <article>
            <span aria-hidden="true">↗</span>
            <div>
              <h3>Free shipping, on us</h3>
              <p>On every order over $100.</p>
            </div>
          </article>
          <article>
            <span aria-hidden="true">◷</span>
            <div>
              <h3>30 days to decide</h3>
              <p>Easy returns, no hard feelings.</p>
            </div>
          </article>
          <article>
            <span aria-hidden="true">♡</span>
            <div>
              <h3>Made with intention</h3>
              <p>Better choices, built to last.</p>
            </div>
          </article>
          <article>
            <span aria-hidden="true">✳</span>
            <div>
              <h3>Here when you need us</h3>
              <p>Real people, genuinely helpful.</p>
            </div>
          </article>
        </div>
      </section>
      <section class="testimonial-section wrap">
        <p class="eyebrow">KIND WORDS, REAL PEOPLE</p>
        <div class="testimonial-quote">
          <span class="quote-mark" aria-hidden="true">“</span>
          <blockquote>
            Finally, a shop where everything feels like it belongs. I came for
            one thing and found a handful of everyday favorites.
          </blockquote>
          <p>
            <strong>Emma R.</strong>
            <span>Verified customer · Brooklyn, NY</span>
          </p>
        </div>
        <div class="testimonial-stats">
          <div>
            <strong>4.9<span>/5</span></strong
            ><small>Average customer rating</small>
          </div>
          <div>
            <strong>12k<span>+</span></strong
            ><small>Happy homes and closets</small>
          </div>
          <div>
            <strong>30<span> days</span></strong
            ><small>To find your perfect fit</small>
          </div>
        </div>
      </section>
      <section class="newsletter-section" id="contact">
        <div class="wrap newsletter-inner">
          <div>
            <p class="eyebrow">A LETTER FROM NOVA</p>
            <h2>The good stuff, <em>in your inbox.</em></h2>
            <p>
              New finds, little rituals, and 10% off your first order. No noise,
              promise.
            </p>
          </div>
          <form class="newsletter-form">
            <label class="sr-only" for="newsletter-email"
              >Your email address</label
            ><input
              id="newsletter-email"
              type="email"
              placeholder="Your email address"
              required
            /><button class="button button-dark" type="submit">
              Count me in <span aria-hidden="true">↗</span>
            </button>
          </form>
        </div>
      </section>
    </main>
    <footer class="site-footer">
      <div class="wrap">
        <div class="footer-main">
          <div class="footer-brand">
            <a class="brand" href="index.html">NOVA<span>.</span></a>
            <p>
              Thoughtful things for everyday living. Good design, better
              choices, and a little more joy in the ordinary.
            </p>
            <div class="social-links">
              <a href="https://instagram.com" aria-label="Instagram">ig</a
              ><a href="https://pinterest.com" aria-label="Pinterest">p</a
              ><a href="https://tiktok.com" aria-label="TikTok">tk</a>
            </div>
          </div>
          <div class="footer-column">
            <h2>Explore</h2>
            <a href="products.html">Shop all</a
            ><a href="products.html?category=Home">Home</a
            ><a href="products.html?category=Fashion">Fashion</a
            ><a href="products.html?category=Beauty">Beauty</a>
          </div>
          <div class="footer-column">
            <h2>Here to help</h2>
            <a href="index.html#contact">Contact us</a
            ><a href="cart.html">Shipping & returns</a
            ><a href="wishlist.html">Your wishlist</a
            ><a href="checkout.html">Checkout</a>
          </div>
          <div class="footer-column">
            <h2>The fine print</h2>
            <a href="index.html#story">Our story</a
            ><a href="index.html#contact">Privacy</a
            ><a href="index.html#contact">Terms</a>
            <p>Monday–Friday, 9–5 ET<br />hello@shopnova.example</p>
          </div>
        </div>
        <div class="footer-bottom">
          <span>© 2025 NOVA Goods Co. Made for the everyday.</span
          ><span>Thoughtfully found. <span aria-hidden="true">✳</span></span>
        </div>
      </div>
    </footer>
    <button class="back-to-top" type="button" aria-label="Back to top">
      ↑
    </button>
    <div class="toast-region" aria-live="polite" aria-atomic="true"></div>
  </body>
</html>
