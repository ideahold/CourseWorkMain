<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<title>Успешно</title>
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
              <a class="nav-link" href="index.php">Заказать еду</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/sign-in.php" rel="nofollow">Войти</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Корзина</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
</header>
	<div class="container mt-4">
	</div>
	<!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center text-md-start" id="intro">
        <h4 class="mb-5"><strong>Корзина</strong></h4>
				<?php
				    $mysql = new mysqli(
						'localhost', 
						'root', 
						'root', 
						'cours'
					);
					$q = "SELECT * FROM `cart`";
					if (mysqli_query($mysql, $q)) {
						$result = mysqli_query($mysql, $q);
						$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
					} else {
				    	echo "Error: ".$q."<br>".mysqli_error($mysql);
					}
					mysqli_close($mysql);

				?>
				<?php foreach ($products as $product): ?>
				<?php 
					$mysql = new mysqli(
						'localhost', 
						'root', 
						'root', 
						'cours'
					);
					$p = $product['product_id'];
					$q = "SELECT * FROM `products` WHERE `product_id`='$p'";
					if (mysqli_query($mysql, $q)) {
						$result = mysqli_query($mysql, $q);
						$post = mysqli_fetch_all($result, MYSQLI_ASSOC);
					} else {
				    	echo "Error: ".$q."<br>".mysqli_error($mysql);
					}
					mysqli_close($mysql);

				?>
        <!-- Post -->
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="bg-image hover-overlay shadow-1-strong rounded ripple" 
            data-mdb-ripple-color="light">
              <img src="<?=$post[0]['url']?>" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-8 mb-4">
            <h5><?=$post[0]['name']?></h5>
            <p><?=$post[0]['price']?></p>
            <form action="delete_from_cart.php" method="POST">
            	<button type="submit" name="btn" value="<?=$post[0]['product_id']?>" class="btn btn-primary">Удалить</button>
            </form>
          </div>
        </div>
    		<?php endforeach; ?>
      </section>

      <footer class="bg-light text-lg-start">
				<form method="POST" action="final.php">
				  <button type="submit" class="btn btn-primary btn-block mb-4">Оплатить</button>
				</form>
      </footer>
</body>
</html>
