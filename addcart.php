<?php
	session_start();
	
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}
	
	extract($_GET);
	if (isset($_SESSION['cart'][$product_name])) {
		$_SESSION['cart'][$product_name] = $_SESSION['cart'][$product_name] + 1;
	} else {
		$_SESSION['cart'][$product_name] = 1;
	}
	echo count($_SESSION['cart']); // return the number of items in the cart
