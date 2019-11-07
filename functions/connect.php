<?php
  $mysqli = false;
  
  function connectDB() {
    global $mysqli;
    $mysqli = mysqli_connect(
                'localhost',  /*hosting*/
                'root',  /*login */
                '',/*password */
                'bauska_projects'); /*Data base name */
    mysqli_set_charset($mysqli,"utf8");
  };

  function closeDB(){
    global $mysqli;
    mysqli_close($mysqli);
  };
 ?>
