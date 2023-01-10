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
                      <span class="icon">
                        <svg viewBox="0 0 24 24">
                          <g transform="translate(2.000200, 1.999900)">
                            <path d="M14.34,-3.01980663e-14 C17.73,-3.01980663e-14 20,2.38 20,5.92 L20,5.92 L20,14.09 C20,17.62 17.73,20 14.34,20 L14.34,20 L5.67,20 C2.28,20 0,17.62 0,14.09 L0,14.09 L0,5.92 C0,2.38 2.28,-3.01980663e-14 5.67,-3.01980663e-14 L5.67,-3.01980663e-14 Z M14.48,8.801 C13.82,8.801 13.28,9.34 13.28,10 C13.28,10.66 13.82,11.2 14.48,11.2 C15.14,11.2 15.67,10.66 15.67,10 C15.67,9.34 15.14,8.801 14.48,8.801 Z M10,8.801 C9.34,8.801 8.8,9.34 8.8,10 C8.8,10.66 9.34,11.2 10,11.2 C10.66,11.2 11.2,10.66 11.2,10 C11.2,9.34 10.66,8.801 10,8.801 Z M5.52,8.801 C4.86,8.801 4.32,9.34 4.32,10 C4.32,10.66 4.86,11.2 5.52,11.2 C6.18,11.2 6.72,10.66 6.72,10 C6.72,9.34 6.18,8.801 5.52,8.801 Z"></path>
                          </g>
                        </svg>
                      </span>
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