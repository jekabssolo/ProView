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

  function completionStatusRow($status){
    if ($status == "Iesniegts"){
      $barWidth = "0%";
      return $barWidth;
    };
    if ($status == "Balsošana"){
      $barWidth = "19.5%";
      return $barWidth;
    };
    if ($status == "Plānošana"){
      $barWidth = "50%";
      return $barWidth;
    };
    if ($status == "Aktīvs"){
      $barWidth = "69.5%";
      return $barWidth;
    };
    if ($status == "Arhivēts"){
      $barWidth = "99.6%";
      return $barWidth;
    }
  }

  function budgetSum($projectBudget){
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
    return $allBudget-$projectBudget;
  }

  function dataToVariables($id){
    global $mysqli;
    connectDB();
    // Settings for query
    $query = "SELECT projekti.Name, projekti.Status, projekti.BudgetSpent, projekti.Budget, atjauninajumi.Date, atjauninajumi.Comments, finansetajs.* 
    FROM projekti
    LEFT JOIN finansetajs ON projekti.ID = finansetajs.project_id
    LEFT JOIN atjauninajumi ON projekti.ID = atjauninajumi.projectID
    WHERE projekti.ID =".$id;    
    $result = mysqli_query($mysqli, $query);
    closeDB();
    // get all data with previously specified settings
    $dataR = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // assign project name from DB to variable
    $projectName = $dataR[0]["Name"];
    // assign project status from DB to variable
    $projectStatus = $dataR[0]["Status"];
    // assign spent project's budget from DB to variable
    $budgetSpent = $dataR[0]["BudgetSpent"];
    // assign project's budget from DB to variable
    $projectBudget = $dataR[0]["Budget"];
    // assign project updates and date of updates from DB to array
    $updateDate = array();
    for($i=0; $i < count($dataR); $i++){
      $updateDate[$dataR[$i]["Date"]] = $dataR[$i]["Comments"];
    };
    // assign all project financers from DB to array
    $financier =  array_slice($dataR[0],8);
    foreach($financier as $keypair => $valuePair){
      if($financier[$keypair] == 0){
        unset($financier[$keypair]);
      }
    };
    return [$projectName, $projectStatus, $budgetSpent, $projectBudget, $updateDate, $financier];
  }
  
  function intToMoney($amount){
    $money = floatval($amount) / 100;
    return $money;
  }

  function moneyToInt($amount){
    if($amount){
      if ($amount < 0){
        $amount = $amount * -1;
      }
      $result = intval($amount*100);
      return $result;
    };
  }

  function financiers(){
    global $mysqli;
    connectDB();
    $query = "SELECT * FROM finansetajs";    
    $result = mysqli_query($mysqli, $query);
    closeDB();
    $financierArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $financierArray =  array_slice($financierArray[0],2);
    return $financierArray;
  }
  
 ?>
