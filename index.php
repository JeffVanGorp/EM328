<?php
	session_start();
    if(isset($_SESSION['login'])) {
        header('LOCATION:dashboard.php'); die();
    }
	$errorMsg = "";
	$validUser = "";
	if (isset($_POST["logmein"])) {
	    $user = $_POST["username"];
	    $pass = $_POST["password"];
	    $validUser = false;
	    $file = fopen("lmi/logincred.txt", "r");
	    while (!feof($file)) {
	        $content = explode(":", rtrim(fgets($file, 1024)));
	        if ($user == $content[0] && ($pass) == $content[1]) {
	            $validUser = true;
	            break;
	        }
	    }
	    fclose($file);
	    if (!$validUser)
	        $errorMsg = "Invalid username or password.";
	    else
	        $_SESSION["login"] = true;
	}
	if ($validUser) {
	    header("Location: dashboard.php");
	    die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/main.css" rel="stylesheet">
    <?php include "php/ga.php" ?>
</head>
<body>
	<div class="dialog-container">
		<div class="card">
			<h2>Jeff V | EM328 | Unit 3 IP</h2>
			<form name="input" action="" method="post">
				<div class="input-border">
					<input type="text" class="text" required autofocus id="username" name="username" placeholder="" onfocus="this.placeholder = 'admin'" onblur="this.placeholder = ''"/>
					<label>Name</label>
					<div class="border"></div>
				</div>
				<div class="input-border">
					<input type="password" class="text" required id="password" name="password" placeholder="" onfocus="this.placeholder = 'password'" onblur="this.placeholder = ''" />
					<label>Password</label>
					<div class="border"></div>
				</div>
				<div class="error"><?= $errorMsg ?></div>
				<input type="submit" class="btn" value="Log In" name="logmein" />
			</form>
		</div>
	</div>
	<!-- <div class="loader">
		Show a spinner or placeholders for content
	</div> -->
</body>
</html>
