<?php
    session_start();
    if(!isset($_SESSION['login'])) { // if not logged in, go to index for login
        header('LOCATION:index.php');
        die();
    }
    if (isset($_POST['submitted'])) {
        include('lmi/dbconnect.php'); // Connect to the database.
        if (!empty($_POST['product_title'])) { //IF TRUE, EXECTE
            $pt = mysqli_real_escape_string($dbc, trim($_POST['product_title']));
            $pt = $_POST['product_title'];
        }
        if (!empty($_POST['product_category'])) { //IF TRUE, EXECUTE
            $pc = mysqli_real_escape_string($dbc, trim($_POST['product_category']));
            $pc = $_POST['product_category'];
        }
        if (!empty($_POST['product_supplier'])) { //IF TRUE, EXECUTE
            $ps = mysqli_real_escape_string($dbc, trim($_POST['product_supplier']));
            $ps = $_POST['product_supplier'];
        }
        if (!empty($_POST['product_price'])) { //IF TRUE, EXECUTE
            $pp = mysqli_real_escape_string($dbc, trim($_POST['product_price']));
            $pp = $_POST['product_price'];
        }
        // Make the query:
        $query = "INSERT INTO products (product_title, product_category, product_supplier, product_price) VALUES ('$pt', '$pc', '$ps', '$pp')";
        $r     = @mysqli_query($dbc, $query); // Run the query.
        if ($r) { // Successful run, print success message
            echo "<div class='errorMSG'><h2>SUCCESS</h2><br><p>You submitted <span class='dbInput'>" . $pt . "</span> from <span class='dbInput'>" . $ps . "</span>.<br>A <span class='dbInput'>" . $pc . "</span> item for <span class='dbInput'>" . $pp . "</span>.</p></div>";
        } else { // Unsuccessful run, print failure message
            echo '<div class="errorMSG">
                <h1>System Error</h1><br>
                <p>The product name and product supplier could not be entered. We apologize for any inconvenience. '
                 . mysqli_error($dbc) . '<br>Query: ' . $query . '</p></div>'; // Debugging message:
        } // End of if ($r) IF.
        mysqli_close($dbc); // Close the database connection.
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Awesome Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <?php include "php/ga.php" ?>
</head>

<body>
    <div class="dialog-container">
        <div class="card">
            <h2>Catalog Input</h2>
            <div class="text-logged">
                <p>Please submit information as detailed as possible.</p>
            </div>
            <form name="input" action="" method="post" onsubmit="return validateInput();">
                <div class="input-border">
                    <input type="text" class="text" autofocus id="product_title" name="product_title" maxlength="64"/>
                    <label>Product Name</label>
                    <div class="border"></div>
                </div>
                <div class="input-border">
                    <select class="text" id="product_category" name="product_category">
                        <option value="">Please select a category!</option>
                        <option value="digital">Digital</option>
                        <option value="physical">Physical</option>
                        <option value="collectors">Collectors</option>
                    </select>
                    <label>Category</label>
                    <div class="border"></div>
                </div>
                <div class="input-border">
                    <input type="text" class="text" id="product_supplier" name="product_supplier"  maxlength="64"/>
                    <label>Supplier</label>
                    <div class="border"></div>
                </div>
                <div class="input-border">
                    <input type="currency" class="text" id="product_price" name="product_price" value="0" />
                    <label>Price</label>
                    <div class="border"></div>
                </div>
<!--                <div class="input-border file-upload">
                    <form action="lmi/upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <label>Upload images?</label>
                        <input type="submit" class="btn-file" value="Upload" name="submit">
                    </form>
                </div>
-->             <div class="input-buttons">
                    <input type="submit" class="btn" value="Add to Catalog" name="addtocatalog"/>
                    <input type="reset" class="btn" value="Clear"/> <input type="hidden" name="submitted" value="TRUE" />
                </div>
            </form>
        </div>
    <div id="confirm">
        <div class="msgContainer">
            <div class="message">This is a warning message.</div><br>
            <button class="yes">OK</button>
        </div>
     </div>
    </div>
    <div class="loader">
        <!-- Show a spinner or placeholders for content -->
    </div>
    <?php include "php/navigation.php" ?>
    <script src="js/catalog-funcs.js"></script>
</body>
</html>