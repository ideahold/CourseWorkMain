<?php
	$mysql = new mysqli(
		'localhost', 
		'root', 
		'root', 
		'cours'
	);

	$product_id = filter_var(trim($_POST['btn']), 
	FILTER_SANITIZE_STRING);

	$q = "DELETE FROM `cart` WHERE `product_id`='$product_id' LIMIT 1";
	if (mysqli_query($mysql, $q)) {
		echo "Success!";
	} else {
    	echo "Error: ".$q."<br>".mysqli_error($mysql);
	}
	mysqli_close($mysql);

	header('Location: /cart.php');
?>