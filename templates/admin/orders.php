<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="content">
  <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

  <main class="main orders">
    <div class="container">
      <div class="main__inner">
        <div class="main__header">
          <div class="main__search">
            <form class="main__form" action="/admin/orders/search" method="get">
              <input autocomplete="off" id="search" minlength="3" name="q" placeholder="Search for orders" required="required" type="search">

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

        <div class="main__content">
          <h2 class="main__title">
            <span class="title">Orders</span>
          </h2>

          <div class="main__table">
            <div class="main__table-header">
              <div>ID</div>
              <div>Customer</div>
              <div>Status</div>
              <div>Total</div>
              <div>Action</div>
            </div>

            <div class="main__table-inner">
              <?php if (count($model["orders"]) > 0) { ?>
                <?php foreach ($model["orders"] as $order) { ?>
                  <div class="main__table-item">
                    <div class="orders__content">
                      <div class="orders__id">
                        <span class="text">#<?= $order->id ?></span>
                      </div>

                      <div class="orders__customer">
                        <span class="name"><?= $order->customer ?></span>
                      </div>

                      <div class="orders__status">
                        <span class="status <?= $order->status !== true ? "pending" : "success" ?>"><?= $order->status !== true ? "Pending" : "Success" ?></span>
                      </div>

                      <div class="orders__total">
                        <span class="total"><?= $model["setting"]->currency ?> <?= $order->price ?></span>
                      </div>

                      <div class="orders__action">
                        <a href="/admin/order/confirm/<?= $order->id ?>" class="btn btn-secondary">
                          <span class="text">Confirm</span>
                        </a>
                      </div>
                    </div>

                    <div class="orders__footer">
                      <a href="/admin/order/confirm/<?= $order->id ?>" class="btn btn-secondary">
                        <span class="text">Confirm</span>
                      </a>
                    </div>
                  </div>
                <?php } ?>
              <?php } else { ?>
                <div class="main__table-empty">
                  <span class="text">No orders found</span>
                </div>
              <?php } ?>
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
      </div>
    </div>
</div>
</main>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>