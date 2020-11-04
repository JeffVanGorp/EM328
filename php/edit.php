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
    <div class="dialog-container">
        <div class="card">
            <h2>Modify Product</h2>
            <?php
                include('config.php');
                if (isset($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];
                    if (isset($_POST['submit'])) {
                        $product_title     = $_POST['product_title'];
                        $product_category     = $_POST['product_category'];
                        $product_supplier = $_POST['product_supplier'];
                        $product_price = $_POST['product_price'];
                        $query3           = mysqli_query($connect, "update products set product_title='$product_title', product_category='$product_category', product_supplier='$product_supplier', product_price='$product_price' where product_id='$product_id'");
                        if ($query3) {
                            header('location:../catalog.php');
                        }
                    }
                    $query1 = mysqli_query($connect, "select * from products where product_id='$product_id'");
                    $query2 = mysqli_fetch_assoc($query1);
                ?>
                <form method="post" action="" onsubmit="return validateInput();">
                    <div class="input-border">
                        <input type="text" class="text" autofocus id="product_title" name="product_title" value="<?php echo $query2['product_title']; ?>" maxlength="64"/>
                        <label>Product Name</label>
                        <div class="border"></div>
                    </div>
                    <div class="input-border">
                        <select class="text" id="product_category" name="product_category">
                            <option value="<?php echo $query2['product_category']; ?>"><?php echo $query2['product_category']; ?></option>
                            <option value="digital">Digital</option>
                            <option value="physical">Physical</option>
                            <option value="collectors">Collectors</option>
                        </select>
                        <label>Category</label>
                        <div class="border"></div>
                    </div>
                    <div class="input-border">
                        <input type="text" class="text" id="product_supplier" name="product_supplier" value="<?php echo $query2['product_supplier']; ?>" maxlength="64"/>
                        <label>Supplier</label>
                        <div class="border"></div>
                    </div>
                    <div class="input-border">
                        <input type="currency" class="text" id="product_price" name="product_price" value="<?php echo $query2['product_price']; ?>" />
                        <label>Price</label>
                        <div class="border"></div>
                    </div>
                    <input type="submit" class="btn" name="submit" value="Update Product" />
                </form>
                <?php
                }
            ?>
    <script src="../js/catalog-funcs.js"></script>
</body>
</html>