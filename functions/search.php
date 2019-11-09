<?php
require_once "connect.php";

  function getProjectscontaining($searchval) {
    global $mysqli;
    connectDB();
    if($searchval){
      $query = "SELECT * FROM projekti WHERE Name like '%$searchval%'";
    } else {
      $query = "SELECT * FROM projekti";
    }

    $result = mysqli_query($mysqli, $query);
    closeDB();
      return resultToArrayu($result);
  };

  function resultToArrayu($result){
    $array = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $array[] = $row;
    };
    return $array;
  }
?>