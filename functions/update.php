<?php
  require_once "connect.php";

  function updateExisting($id, $name, $financer, $status, $number, $sam, $budget, $budgetspent, $purpose, $activities, $sdate, $fdate, $cname, $ccontact) {
    global $mysqli;
    connectDB();

    $query = "UPDATE projekti
              SET Name = $name, Financer = $financer, Status = $status, Number = $number, SAM = $sam, Budget = $budget, Purpose = $purpose, Activities = $activities, StartDate = $sdate, FinishDate = $fdate, CoordinatorName = $cname, CoordinatorContacts = $ccontact, BudgetSpent = $budgetspent
              WHERE ID = $id;";
    
    mysqli_query($mysqli, $query);

    closeDB();
  }
?>