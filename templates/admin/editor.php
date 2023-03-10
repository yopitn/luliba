<?php require_once __DIR__ . "/./partials/header.php" ?>

<?php
$name = "";
$description = "";
$category = "";
$price = "";
$stock = "";

if (isset($model["product"])) {
  $product = $model["product"];
  $name = $product->name;
  $description = $product->description;
  $category = $product->category;
  $price = $product->price;
  $stock = $product->stock;
}
?>

<div class="content">
  <main class="main editor">
    <div class="container">
      <div class="main__inner">
        <div class="main__title">
          <span class="title">Add product</span>
        </div>
        <form class="main__form" method="post" enctype="multipart/form-data">
          <div class="main__form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
          </div>

          <div class="main__form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Product name" value="<?= $name ?>">
          </div>

          <div class="main__form-group">
            <label for="title">Description</label>
            <textarea name="description" id="description" placeholder="Product description"><?= $description ?></textarea>
          </div>

          <div class="main__form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" placeholder="Product category" value="<?= $category ?>">
          </div>

          <div class="main__form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" min="1" step="any" placeholder="0" value="<?= $price ?>">
          </div>

          <div class="main__form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="1" step="any" placeholder="0" value="<?= $stock ?>">
          </div>

          <div class="main__form-button">
            <button class="btn btn-secondary" type="submit">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>