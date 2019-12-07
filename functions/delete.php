<?php
  require_once "connect.php";

  function deleteProject($id) {
    global $mysqli;
    connectDB();

      $query1 = "DELETE FROM projekti WHERE ID = $id";

    mysqli_query($mysqli, $query1);

    $query2 = "DELETE FROM finansetajs WHERE project_id = $id";

    mysqli_query($mysqli, $query2);

    $query3 = "DELETE FROM atjauninajumi WHERE projectID = $id";

    mysqli_query($mysqli, $query3);

    closeDB();
  }
 ?>