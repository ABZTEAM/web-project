<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "header.php";
?>

<main>
<section class="welcome-box">
    <h2>Welcome <?= $_SESSION['name']; ?> 👋</h2>
    <p>Enjoy exploring movies 🎥</p>
</section>
</main>

<?php include "footer.php"; ?>
