<?php
session_start();
// Include connection file
include 'db.php';

$error = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from form
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        // Check if email exists in database using prepared statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            // Email exists, check password
            if (password_verify($password, $user_data['password'])) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_email'] = $user_data['email'];
                $_SESSION['user_name'] = $user_data['fullname'];
                // Redirect to home page with success parameter
                header('Location: index.php?login=success');
                exit;
            } else {
                // Password is incorrect
                $error = "Incorrect password";
            }
        } else {
            // Email does not exist
            $error = "Email not registered";
        }
    } catch(PDOException $e) {
        $error = "Database error occurred";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - TechLaptops</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-container">
      <a href="index.php" class="home-btn">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          width="20"
          height="20"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H4.75A.75.75 0 014 21V9.75z"
          />
        </svg>
      </a>
      <h2>Login to TechLaptops</h2>
      <form class="auth-form" method="POST" action="login.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required />

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required />

        <?php if ($error): ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.html">Register here</a></p>
      </form>
    </div>
  </body>
</html>