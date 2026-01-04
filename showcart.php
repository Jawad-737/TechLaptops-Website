<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Your Cart - TechLaptops</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="cart-container">
        
    <a href="index.php" class="home-btn">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H4.75A.75.75 0 014 21V9.75z" />
       </svg>
    </a>

    <h2>Your Shopping Cart</h2>
    <div id="cart-items"></div>
  <div class="cart-bottom">
  <div id="total" class="total-box">Total: $0</div>
  <button id="checkout-btn">Proceed to Checkout</button>
</div>
  </div>

  <?php
	session_start();
	
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}
	
	$productPrices = [
		"HP Victus 15" => 850,
		"Lenovo LOQ 15" => 950,
		"Acer Nitro 16" => 879,
		"Acer Predator Triton 300 SE" => 470,
		"ASUS TUF F15" => 760,
		"ASUS TUF F16" => 900,
		"ASUS TUF A16" => 900,
		"Lenovo Ideapad 3i" => 500,
		"HP 15-FC000 2023" => 580
	];
	
	$total = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1) {
		$cart = $_SESSION['cart'];
	} else {
		$cart = [];
	}
  ?>
  
  <script>
    const cartItemsEl = document.getElementById("cart-items");
    const totalEl = document.getElementById("total");

    const productPrices = <?php echo json_encode($productPrices); ?>;
    const cart = <?php echo json_encode($cart); ?>;

    function renderCart() {
      cartItemsEl.innerHTML = "";
      let total = 0;

      const cartKeys = Object.keys(cart);
      if (cartKeys.length === 0) {
        cartItemsEl.innerHTML = "<p>Your cart is empty.</p>";
        totalEl.style.display = "none";
        return;
      }

      totalEl.style.display = "block";

      cartKeys.forEach((productName) => {
        const qty = cart[productName];
        const price = productPrices[productName] || 0;
        const subtotal = qty * price;
        total += subtotal;
        const div = document.createElement("div");
        div.className = "cart-item";
        div.innerHTML = `
          <span>${productName}</span>
          <span>Qty: ${qty}</span>
          <span>$${subtotal}</span>
          <button onclick="removeCart('${productName}')">Remove</button>
        `;
        cartItemsEl.appendChild(div);
      });

      totalEl.textContent = `Total: $${total}`;
    }

    function removeCart(productName) {
      location.href = "./removecart.php?product_name=" + encodeURIComponent(productName);
    }

    renderCart();

    document.getElementById("checkout-btn").addEventListener("click", () => {
      const cartKeys = Object.keys(cart);
      if (cartKeys.length === 0) {
        alert("Your cart is empty!");
        return;
      }

      alert("Thank you for your purchase! Checkout complete.");
      location.href = "./checkout.php";
    });
  </script>
</body>
</html>
