<?php
  require_once "connect.php";

  function updateExisting($id, $name, $financer, $status, $number, $category, $sam, $budget, $budgetspent, $purpose, $activities, $sdate, $fdate, $cname, $ccontact, $cemail, $Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts){


    global $mysqli;
    connectDB();

    $query1 = "UPDATE projekti
    SET Name = ?, Financer = ?, Status = ?, Number = ?, Category = ?, SAM = ?, Budget = ?, BudgetSpent = ?, Purpose = ?, Activities = ?, StartDate = ?, FinishDate = ?, coordinatorName = ?, CoordinatorContacts = ?, CoordinatorEmail = ?
    WHERE ID = ?;";
    $stmt1= $mysqli->prepare($query1);
    $stmt1->bind_param("ssssssssssssssss", $name, $financer, $status, $number, $category, $sam, $budget, $budgetspent, $purpose, $activities, $sdate, $fdate, $cname, $ccontact, $cemail, $id);
    $stmt1->execute();

    $query2 = "UPDATE finansetajs
    SET Municipality = ?, Cits = ?, ELFLA = ?, ERAF = ?, ESF = ?, KF = ?, KPFI = ?, LATLIT = ?, NFI = ?, Valsts = ?
    WHERE project_id = ?;";
    $stmt2= $mysqli->prepare($query2);
    $stmt2->bind_param("sssssssssss", $Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts, $id);
    $stmt2->execute();


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