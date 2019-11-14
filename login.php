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
        header("location:admin.php");
        exit;
        } else {
        /*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Nepareizs lietotājvārds un/vai parole!</span>";
        }
        }
        ?>
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ffffff;
         }

         .container {
            text-align: center;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #000000;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
         }
         
         h2{
            text-align: center;
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Projektu Administrēšana</h2>
              
      
      
      <div class = "container">



			<form action="" method="post" name="Login_Form" class = "form-signin">
        <?php if(isset($msg)){?>
        <h4 class = "form-signin-heading"><?php echo $msg;?>
        <?php } ?>
        <br> <br>
         <input name="Username" type="text" class = "form-control" placeholder = "lietotājvārds" required autofocus>
         <input name="Password" type="password" class = "form-control" placeholder = "parole" required>
         <br>
        <input name="Submit" type="submit" value="Login" class = "btn btn-lg btn-primary btn-block">
    </form>
         
      </div> 
      
   </body>
</html>