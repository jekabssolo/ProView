<?php
  $mysqli = false;
  
  function connectDB() {
    global $mysqli;
    $mysqli = new mysqli(
                'localhost',  /*hosting*/
                'root',  /*login */
                '',/*password */
                'bauska_projects'); /*Data base name */
    if($mysqli->connect_error) {
      exit('Error connecting to database'); //Should be a message a typical user could understand in production
    }
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli->set_charset("utf8mb4");
  };

  function closeDB(){
    global $mysqli;
    mysqli_close($mysqli);
  };
 ?>
