<?php require_once __DIR__ . "/./partials/header.php" ?>

<?php
$name = "";
$email = "";

if (isset($model["user"])) {
  $user = $model["user"];
  $name = $user->name;
  $email = $user->email;
}
?>

<div class="content">
  <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

  <main class="main account">
    <div class="container">
      <div class="main__inner">
        <div class="main__content">
          <h2 class="main__title">
            <span class="title">Account</span>
          </h2>

          <div class="main__form">
            <?php if (isset($model["message"])) { ?>
              <div class="main__form-message <?= $model["success"] ? "success" : "danger" ?>">
                <p><?= $model["message"] ?></p>
              </div>
            <?php } ?>

            <form action="" method="post">
              <div class="main__form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" required value="<?= $name ?>">
              </div>

              <div class="main__form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="email@example.com" required value="<?= $email ?>">
              </div>

              <div class="main__form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" placeholder="••••••••••" required disabled>
                <a href="/admin/account/password" class="link">
                  <span class="text">Change password?</span>
                </a>
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