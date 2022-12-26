<?php
	$mysql = new mysqli(
		'localhost', 
		'root', 
		'root', 
		'cours'
	);


	$q = "DELETE FROM `cart`";
	if (mysqli_query($mysql, $q)) {
		echo "Success!";
	} else {
    	echo "Error: ".$q."<br>".mysqli_error($mysql);
	}

	mysqli_close($mysql);

	function generateRandomString($length = 1) {

    	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    	$charactersLength = strlen($characters);

    	$randomString = '';

    	for ($i = 0; $i < $length; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
	}
	function generateRandomString1($length = 1) {

    	$characters = '0123456789';

    	$charactersLength = strlen($characters);

    	$randomString = '';

    	for ($i = 0; $i < $length; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
	}
	$n1 = generateRandomString();
	$n2 = generateRandomString1();
	$n = $n1.$n2;

	echo 'Ваш заказ собран. Номер в очереди: '.$n.' Чтобы вернуться к меню нажмите <a href="index.php">сюда</a>.';
?>






