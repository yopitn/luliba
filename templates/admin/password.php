<?php require_once __DIR__ . "/./partials/header.php" ?>

<div class="content">
  <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

  <main class="main account">
    <div class="container">
      <div class="main__inner">
        <div class="main__content">
          <h2 class="main__title">
            <span class="title">Change password</span>
          </h2>

          <div class="main__form">
            <?php if (isset($model["message"])) { ?>
              <div class="main__form-message <?= $model["success"] ? "success" : "danger" ?>">
                <p><?= $model["message"] ?></p>
              </div>
            <?php } ?>

            <form action="" method="post">
              <div class="main__form-group">
                <label for="old-password">Old password</label>
                <input type="password" name="old-password" id="old-password" placeholder="••••••••••" required>
              </div>

              <div class="main__form-group">
                <label for="new-password">New password</label>
                <input type="password" name="new-password" id="new-password" placeholder="••••••••••" required>
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