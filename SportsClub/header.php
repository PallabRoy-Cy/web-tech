<?php
// Shared header include - places the logo and navigation consistently across pages.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="homepage.php"><img src="splogo.png" alt="Sports Club logo" class="logo"></a>
            </div>
            <nav class="main-nav">
                <?php include 'menu.php'; ?>
            </nav>
        </div>
    </header>
    <div class="container">