<?php
session_start();
require_once "config.php";

/* ---------- REGISTER ---------- */
if (isset($_POST['register'])) {

    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($name == "" || $email == "" || $password == "") {
        $_SESSION['register_error'] = "All fields are required";
        header("Location: register.php");
        exit();
    }

    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['register_error'] = "Email already exists";
        header("Location: register.php");
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,
        "INSERT INTO users (name, email, password)
         VALUES ('$name', '$email', '$hashed')"
    );

    header("Location: login.php");
    exit();
}

/* ---------- LOGIN ---------- */
if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "" || $password == "") {
        $_SESSION['login_error'] = "Please fill all fields";
        header("Location: login.php");
        exit();
    }

    $result = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'"
    );

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: home.php");
            exit();
        }
    }

    $_SESSION['login_error'] = "Incorrect email or password";
    header("Location: login.php");
    exit();
}
?>
