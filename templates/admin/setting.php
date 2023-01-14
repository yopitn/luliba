<?php require_once __DIR__ . "/./partials/header.php" ?>

<?php
$sitename = "";
$description = "";
$currency = "";

if (isset($model["setting"])) {
  $setting = $model["setting"];
  $sitename = $setting->sitename;
  $description = $setting->description;
  $currency = $setting->currency;
}
?>

<div class="content">
  <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

  <main class="main account">
    <div class="container">
      <div class="main__inner">
        <div class="main__content">
          <h2 class="main__title">
            <span class="title">Setting</span>
          </h2>

          <div class="main__form">
            <?php if (isset($model["message"])) { ?>
              <div class="main__form-message <?= $model["success"] ? "success" : "danger" ?>">
                <p><?= $model["message"] ?></p>
              </div>
            <?php } ?>

            <form action="" method="post">
              <div class="main__form-group">
                <label for="sitename">Sitename</label>
                <input type="text" name="sitename" id="sitename" placeholder="Sitename" required value="<?= $sitename ?>">
              </div>

              <div class="main__form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" required><?= $description ?></textarea>
              </div>

              <div class="main__form-group">
                <label for="currency">Currency</label>
                <input type="text" name="currency" id="currency" placeholder="$, €, £, ¥, etc" required value="<?= $currency ?>">
              </div>

              <div class="main__form-button">
                <button class="btn btn-secondary" type="submit">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>