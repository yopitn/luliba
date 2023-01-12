<?php require_once __DIR__ . "/./partials/header.php" ?>

<?php
$name = "";
$email = "";
$address = "";
$telephone = "";

if ($model["user"]) {
  $user = $model["user"];
  $name = $user->name;
  $email = $user->email;
  $address = $user->address;
  $telephone = $user->telephone;
}
?>

<div class="account">
  <div class="container">
    <div class="account__breadcrumb">
      <div class="item">
        <a href="/" class="link">
          <span class="name">Home</span>
        </a>
      </div>

      <div class="item" aria-current="page">
        <span class="name">Account</span>
      </div>
    </div>

    <div class="account__content">
      <?php require_once __DIR__ . "/./partials/sidebar.php" ?>

      <main class="main">
        <div class="account__form">
          <div class="account__form-title">
            <span class="title">My account</span>
          </div>

          <?php if (isset($model["message"])) { ?>
            <div class="account__form-message <?= $model["success"] ? "success" : "danger" ?>">
              <p><?= $model["message"] ?></p>
            </div>
          <?php } ?>

          <form action="" method="post">
            <div class="account__form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" value="<?= $name ?>" required>
            </div>

            <div class="account__form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" placeholder="email@example.com" value="<?= $email ?>" required>
            </div>

            <div class="account__form-group">
              <label for="password">Password</label>
              <input type="text" name="password" id="password" placeholder="••••••••••" required disabled>
              <a href="/account/password" class="link">
                <span class="text">Change password?</span>
              </a>
            </div>

            <div class="account__form-group">
              <label for="address">Address</label>
              <textarea name="address" id="address" placeholder="address"><?= $address ?></textarea>
            </div>

            <div class="account__form-group">
              <label for="telephone">Telephone</label>
              <input type="text" name="telephone" id="telephone" placeholder="08xxxxxxxxxx" value="<?= $telephone ?>">
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