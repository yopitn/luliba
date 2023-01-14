<?php require_once __DIR__ . "/./partials/header.php" ?>

<?php
$product = $model["product"];
?>

<main class="main product">
  <div class="container">
    <div class="product__breadcrumb">
      <div class="item">
        <a href="#" class="link">
          <span class="name">Home</span>
        </a>
      </div>

      <div class="item">
        <a href="#" class="link">
          <span class="name"><?= $product->category ?></span>
        </a>
      </div>

      <div aria-current="page"><?= $product->name ?></div>
    </div>

    <div class="product__content">
      <div class="product__left">
        <div class="product__image" style="background-image: url(/content/images<?= $product->image ?>);"></div>
      </div>

      <div class="product__right">
        <div class="product__title">
          <span class="title"><?= $product->name ?></span>
        </div>

        <div class="product__description">
          <p><?= $product->description ?></p>
        </div>

        <div class="product__price">
          <span class="price"><?= $model["setting"]->currency ?> <?= $product->price ?></span>
        </div>

        <div class="product__stock">
          <span class="stock"><?= $product->stock ?></span>
        </div>

        <div class="product__action">
          <a class="link btn btn-secondary" href="/account/cart/add/<?= $product->id ?>">
            <span class="text">Add to cart</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . "/./partials/footer.php" ?>