<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="account">
  <div class="container">
    <div class="account__breadcrumb">
      <div class="item">
        <a href="/" class="link">
          <span class="name">Home</span>
        </a>
      </div>

      <div class="item">
        <a href="/account" class="link">
          <span class="name">Account</span>
        </a>
      </div>

      <div class="item" aria-current="page">
        <span class="name">Change password</span>
      </div>
    </div>

    <div class="account__content">
      <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

      <main class="main">
        <div class="account__form">
          <div class="account__form-title">
            <span class="title">Change password</span>
          </div>

          <?php if (isset($model["message"])) { ?>
            <div class="account__form-message <?= $model["success"] ? "success" : "danger" ?>">
              <p><?= $model["message"] ?></p>
            </div>
          <?php } ?>

          <form action="" method="post">
            <div class="account__form-group">
              <label for="old-password">Old password</label>
              <input type="password" name="old-password" id="old-password" placeholder="••••••••••" required>
            </div>

            <div class="account__form-group">
              <label for="new-password">New password</label>
              <input type="password" name="new-password" id="new-password" placeholder="••••••••••" required>
            </div>

            <div class="account__form-submit">
              <button type="submit" class="btn btn-secondary">Save</button>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
</div>

<?php require_once __DIR__ . "/./partials/footer.php" ?>