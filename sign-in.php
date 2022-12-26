<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="css/mdb.min.css" />

	<title>Форма входа</title>
</head>
<body>
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
              <a class="nav-link" href="/index.php">Заказать еду</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" rel="nofollow">Войти</a>
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
	<div class="container mt-4">
		<h1 id="intro">Админка</h1>
		<form method="POST" 
		action="auth.php" class="bg-white rounded-5 shadow-5-strong p-5">
            <!-- Login input -->
            <div class="form-group mb-4">
              <label class="form-label" for="form1Example1">Login address</label>
              <input type="text" name="login" id="form1Example1" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-group mb-4">
              <label class="form-label" for="form1Example2">Password</label>
              <input type="password" name="pass" id="form1Example2" class="form-control" />
              <label class="form-label" for="form1Example2">Логин: root, Пароль: root</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
	</div>

</body>
</html>