<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="content">
  <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

  <main class="main products">
    <div class="container">
      <div class="main__inner">
        <div class="main__header">
          <div class="main__search">
            <form class="main__form" action="/admin/products/search" method="get">
              <input autocomplete="off" id="search" minlength="3" name="q" placeholder="Search for products" required="required" type="search">

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

          <div class="main__action">
            <a href="/admin/product/new" class="btn btn-secondary">
              <span class="text">Add product</span>
            </a>
          </div>
        </div>

        <div class="main__content">
          <h2 class="main__title">
            <span class="title">Products</span>
          </h2>

          <div class="main__table">
            <div class="main__table-header">
              <div>Product details</div>
              <div>Category</div>
              <div>Price</div>
              <div>Stock</div>
              <div>Action</div>
            </div>

            <div class="main__table-inner">
              <?php if (count($model["products"]) > 0) { ?>
                <?php foreach ($model["products"] as $product) { ?>
                  <div class="main__table-item">
                    <a href="/admin/product/<?= $product->id ?>" class="products__detail">
                      <div class="products__image">
                        <div class="image" style="background-image: url('/content/images<?= $product->image ?>');"></div>
                      </div>

                      <div class="products__title">
                        <span class="title"><?= $product->name ?></span>
                      </div>
                    </a>

                    <a href="/admin/product/<?= $product->id ?>" class="products__category">
                      <span class="category"><?= $product->category ?></span>
                    </a>

                    <a href="/admin/product/<?= $product->id ?>" class="products__price">
                      <span class="price">$<?= $product->price ?></span>
                    </a>

                    <a href="/admin/product/<?= $product->id ?>" class="products__stock">
                      <span class="price"><?= $product->stock ?></span>
                    </a>

                    <div class="products__action">
                      <a href="/admin/product/delete/<?= $product->id ?>" class="icon">
                        <svg viewBox="0 0 24 24">
                          <g transform="translate(3.000000, 2.000000)">
                            <path d="M15.9390642,6.69713303 C16.1384374,6.69713303 16.3193322,6.78413216 16.4622974,6.93113069 C16.5955371,7.08812912 16.6626432,7.28312717 16.6431921,7.48912511 C16.6431921,7.55712443 16.1102334,14.297057 15.8058245,17.1340287 C15.6152042,18.8750112 14.4928788,19.9320007 12.8093905,19.9610004 C11.5149233,19.9900001 10.2496326,20 9.00379295,20 C7.68112168,20 6.38762697,19.9900001 5.13206181,19.9610004 C3.50498163,19.9220008 2.3816836,18.8460115 2.20078885,17.1340287 C1.88762697,14.2870571 1.36439378,7.55712443 1.35466825,7.48912511 C1.34494273,7.28312717 1.41107629,7.08812912 1.54528852,6.93113069 C1.67755565,6.78413216 1.86817592,6.69713303 2.06852172,6.69713303 L15.9390642,6.69713303 Z M11.0647288,-2.48689958e-14 C11.9487789,-2.48689958e-14 12.7384915,0.61699383 12.9670413,1.49698503 L12.9670413,1.49698503 L13.1304301,2.22697773 C13.2626972,2.82197178 13.77815,3.24296757 14.371407,3.24296757 L14.371407,3.24296757 L17.2871191,3.24296757 C17.67614,3.24296757 18,3.56596434 18,3.97696023 L18,3.97696023 L18,4.35695643 C18,4.75795242 17.67614,5.09094909 17.2871191,5.09094909 L17.2871191,5.09094909 L0.713853469,5.09094909 C0.323859952,5.09094909 1.95399252e-14,4.75795242 1.95399252e-14,4.35695643 L1.95399252e-14,4.35695643 L1.95399252e-14,3.97696023 C1.95399252e-14,3.56596434 0.323859952,3.24296757 0.713853469,3.24296757 L0.713853469,3.24296757 L3.62956559,3.24296757 C4.22185001,3.24296757 4.73730279,2.82197178 4.87054247,2.22797772 L4.87054247,2.22797772 L5.0232332,1.54598454 C5.26053598,0.61699383 6.04149557,-2.48689958e-14 6.93527123,-2.48689958e-14 L6.93527123,-2.48689958e-14 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                <?php } ?>
              <?php } else { ?>
                <div class="main__table-empty">
                  <span class="text">No products found</span>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="main__footer">
          <div class="main__footer-pagination">
            <ul>
              <li>
                <a href="#" class="link active">
                  <span class="num">1</span>
                </a>
              </li>

              <li>
                <a href="#" class="link">
                  <span class="num">2</span>
                </a>
              </li>

              <li>
                <a href="#" class="link">
                  <span class="num">3</span>
                </a>
              </li>

              <li>
                <a href="#" class="link">
                  <span class="num">10</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>