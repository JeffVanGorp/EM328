<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:index.php'); die();
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Awesome Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <?php include "php/ga.php" ?>
</head>

<body>
    <div class="dialog-container">
        <div class="card">
            <p class="login-success">You successfully logged in!</p>
            <h2>Welcome to Ampursound!</h2>
            <div class="text-logged">
                <p>Please select an action.</p>
            </div>
            <div class="dashButtons">
                <form class="small-btn" action="catalog.php">
                        <input type="submit" class="btn" value="View Catalog" />
                </form>
                <form class="small-btn" action="catalogadd.php">
                    <input type="submit" class="btn" value="Add to Catalog" />
                </form>
            </div>
        </div>
    </div>
    <div class="loader">
        <!-- Show a spinner or placeholders for content -->
    </div>
    <?php include "php/navigation.php" ?>
</body>
</html>
