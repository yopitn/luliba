<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="main">
  <div class="container">
    <div class="products__header">
      <h2 class="global__title">
        <span class="title">Products</span>
      </h2>

      <div class="products__header-category">
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

      <div class="products__header-search">
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


    <?php if (count($model["products"]) > 0) { ?>
      <div class="products__lists">
        <?php foreach ($model["products"] as $product) { ?>
          <div class="products__box">
            <div class="products__image">
              <div class="inner">
                <div class="preloader"></div>
                <a href="/product/<?= $product->slug ?>" class="image">
                  <img src="/content/images<?= $product->image ?>" alt="<?= $product->name ?>">
                </a>
              </div>
            </div>

            <h3 class="products__title">
              <a href="/product/<?= $product->slug ?>" class="title"><?= $product->name ?></a>
            </h3>

            <div class="products__category">
              <span class="category"><?= $product->category ?></span>
            </div>

            <div class="products__footer">
              <div class="products__price">
                <span class="text"><?= $model["setting"]->currency ?> <?= $product->price ?></span>
              </div>

              <div class="products__cart" data-method="cart">
                <a href="/account/cart/add/<?= $product->id ?>" class="link">
                  <svg class="line" viewBox="0 0 24 24">
                    <g transform="translate(2.000000, 2.500000)">
                      <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                      <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                      <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                      <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } else { ?>
      <div class="products__empty">
        <span class="text">No products found</span>
      </div>
    <?php } ?>

    <?php if (count($model["products"]) > 0) { ?>
      <div class="products__action">
        <span class="btn btn-secondary" data-method="lazyLoad">
          <span class="text">Load more</span>
        </span>
      </div>
    <?php } ?>
  </div>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>