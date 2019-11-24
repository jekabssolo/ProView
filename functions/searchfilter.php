<?php
require_once "connect.php";

  function getProjectscontaining($finanval, $statusval, $categoryval, $searchval, $budgetsort, $entrysort) {
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
    $query = "SELECT * FROM projekti WHERE ((Status like '%$statusval%' AND Financer like '%$finanval%' AND Category like '%$categoryval%') AND Name LIKE ?) $orderval";
    
    if($stmt = mysqli_prepare($mysqli, $query)){
      mysqli_stmt_bind_param($stmt, "s", $param_term);
      $param_term = '%' . $searchval . '%';
      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
      closeDB();
      return resultToArrayi($result);
      }
    }
  };

  function resultToArrayi($result){
    $array = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $array[] = $row;
    };
    return $array;
  }
?>