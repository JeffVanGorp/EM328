<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:index.php'); die();
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Awesome Catalog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <?php include "ga.php" ?>
</head>
<body>
    <?php
        include('config.php');
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $query1     = mysqli_query($connect, "delete from products where product_id='$product_id'");
            if ($query1) {
                header('location:./catalog.php');
            }
        }
    ?>
</body>
</html>