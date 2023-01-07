<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $model["title"] ?></title>

  <link rel="stylesheet" href="/assets/css/style.min.css">
</head>

<body>
  <main class="form">
    <div class="container">
      <div class="form__back">
        <a href="/" class="icon">
          <svg viewBox="0 0 24 24">
            <g transform="translate(3.000000, 6.500000)">
              <path d="M8.85852597,10.910103 C9.09252108,10.7838647 9.23840087,10.5438206 9.23840087,10.2827368 L9.23840087,6.21728876 L17.2657057,6.21728876 C17.6710362,6.21728876 18,5.89595483 18,5.50002553 C18,5.10409622 17.6710362,4.7827623 17.2657057,4.7827623 L9.23840087,4.7827623 L9.23840087,0.717314292 C9.23840087,0.455274124 9.09252108,0.215230029 8.85852597,0.0899480509 C8.62453087,-0.037246629 8.33864564,-0.0286394702 8.112483,0.110031421 L0.342670655,4.89274266 C0.12923579,5.02471909 0,5.25328698 0,5.50002553 C0,5.74676408 0.12923579,5.97533197 0.342670655,6.1073084 L8.112483,10.8900196 C8.2319282,10.9627023 8.36801741,11 8.50410661,11 C8.62550993,11 8.7478923,10.9693968 8.85852597,10.910103"></path>
            </g>
          </svg>
        </a>
      </div>

      <div class="form__content">
        <div class="form__title">
          <h1>
            <span class="title">Signup</span>
          </h1>
        </div>

        <?php if (isset($model["message"])) { ?>
          <div class="form__message">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
          </div>
        <?php } ?>

        <form action="" method="post">
          <div class="form__group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Your name" \>
          </div>

          <div class="form__group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@email.com" \>
          </div>

          <div class="form__group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" \>
          </div>

          <div class="form__button">
            <button type="submit">Signup</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>