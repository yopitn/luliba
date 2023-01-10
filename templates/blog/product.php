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
          <span class="name">Women</span>
        </a>
      </div>

      <div aria-current="page">FortKlass Coach Misaki Jaket Coach Pria Outwear Unisex Parasut Jake - NAVY, L</div>
    </div>

    <div class="product__content">
      <div class="product__left">
        <div class="product__image" style="background-image: url(/content/images<?= $product->image ?>);"></div>
      </div>

      <div class="product__right">
        <div class="product__title">
          <span class="title">FortKlass Coach Misaki Jaket Coach Pria Outwear Unisex Parasut Jake - NAVY, L</span>
        </div>

        <div class="product__description">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt enim cum at, incidunt voluptatibus possimus dolore eum officia ea quos ad sed accusantium repellat quas eveniet aliquid vel rem temporibus!</p>
        </div>

        <div class="product__price">
          <span class="price">Rp. 110.000</span>
        </div>

        <div class="product__stock">
          <span class="stock"><?= $product->stock ?></span>
        </div>

        <div class="product__action">
          <span class="btn btn-secondary" data-method="addProduct">
            Add to cart
          </span>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . "/./partials/footer.php" ?>