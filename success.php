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
	<div class="container mt-4">
		<?php?>
			<p>Привет, <?=$_COOKIE['login']?>. Чтобы выйти нажмите <a href="/exit.php">сюда</a></p>
		<??>
	</div>
	<!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center text-md-start">
        <h4 class="mb-5"><strong>Меню</strong></h4>
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
            <form action="delete.php" method="POST">
            	<button type="submit" name="btn" value="<?=$product['product_id']?>" class="btn btn-primary">Удалить</button>
            </form>
          </div>
        </div>
    	<?php endforeach; ?>
      </section>
      <!--Section: Content-->

      <footer class="bg-light text-lg-start">
		<form enctype="multipart/form-data" method="POST" action="add_to_menu.php">
		  <!-- Name input -->
		  <div class="form-outline mb-4">
		    <input type="text" name="name" id="form5Example1" class="form-control" />
		    <label class="form-label" for="form5Example1">Name</label>
		  </div>

		  <!-- Price input -->
		  <div class="form-outline mb-4">
		    <input type="text" name="price" id="form5Example2" class="form-control" />
		    <label class="form-label" for="form5Example2">Price</label>
		  </div>
		  <div class="form-outline mb-4">
		    <input class="form-control" name="img" type="file" id="formFileDisabled">
		    <label for="formFileDisabled" class="form-label">Загрузите изображение</label>
		  </div>
		  
		  <!-- Submit button -->
		  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
		</form>
      </footer>
</body>
</html>
