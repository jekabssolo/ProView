<?php
  require_once "connect.php";

  function updateExisting($id, $name, $financer, $status, $number, $category, $sam, $budget, $budgetspent, $purpose, $activities, $sdate, $fdate, $cname, $ccontact, $cemail) {


    global $mysqli;
    connectDB();

    $query = "UPDATE projekti
    SET Name = ?, Financer = ?, Status = ?, Number = ?, Category = ?, SAM = ?, Budget = ?, BudgetSpent = ?, Purpose = ?, Activities = ?, StartDate = ?, FinishDate = ?, coordinatorName = ?, CoordinatorContacts = ?, CoordinatorEmail = ?
    WHERE ID = ?;";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param("ssssssssssssssss", $name, $financer, $status, $number, $category, $sam, $budget, $budgetspent, $purpose, $activities, $sdate, $fdate, $cname, $ccontact, $cemail, $id);
    $stmt->execute();


    closeDB();

    $respons = "Saglabāts";
    return $respons;
  }

  function newUpdate($id, $date, $update){

    global $mysqli;
    connectDB();

    $query = "INSERT INTO atjauninajumi (Date, Comments, projectID)
    VALUES (?, ?, ?)";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param("sss", $date, $update, $id);
    $stmt->execute();

    closeDB();

    $respons = "Jaunums pievienots";
    return $respons;

  }

?>