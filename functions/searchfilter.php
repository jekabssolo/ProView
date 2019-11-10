<?php
require_once "connect.php";

  function getProjectscontaining($finanval, $statusval, $searchval) {
    global $mysqli;
    connectDB();
    $query = "SELECT * FROM projekti WHERE ((Status like '%$statusval%' AND Financer like '%$finanval%') AND Name LIKE '%$searchval%')";
    

    $result = mysqli_query($mysqli, $query);
    closeDB();
      return resultToArrayi($result);
  };

  function resultToArrayi($result){
    $array = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $array[] = $row;
    };
    return $array;
  }
?>