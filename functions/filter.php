<?php
require_once "connect.php";

  function getProjectsthatstatus($statusval, $finanval) {
    global $mysqli;
    connectDB();
    if($statusval){
      $query = "SELECT * FROM projekti WHERE Status like '%$statusval%' AND Financer like '%$finanval%'";
    } else {
      $query = "SELECT * FROM projekti";
    }

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