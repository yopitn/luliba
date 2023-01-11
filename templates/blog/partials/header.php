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
          <a href="/" class="title">Luliba</a>
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
            <input class="off-dropdown hidden" type="checkbox" id="off-dropdown-1">
            <label for="off-dropdown-1" class="link">
              <span class="name">Category</span>
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(5.000000, 8.500000)">
                  <polyline points="14 0 7 7 0 0"></polyline>
                </g>
              </svg>
            </label>

            <ul class="header__menu-dropdown">
              <li>
                <a href="/category/man" class="link">
                  <span class="name">Man</span>
                </a>
              </li>

              <li>
                <a href="/category/women" class="link">
                  <span class="name">Women</span>
                </a>
              </li>

              <li>
                <a href="/category/kid" class="link">
                  <span class="name">Kid</span>
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="/products" class="link">
              <span class="name">Product</span>
            </a>
          </li>
        </ul>
      </div>

      <?php if ($model["role"] !== "customer" && $model["role"] !== "admin") { ?>
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

      <?php if ($model["role"] === "customer") { ?>
        <div class="header__action">
          <ul>
            <li>
              <a href="/account/carts" class="btn btn-secondary" role="button">
                <svg class="line" viewBox="0 0 24 24">
                  <g transform="translate(2.000000, 2.500000)">
                    <path d="M0.7501,0.7499 L2.8301,1.1099 L3.7931,12.5829 C3.8701,13.5199 4.6531,14.2389 5.5931,14.2359094 L16.5021,14.2359094 C17.3991,14.2379 18.1601,13.5779 18.2871,12.6899 L19.2361,6.1319 C19.3421,5.3989 18.8331,4.7189 18.1011,4.6129 C18.0371,4.6039 3.1641,4.5989 3.1641,4.5989"></path>
                    <line x1="12.1251" y1="8.2948" x2="14.8981" y2="8.2948"></line>
                    <path d="M5.1544,17.7025 C5.4554,17.7025 5.6984,17.9465 5.6984,18.2465 C5.6984,18.5475 5.4554,18.7915 5.1544,18.7915 C4.8534,18.7915 4.6104,18.5475 4.6104,18.2465 C4.6104,17.9465 4.8534,17.7025 5.1544,17.7025 Z"></path>
                    <path d="M16.4347,17.7025 C16.7357,17.7025 16.9797,17.9465 16.9797,18.2465 C16.9797,18.5475 16.7357,18.7915 16.4347,18.7915 C16.1337,18.7915 15.8907,18.5475 15.8907,18.2465 C15.8907,17.9465 16.1337,17.7025 16.4347,17.7025 Z"></path>
                  </g>
                </svg>
                <span class="name">Cart</span>
              </a>
            </li>

            <li>
              <a href="/account" class="btn btn-secondary">
                <svg viewBox="0 0 24 24">
                  <g transform="translate(4.814286, 2.814476)">
                    <path d="M7.17047619,12.531714 C3.30285714,12.531714 -4.08562073e-14,13.1164759 -4.08562073e-14,15.4583807 C-4.08562073e-14,17.8002854 3.28190476,18.4059997 7.17047619,18.4059997 C11.0380952,18.4059997 14.34,17.8202854 14.34,15.479333 C14.34,13.1383807 11.0590476,12.531714 7.17047619,12.531714 Z"></path>
                    <path d="M7.17047634,9.19142857 C9.70857158,9.19142857 11.7657144,7.13333333 11.7657144,4.5952381 C11.7657144,2.05714286 9.70857158,-5.32907052e-15 7.17047634,-5.32907052e-15 C4.6323811,-5.32907052e-15 2.574259,2.05714286 2.574259,4.5952381 C2.56571443,7.1247619 4.60952396,9.18285714 7.13809539,9.19142857 L7.17047634,9.19142857 Z"></path>
                  </g>
                </svg>
                <span class="name">Account</span>
              </a>
            </li>
          </ul>
        </div>
      <?php } ?>

      <?php if ($model["role"] === "admin") { ?>
        <div class="header__action">
          <ul>
            <li>
              <a href="/admin" class="btn btn-secondary">
                <svg viewBox="0 0 24 24">
                  <g transform="translate(4.814286, 2.814476)">
                    <path d="M7.17047619,12.531714 C3.30285714,12.531714 -4.08562073e-14,13.1164759 -4.08562073e-14,15.4583807 C-4.08562073e-14,17.8002854 3.28190476,18.4059997 7.17047619,18.4059997 C11.0380952,18.4059997 14.34,17.8202854 14.34,15.479333 C14.34,13.1383807 11.0590476,12.531714 7.17047619,12.531714 Z"></path>
                    <path d="M7.17047634,9.19142857 C9.70857158,9.19142857 11.7657144,7.13333333 11.7657144,4.5952381 C11.7657144,2.05714286 9.70857158,-5.32907052e-15 7.17047634,-5.32907052e-15 C4.6323811,-5.32907052e-15 2.574259,2.05714286 2.574259,4.5952381 C2.56571443,7.1247619 4.60952396,9.18285714 7.13809539,9.19142857 L7.17047634,9.19142857 Z"></path>
                  </g>
                </svg>
                <span class="name">Admin</span>
              </a>
            </li>
          </ul>
        </div>
      <?php } ?>
    </nav>
  </header>