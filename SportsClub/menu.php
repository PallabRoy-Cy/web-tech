<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<ul>
    <li><a href="homepage.php">Home</a></li>
    <?php if(!isset($_SESSION['id'])): ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="registration.php">Registration</a></li>
    <?php else: ?>
        <?php if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'): ?>
            <li><a href="admindashboard.php">Dashboard</a></li>
        <?php else: ?>
            <li><a href="dashboard.php">Dashboard</a></li>
        <?php endif; ?>
        <li><a href="logout.php">Logout</a></li>
    <?php endif; ?>
    <li><a href="about.php">About Us</a></li>
</ul>