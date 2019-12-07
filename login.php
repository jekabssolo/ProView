<html lang = "en">
	<head>
		<title>Administrēšana</title>
		<?php session_start(); /* Starts the session */
        /* Check Login form submitted */if(isset($_POST['Submit'])){
        /* Define username and associated password array */$logins = array('admin' => 'admin');

        /* Check and assign submitted Username and Password to new variable */$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

        /* Check Username and Password existence in defined array */if (isset($logins[$Username]) && $logins[$Username] == $Password){
        /* Success: Set session variables and redirect to Protected page  */$_SESSION['UserData']['Username']=$logins[$Username];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
        if (isset($_GET['p'])){
         header("location:".$_GET["p"]);
        }else{
         header("location:index.php");
        }
        exit;
        } else {
        /*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Nepareizs lietotājvārds un/vai parole!</span>";
        }
        }
        ?>

		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- FONT -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<link rel="stylesheet" href="style.css">


	</head>

	<body>
		<div class="error">
			<?php if(isset($msg)){?>
			<h4 class = "form-signin-heading"><?php echo $msg;?>
			<?php } ?>
		</div>
		<div class = "jumbotron my-container">
			<div class="container">
				<div class="row">
					<div class="col-md-6 login-image">
						<img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
					</div>
					<div class="col-md-6">
						<div class="login-tilte">Projektu Administrēšana</div>
					</div>
				</div>
			</div>
			<form action="" method="post" name="Login_Form" class = "form-signin">
				<div class="login-container">
					<img src="Design/Icons/user.png" class="login-icon" alt="User icon">
					<input name="Username" type="text" class = "login-form" placeholder = "Lietotājvārds" required autofocus>
				</div>
				<div class="login-container">
					<img src="Design/Icons/key.png" class="login-icon" alt="Password icon">
					<input name="Password" type="password" class = "login-form" placeholder = "Parole" required>
				</div>
				<br>
				<div class="center">
					<input name="Submit" type="submit" value="Login" class = "btn btn-lg btn-primary btn-block login-button">
					<!-- <button type="submit" class="btn btn-primary login-button">
						Login <img src='Design/Icons/login.png' class='login-icon-submit' alt='Login icon'>
					</button> -->
				</div>
			</form>
		</div> 
	</body>
</html>