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
    <link href="css/main.css" rel="stylesheet">
    <link href="css/catalog.css" rel="stylesheet">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <?php include "php/ga.php" ?>
</head>

<body>
    <div class="dialog-container">
        <div class="card">
            <h2>Catalog Viewer</h2>
            <div class="text-logged">
                <?php
                include('php/config.php');
                $chkths = "SELECT product_id, product_title, product_supplier, product_category, product_price FROM products";
                $query = mysqli_query($connect,$chkths) or die(mysqli_error($connect));
                echo "<table class='catalogtable'><tr><th>Product</th><th>Supplier</th><th>Category</th><th>Price</th><th></th><th></th>";
                while ($query2 = mysqli_fetch_array($query)) {
                    echo "<tr><td>" . $query2['product_title'] . "</td>";
                    echo "<td>" . $query2['product_supplier'] . "</td>";
                    echo "<td>" . $query2['product_category'] . "</td>";
                    echo "<td>" . $query2['product_price'] . "</td>";
                    echo "<td><a href='php/edit.php?product_id=" . $query2['product_id'] . "'>Edit</a></td>";
                    echo "<td><a href='php/delete.php?product_id=" . $query2['product_id'] . "'>Delete</a></td><tr>";
                }
                ?>
            </div>
        </div>
    <div class="loader">
        <!-- Show a spinner or placeholders for content -->
    </div>
   </div>
    <?php include "php/navigation.php" ?>
</body>
</html>