<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="content">
  <main class="main editor">
    <div class="container">
      <div class="main__inner">
        <div class="main__title">
          <span class="title">Add product</span>
        </div>
        <form class="main__form" method="post">
          <div class="main__form-group">
            <label for="image">Image</label>
            <input class="hidden" type="file" name="image" id="image">
            <div class="editor__upload">
              <span class="title">Select File here</span>

              <span class="text">Files Supported: PNG, JPG, WEBP</span>

              <label class="btn btn-link" for="image">Upload image</label>
            </div>
          </div>

          <div class="main__form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Product name">
          </div>

          <div class="main__form-group">
            <label for="title">Description</label>
            <textarea name="description" id="description" placeholder="Product description"></textarea>
          </div>

          <div class="main__form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" placeholder="Product category">
          </div>

          <div class="main__form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" min="1" step="any" placeholder="0">
          </div>

          <div class="main__form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="1" step="any" placeholder="0">
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