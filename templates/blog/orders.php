<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="account">
  <div class="container">
    <div class="account__breadcrumb">
      <div class="item">
        <a href="#" class="link">
          <span class="name">Home</span>
        </a>
      </div>

      <div class="item">
        <a href="#" class="link">
          <span class="name">Account</span>
        </a>
      </div>

      <div class="item" aria-current="page">
        <span class="name">Orders</span>
      </div>
    </div>

    <div class="account__content">
      <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

      <main class="main orders">
        <?php if (count($model["orders"]) > 0) { ?>
          <?php foreach ($model["orders"] as $order) { ?>
            <div class="orders__item">
              <div class="orders__content">
                <div class="orders__image" style="background-image: url('/content/images<?= $order->image ?>');"></div>

                <div class="orders__details">
                  <div class="orders__title">
                    <span class="title"><?= $order->name ?></span>
                  </div>

                  <div class="orders__price">
                    <span class="price">Rp. <?= $order->price ?></span>
                  </div>
                </div>
              </div>

              <div class="orders__action">
                <div class="orders__status">
                  <span class="text <?= $order->status !== true ? "pending" : "success" ?>"><?= $order->status !== true ? "Pending" : "Success" ?></span>
                </div>

                <?php if (!$order->status) { ?>
                  <div class="orders__submit">
                    <a href="/account/order/delete/<?= $order->id ?>" class="link btn btn-danger">
                      <span class="text">Cancel</span>
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="orders__empty">
            <div class="text">It looks like you haven't added any products to your order yet.</div>
            <a href="/products" class="btn btn-secondary">
              <span class="name">Find products now</span>
            </a>
          </div>
        <?php } ?>
      </main>
    </div>
  </div>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>