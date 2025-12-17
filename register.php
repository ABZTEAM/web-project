<?php
session_start();
$error = $_SESSION['register_error'] ?? "";
session_unset();

include "header.php";
?>

<main>
<div class="welcome-box">
<h2>Create New Account</h2>

<?= $error ? "<p class='error-message'>$error</p>" : ""; ?>

<form action="login_register.php" method="post">

    <div class="form-group">
        <input type="text" name="username"
               placeholder="Name" required class="login-input">
    </div>

    <div class="form-group">
        <input type="email" name="email"
               placeholder="Email" required class="login-input">
    </div>

    <div class="form-group">
        <input type="password" name="password"
               placeholder="Password" required class="login-input">
    </div>

    <input type="submit" name="register"
           value="Register" class="submit-btn">
</form>

<div class="links">
    <a href="login.php">Back to Login</a>
</div>
</div>
</main>

<?php include "footer.php"; ?>
