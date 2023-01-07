<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $model["title"] ?></title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link href="/favicon.ico" rel="icon" type="image/x-icon">
  <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link rel="stylesheet" href="/assets/css/style.min.css">
</head>

<body>
  <header class="header">
    <nav class="container">
      <input class="off-menu hidden" type="checkbox" id="off-menu">

      <div class="header__hamburger">
        <label for="off-menu">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </label>
      </div>

      <div class="header__title">
        <h1>
          <span class="title">Luliba</span>
        </h1>
      </div>

      <div class="header__menu">
        <ul>
          <li>
            <a href="/" class="link">
              <span class="name">Home</span>
            </a>
          </li>

          <li>
            <a href="/products" class="link">
              <span class="name">Product</span>
            </a>
          </li>

          <li>
            <a href="/about-us" class="link">
              <span class="name">About</span>
            </a>
          </li>

          <li>
            <a href="/contact-us" class="link">
              <span class="name">Contact</span>
            </a>
          </li>
        </ul>
      </div>

      <?php if ($model["role"] !== "customer") { ?>
        <div class="header__action">
          <ul>
            <li>
              <a href="/login" class="btn btn-secondary">
                <span class="name">Login</span>
              </a>
            </li>

            <li>
              <a href="/signup" class="btn btn-secondary">
                <span class="name">Sign up</span>
              </a>
            </li>
          </ul>
        </div>
      <?php } ?>
    </nav>
  </header>