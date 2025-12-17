<?php
session_start();
$error = $_SESSION['login_error'] ?? "";
session_unset();

function showError($msg) {
    return $msg ? "<p class='error-message'>$msg</p>" : "";
}

include "header.php";
?>

<main>
<div class="welcome-box">
<h2>Welcome Back 🎬</h2>

<?= showError($error); ?>

<form action="login_register.php" method="post">

    <div class="form-group">
        <input type="email" name="email" placeholder="Email"
               required class="login-input">
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password"
               required class="login-input" id="password">
    </div>

    <div class="form-group">
        <input type="checkbox" onclick="togglePassword()"> Show Password
    </div>

    <input type="submit" name="login" value="Login" class="submit-btn">
</form>

<div class="links">
    <a href="register.php">Create New Account</a>
</div>
</div>
</main>

<script>
function togglePassword() {
    var f = document.getElementById("password");
    f.type = (f.type === "password") ? "text" : "password";
}
</script>

<?php include "footer.php"; ?>
