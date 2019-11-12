<?php
  require_once "connect.php";

  function getProjects($id) {
    global $mysqli;
    connectDB();
    if($id){
      $query = "SELECT * FROM projekti WHERE ID = ".$id;
    } else {
      $query = "SELECT * FROM projekti";
    }

    $result = mysqli_query($mysqli, $query);
    closeDB();
    if(!$id){
      return resultToArray($result);
    }else{
      return mysqli_fetch_assoc($result);
    };
  };

  function resultToArray($result){
    $array = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $array[] = $row;
    };
    return $array;
  }

  function completionStatusRow($id){
    global $mysqli;
    connectDB();
    $query = "SELECT Status FROM projekti WHERE ID = ".$id;    
    $result = mysqli_query($mysqli, $query);
    closeDB();
    $status = mysqli_fetch_assoc($result);
    if ($status["Status"] == "Iesniegts"){
      $barWidth = "0%";
      return $barWidth;
    };
    if ($status["Status"] == "Balsošana"){
      $barWidth = "19.5%";
      return $barWidth;
    };
    if ($status["Status"] == "Plānošana"){
      $barWidth = "50%";
      return $barWidth;
    };
    if ($status["Status"] == "Aktīvs"){
      $barWidth = "69.5%";
      return $barWidth;
    };
    if ($status["Status"] == "Arhivēts"){
      $barWidth = "99.6%";
      return $barWidth;
    }
  }

  function updateLog($id){
    global $mysqli;
    connectDB();
    $query = "SELECT Date, Comments FROM atjauninajumi WHERE projectID = ".$id;    
    $result = mysqli_query($mysqli, $query);
    closeDB();
    return resultToArray($result);
  }

  function budgetSum(){
    global $mysqli;
    connectDB();
    $query = "SELECT Budget FROM projekti";    
    $result = mysqli_query($mysqli, $query);
    closeDB();
    $budgets = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $allBudget = 0;
    for($i = 0; $i < count($budgets); $i++){
      $allBudget += $budgets[$i]["Budget"];
    }
    return $allBudget;
  }
 ?>
