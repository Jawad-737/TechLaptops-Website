<?php
	session_start();
	
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}
	
	extract($_GET);
	if(isset($_SESSION['cart'][$product_name])){
		if ($_SESSION['cart'][$product_name] > 1)
			$_SESSION['cart'][$product_name]--;
		else
			unset($_SESSION['cart'][$product_name]);
	}

	header('Location: ./showcart.php');
