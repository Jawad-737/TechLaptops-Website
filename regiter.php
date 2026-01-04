<?php

include 'db.php';

$error = '';

if(isset($_POST['submit'])) {
    $fname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
    try {
        // Check if email already exists using prepared statement
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkStmt->execute([$email]);
        $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);
        
        if($existingUser) {
            $error = "Email Address Already Exists!";
        }
        else {
            // Insert new user using prepared statement
            $insertStmt = $conn->prepare("INSERT INTO users(fullname, email, Password) VALUES (?, ?, ?)");
            if($insertStmt->execute([$fname, $email, $hashed_password])) {
                header("location: index.php");
                exit;
            }
            else {
                $error = "Error: Registration failed";
            }
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - TechLaptops</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="auth-container">
    <a href="index.php" class="home-btn">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H4.75A.75.75 0 014 21V9.75z" />
       </svg>
    </a>
    <h2>Create Your Account</h2>
    <form class="auth-form" method="POST" action="regiter.php">
      <label for="name">Full Name</label>
      <input type="text" name="fullname" id="name" placeholder="Enter your full name" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" required />

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required />

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Create a password" required />

      <?php if ($error): ?>
      <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <button type="submit" name="submit">Register</button>
      <p>Already have an account? <a href="login.html">Login here</a></p>
    </form>
  </div>
</body>
</html>