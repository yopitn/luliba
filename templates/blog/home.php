<?php require_once __DIR__ . "/./partials/header.php" ?>

<main class="main">
  <section class="home__about">
    <div class="container">
      <div class="home__left">
        <h2 class="home__about-title">
          <span class="text">Find your best fashion <span class="d">here</span>.</span>
        </h2>

        <div class="home__about-desc">
          <p>Fashion is best defined simply as the styles of clothing and accessories worn at any given time by groups of people.</p>
        </div>

        <div class="home__about-action">
          <a href="/products" class="btn btn-secondary">
            <span class="text">Start shopping</span>
          </a>
        </div>
      </div>

      <div class="home__right">
        <div class="home__about-image" style="background-image: url('/assets/images/banner.png');">
        </div>
      </div>
  </section>

  <section class="home__products">
    <div class="container">
      <div class="home__products-header">
        <h2 class="home__title">
          <span class="title">Products</span>
        </h2>

        <div class="home__products-category">
          <ul>
            <li>
              <a href="#" class="link">
                <span class="name">All</span>
              </a>
            </li>

            <li>
              <a href="#" class="link">
                <span class="name">Man</span>
              </a>
            </li>

            <li>
              <a href="#" class="link">
                <span class="name">Women</span>
              </a>
            </li>

            <li>
              <a href="#" class="link">
                <span class="name">Kid</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="home__search">
          <form action="/search" method="get">
            <input autocomplete="off" id="search" minlength="3" name="q" placeholder="Search for products" required="required" type="search">

            <button type="reset"></button>

            <button type="submit">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.000000)">
                  <circle cx="9.76659044" cy="9.76659044" r="8.9885584"></circle>
                  <line x1="16.0183067" x2="19.5423342" y1="16.4851259" y2="20.0000001"></line>
                </g>
              </svg>
            </button>
          </form>
        </div>
      </div>

      <div class="home__products-lists">
        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <div class="home__products-box">
          <div class="home__products-image">
            <div class="inner">
              <div class="preloader"></div>
              <a href="/product/exmaples-product-title" class="image">
                <img src="https://dummyimage.com/400x400/fe990/323232" alt="Examples product title">
              </a>
            </div>
          </div>

          <h3 class="home__products-title">
            <a href="/product/exmaples-product-title" class="title">Examples product title</a>
          </h3>

          <div class="home__products-footer">
            <div class="home__products-price">
              <span class="text">$30</span>
            </div>

            <div class="home__products-cart" data-method="cart">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2.000000, 2.500000)">
                  <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                  <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                  <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                  <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <div class="home__products-action">
        <a href="/products" class="btn btn-secondary">
          <span class="text">See all</span>
        </a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . "/./partials/footer.php" ?>