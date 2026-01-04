<?php
 session_start();
 
 if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
 }
 
 $cartSize = 0;
 if(isset($_SESSION['cart'])) {
	$cartSize = count($_SESSION['cart']);
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TechLaptops Store</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="site-header">
      <h1 class="logo">TechLaptops</h1>
      <div class="header-flex">
        <div class="header-buttons">
          <a href="showcart.php" class="cart-btn">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="16"
              width="16"
              viewBox="0 0 24 24"
              fill="currentColor"
            >
              <path
                d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10
          0c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2zM7.16
          14l.84-2h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A1 1 0 0019.75
          3H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 14.37 5.48
          16 7 16h12v-2H7.16z"
              />
            </svg>
            Cart (<span id="cart"><?=$cartSize?> item(s)</span>)
          </a>

          <?php
            $isLoggedIn = isset($_SESSION['user_id']);
            if ($isLoggedIn) {
              echo '<a href="logout.php" class="login-btn" id="auth-btn">Logout</a>';
            } else {
              echo '<a href="login.html" class="login-btn" id="auth-btn">Login</a>';
            }
          ?>
        </div>
      </div>
    </header>

    <main>
      <section class="intro">
        <h2>Welcome to Our Store</h2>
        <p>
          Browse laptops and accessories at unbeatable prices — quick, simple,
          and secure.
        </p>
      </section>

      <div class="products-navbar">
        <input type="text" id="search" placeholder="Search by Name" />
        <button id="filter-icon">🔽 Filter</button>
        <div id="filter-options" class="hidden">
          <button data-sort="asc">Price: Low to High</button>
          <button data-sort="desc">Price: High to Low</button>
        </div>
      </div>
      <section class="products" id="products">
        <div class="product">
          <div class="carousel" data-title="HP Victus 15">
            <img
              class="carousel-img"
              src="assets/victus 1.png"
              alt="HP Victus"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>
          <h3>HP Victus 15</h3>
          <p>Price: $850</p>
          <p>Category: Gaming Laptop</p>
          <button onclick="addToCart('HP Victus 15')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="Lenovo LOQ 15">
            <img
              class="carousel-img"
              src="assets/loq 1.avif"
              alt="Lenovo Loq"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>Lenovo LOQ 15</h3>
          <p>Price: $950</p>
          <p>Category: Gaming Laptop</p>
          <button onclick="addToCart('Lenovo LOQ 15')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="Acer Nitro 16">
            <img
              class="carousel-img"
              src="assets/acer/NItro/Nitro 1.png"
              alt="Acer Nitro 16"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>Acer Nitro 16</h3>
          <p>Price: $879</p>
          <p>Category: Gaming Laptops</p>
          <button onclick="addToCart('Acer Nitro 16')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="Acer Predator Triton 300 SE">
            <img
              class="carousel-img"
              src="assets/acer/predetor/1.png"
              alt="Acer Predator"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>Acer Predator Triton 300 SE</h3>
          <p>Price: $1299</p>
          <p>Category: Gaming Laptop</p>
          <button onclick="addToCart('Acer Predator Triton 300 SE')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="ASUS TUF F15">
            <img
              class="carousel-img"
              src="assets/asus/tuf 15/tuf 1.png"
              alt="ASUS TUF F15"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>ASUS TUF F15</h3>
          <p>Price: $999</p>
          <p>Category: Gaming Laptop</p>
          <button onclick="addToCart('ASUS TUF F15')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="ASUS TUF F16">
            <img
              class="carousel-img"
              src="assets/asus/tuf 16/tuf 1.png"
              alt="ASUS TUF F16"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>ASUS TUF F16</h3>
          <p>Price: $1099</p>
          <p>Category: Gaming Laptop</p>
          <button onclick="addToCart('ASUS TUF F16')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="Lenovo Ideapad 3i">
            <img
              class="carousel-img"
              src="assets/lenovo bes/len 1.png"
              alt="Lenovo Ideapad"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>Lenovo Ideapad 3i</h3>
          <p>Price: $649</p>
          <p>Category: Business Laptop</p>
          <button onclick="addToCart('Lenovo Ideapad 3i')">Add to cart</button>
        </div>

        <div class="product">
          <div class="carousel" data-title="HP 15-FC000 2023">
            <img
              class="carousel-img"
              src="assets/hp bess/1.png"
              alt="HP 15-FC000"
            />
            <button class="carousel-btn prev">←</button>
            <button class="carousel-btn next">→</button>
          </div>

          <h3>HP 15-FC000 2023</h3>
          <p>Price: $549</p>
          <p>Category: Business Laptop</p>
          <button onclick="addToCart('HP 15-FC000 2023')">Add to cart</button>
        </div>
      </section>
    </main>

    <footer>
      <div class="footer-col">
        <h4>About</h4>
        <ul>
          <li>Company</li>
          <li>Team</li>
          <li>Careers</li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Support</h4>
        <ul>
          <li>Help Center</li>
          <li>Shipping</li>
          <li>Returns</li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Legal</h4>
        <ul>
          <li>Contact</li>
          <li>Privacy</li>
          <li>Terms</li>
        </ul>
      </div>
      <p class="copyright">&copy; 2025 TechLaptops. All rights reserved.</p>
    </footer>

    <script src="main.js"></script>
    <script>
		function addToCart(productName) {
			let url = "./addcart.php?product_name=" + encodeURIComponent(productName);
			fetch (url)
			.then(function (response) {return response.text();})
			.then(function (data) {
				document.querySelector('#cart').innerHTML = data + ' item(s)';
			})
			.catch (function (error) {console.error(error);});			
		}
	</script>
  </body>
</html>
