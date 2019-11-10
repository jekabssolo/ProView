<?php
require_once "connect.php";

  function getProjectscontaining($finanval, $statusval, $searchval, $budgetsort, $entrysort) {
    global $mysqli;
    connectDB();
    if ($budgetsort == "" && $entrysort == ""){
        $orderval = "";
    }else if ($budgetsort != "" && $entrysort == ""){
        $orderval = "ORDER BY Budget ".$budgetsort;
    }else if ($budgetsort == "" && $entrysort != ""){
        $orderval = "ORDER BY Entry ".$entrysort;
    }else{
        $orderval = "ORDER BY Entry ".$entrysort.", Budget ".$budgetsort;
    }
    $query = "SELECT * FROM projekti WHERE ((Status like '%$statusval%' AND Financer like '%$finanval%') AND Name LIKE '%$searchval%') $orderval";
    

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