<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $model["title"] ?></title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="/favicon.ico" rel="icon" type="image/x-icon">
  <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link rel="stylesheet" href="/assets/admin/css/style.min.css">
</head>

<body>
  <input class="off-sidebar hidden" type="checkbox" id="off-sidebar">

  <header class="header">
    <div class="container">
      <div class="header__left">
        <div class="header__icon">
          <?php if ($model["isHomepage"]) { ?>
            <label for="off-sidebar" class="header__hamburger">
              <span></span>
              <span></span>
              <span></span>
            </label>
          <?php } ?>

          <?php if ($model["isEditor"]) { ?>
            <a href="/admin" class="header__back icon">
              <svg viewBox="0 0 24 24">
                <g transform="translate(3.000000, 6.500000)">
                  <path d="M8.85852597,10.910103 C9.09252108,10.7838647 9.23840087,10.5438206 9.23840087,10.2827368 L9.23840087,6.21728876 L17.2657057,6.21728876 C17.6710362,6.21728876 18,5.89595483 18,5.50002553 C18,5.10409622 17.6710362,4.7827623 17.2657057,4.7827623 L9.23840087,4.7827623 L9.23840087,0.717314292 C9.23840087,0.455274124 9.09252108,0.215230029 8.85852597,0.0899480509 C8.62453087,-0.037246629 8.33864564,-0.0286394702 8.112483,0.110031421 L0.342670655,4.89274266 C0.12923579,5.02471909 0,5.25328698 0,5.50002553 C0,5.74676408 0.12923579,5.97533197 0.342670655,6.1073084 L8.112483,10.8900196 C8.2319282,10.9627023 8.36801741,11 8.50410661,11 C8.62550993,11 8.7478923,10.9693968 8.85852597,10.910103"></path>
                </g>
              </svg>
            </a>
          <?php } ?>
        </div>

        <div class="header__title">
          <h1>
            <span class="title">Luliba</span>
          </h1>
        </div>
      </div>

      <div class="header__right">
        <div class="header__icon">
          <ul>
            <li>
              <div class="icon" role="button" aria-label="Notifications">
                <svg viewBox="0 0 24 24">
                  <g transform="translate(3.500000, 2.000000)">
                    <path d="M6.46318036,17.2279111 C6.96309266,17.1221591 10.009278,17.1221591 10.5091903,17.2279111 C10.9365507,17.326613 11.3986963,17.5572531 11.3986963,18.0608342 C11.3738498,18.5402433 11.092587,18.9652657 10.7039871,19.2351852 C10.2000994,19.6279784 9.60875183,19.8767475 8.99057001,19.9663849 C8.64868167,20.0107 8.3127565,20.0117072 7.9827945,19.9663849 C7.36361882,19.8767475 6.77227127,19.6279784 6.26937738,19.234178 C5.87978369,18.9652657 5.5985209,18.5402433 5.57367436,18.0608342 C5.57367436,17.5572531 6.03581994,17.326613 6.46318036,17.2279111 Z M8.5452207,-1.77635684e-15 C10.6253727,-1.77635684e-15 12.7502485,0.987018886 14.0124525,2.62466451 C14.8313943,3.67916326 15.207074,4.73265484 15.207074,6.37030046 L15.207074,6.37030046 L15.207074,6.79633004 C15.207074,8.05226122 15.5390237,8.79252538 16.2695118,9.64559171 C16.8230927,10.2740609 17,11.0807977 17,11.9560216 C17,12.8302384 16.712774,13.66014 16.1373283,14.3339314 C15.3839813,15.1416754 14.3215434,15.6573425 13.2372406,15.7469799 C11.6659456,15.8809324 10.0936568,15.9937346 8.50049693,15.9937346 C6.90634317,15.9937346 5.33504823,15.9262547 3.76375329,15.7469799 C2.67845659,15.6573425 1.61601871,15.1416754 0.863665595,14.3339314 C0.288219819,13.66014 8.8817842e-15,12.8302384 8.8817842e-15,11.9560216 C8.8817842e-15,11.0807977 0.177901198,10.2740609 0.730488161,9.64559171 C1.48383514,8.79252538 1.79391991,8.05226122 1.79391991,6.79633004 L1.79391991,6.79633004 L1.79391991,6.37030046 C1.79391991,4.68833971 2.21332944,3.58851866 3.07699503,2.51186235 C4.36106402,0.94169659 6.41935107,-1.77635684e-15 8.45577317,-1.77635684e-15 L8.45577317,-1.77635684e-15 Z"></path>
                  </g>
                </svg>
              </div>
            </li>

            <li>
              <a href="/admin/setting" class="icon" aria-label="Settings">
                <svg viewBox="0 0 24 24">
                  <g transform="translate(2.499897, 2.000100)">
                    <path d="M10.217226,0 C10.9734745,0 11.6581859,0.42 12.0363101,1.04 C12.2202625,1.34 12.3428973,1.71 12.3122386,2.1 C12.2917995,2.4 12.3837756,2.7 12.5472888,2.98 C13.0684871,3.83 14.2232989,4.15 15.1226214,3.67 C16.1343592,3.09 17.411806,3.44 17.9943217,4.43 L17.9943217,4.43 L18.6790331,5.61 C19.2717684,6.6 18.944742,7.87 17.9227847,8.44 C17.0541209,8.95 16.7475337,10.08 17.2687319,10.94 C17.4322451,11.21 17.6161974,11.44 17.9023455,11.58 C18.2600306,11.77 18.5359591,12.07 18.730131,12.37 C19.1082552,12.99 19.0775965,13.75 18.7096918,14.42 L18.7096918,14.42 L17.9943217,15.62 C17.6161974,16.26 16.9110468,16.66 16.1854571,16.66 C15.827772,16.66 15.4292086,16.56 15.1021823,16.36 C14.8364734,16.19 14.5298861,16.13 14.2028598,16.13 C13.191122,16.13 12.3428973,16.96 12.3122386,17.95 C12.3122386,19.1 11.3720378,20 10.1967868,20 L10.1967868,20 L8.8069248,20 C7.62145424,20 6.68125344,19.1 6.68125344,17.95 C6.6608143,16.96 5.81258967,16.13 4.80085186,16.13 C4.46360592,16.13 4.15701871,16.19 3.90152936,16.36 C3.574503,16.56 3.16572005,16.66 2.81825454,16.66 C2.08244522,16.66 1.37729463,16.26 0.999170395,15.62 L0.999170395,15.62 L0.2940198,14.42 C-0.0841044313,13.77 -0.104543579,12.99 0.273580653,12.37 C0.437093834,12.07 0.743681049,11.77 1.09114656,11.58 C1.37729463,11.44 1.56124696,11.21 1.73497971,10.94 C2.2459584,10.08 1.93937119,8.95 1.07070741,8.44 C0.0589696023,7.87 -0.26805676,6.6 0.314458948,5.61 L0.314458948,5.61 L0.999170395,4.43 C1.59190568,3.44 2.85913283,3.09 3.88109021,3.67 C4.77019314,4.15 5.92500498,3.83 6.44620325,2.98 C6.60971643,2.7 6.70169259,2.4 6.68125344,2.1 C6.6608143,1.71 6.77322961,1.34 6.96740151,1.04 C7.34552574,0.42 8.03023719,0.02 8.77626608,0 L8.77626608,0 Z M9.51207539,7.18 C7.9076023,7.18 6.60971643,8.44 6.60971643,10.01 C6.60971643,11.58 7.9076023,12.83 9.51207539,12.83 C11.1165485,12.83 12.3837756,11.58 12.3837756,10.01 C12.3837756,8.44 11.1165485,7.18 9.51207539,7.18 Z"></path>
                  </g>
                </svg>
              </a>
            </li>

            <li>
              <div class="icon" role="button" aria-label="Accounts">
                <svg viewBox="0 0 24 24">
                  <g transform="translate(4.000000, 2.000000)">
                    <path d="M8,13.1739317 C12.338627,13.1739317 16,13.8789388 16,16.598966 C16,19.3199932 12.314618,20 8,20 C3.66237339,20 5.68434189e-14,19.2949929 5.68434189e-14,16.5749657 C5.68434189e-14,13.8539385 3.68538202,13.1739317 8,13.1739317 Z M8,-6.03961325e-14 C10.9391022,-6.03961325e-14 13.2939852,2.35402354 13.2939852,5.29105291 C13.2939852,8.22808228 10.9391022,10.5831058 8,10.5831058 C5.06189821,10.5831058 2.70601476,8.22808228 2.70601476,5.29105291 C2.70601476,2.35402354 5.06189821,-6.03961325e-14 8,-6.03961325e-14 Z"></path>
                  </g>
                </svg>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>