<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Cafe</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
<header>
    <style>
      #intro {
        /* Margin to fix overlapping fixed navbar */
        margin-top: 58px;
      }
      @media (max-width: 991px) {
        #intro {
          /* Margin to fix overlapping fixed navbar */
          margin-top: 45px;
        }
      }
    </style>
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <img src="imgs/delivery-bike.png" height="16" alt="" loading="lazy"
            style="margin-top: -3px;" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Заказать еду</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/sign-in.php" rel="nofollow">Войти</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cart.php">Корзина</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
</header>
<!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center text-md-start" id="intro">
        <?php
        $mysql = new mysqli(
        'localhost', 
        'root', 
        'root', 
        'cours'
        );
        $q = "SELECT * FROM `products`";
        if (mysqli_query($mysql, $q)) {
          $result = mysqli_query($mysql, $q);
          $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            echo "Error: ".$q."<br>".mysqli_error($mysql);
        }
        ?>
        <?php foreach ($products as $product): ?>
        <!-- Post -->
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="bg-image hover-overlay shadow-1-strong rounded ripple" 
            data-mdb-ripple-color="light">
              <img src="<?=$product['url']?>" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-8 mb-4">
            <h5><?=$product['name']?></h5>
            <p><?=$product['price']?></p>
            <form action="buy.php" method="POST">
              <button type="submit" name="btn" value="<?=$product['product_id']?>" class="btn btn-primary">Добавить в корзину</button>
            </form>
          </div>
        </div>
        <?php endforeach; ?>
      </section>
    </div>
  </main>
  <!--Main layout-->





  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>