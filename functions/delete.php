<?php
  require_once "connect.php";

  function deleteProject($id) {
    global $mysqli;
    connectDB();

      $query = "DELETE FROM projekti WHERE ID = $id";

    mysqli_query($mysqli, $query);
    closeDB();
  }
 ?>