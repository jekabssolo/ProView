<?php
    require_once "connect.php";
    require_once "function.php";    
    $financierList = financiers();
    
    /*Get values from filled form*/
    $name = $_POST["Name"];
    $financer = $_POST["Financer"];
    $status = $_POST["Status"];
    $number = $_POST["Number"];
    $sam = $_POST["SAM"];
    $budget = intToMoney(moneyToInt($_POST["Budget"]));
    $budgetspent = intToMoney(moneyToInt($_POST["BudgetSpent"]));
    $purpose = $_POST["Purpose"];
    $activities = $_POST["Activities"];
    $startdate = $_POST["StartDate"];
    $finishdate = $_POST["FinishDate"];
    $cname = $_POST["CoordinatorName"];
    $ccontacts = $_POST["CoordinatorContacts"];
    saveNewProject($financierList, $name, $financer, $status, $number, $sam, $budget, $budgetspent, $purpose, $activities, $startdate, $finishdate, $cname, $ccontacts);


    
    function saveNewproject($financierList, $name, $financer, $status, $number, $sam, $budget, $budgetspent, $purpose, $activities, $startdate, $finishdate, $cname, $ccontacts){
      global $mysqli;
      connectDB();
      /*Check if required fields are filled. If not provide link to previous field*/
      if($name == '' or $status == '' or $number == '' or $budget == '' or $purpose == '' or $cname == '' or $ccontacts == ''){
        echo "Aizpildiet visus nepieciešamos laukus!";
      ?><a href="javascript:history.go(-1)">Atpakaļ pie jaunā projekta.</a><?php 
      /*Insert values in projekti table in DB*/ 
      }else{
        $query = "INSERT INTO projekti (Name, Financer, Status, Number, SAM, Budget, BudgetSpent, Purpose, Activities, StartDate, FinishDate, CoordinatorName, CoordinatorContacts)
        VALUES ('$name', '$financer', '$status', '$number', '$sam', $budget, $budgetspent, '$purpose', '$activities', '$startdate', '$finishdate', '$cname', '$ccontacts')";
        mysqli_query($mysqli, $query);
        closeDB();
        $respons = "Saglabāts";
        print_r($query);
        echo $respons;
        saveFinancier($number, $financierList);
      }
    };   

    /*Get financiers and values into strings to later insert them in query*/
    function saveFinancier($projectNumber, $financierList){
      $financierNames = "";
      $financierValues = "";
      foreach($financierList as $keyPair => $valuePair){      
        if($_POST["$keyPair"] != ''){
          $financierNames = $financierNames.", ".$keyPair;
          $financierValues = $financierValues.", ".$_POST["$keyPair"];
        }  
        echo ('Financier names=');
        print_r($financierNames);
        echo ('Financier values=');
        print_r($financierValues);
      };

      global $mysqli;
      connectDB();
      $query = "SELECT ID FROM projekti ORDER BY ID DESC LIMIT 1";
      $result = mysqli_query($mysqli, $query);
      $projectID = mysqli_fetch_all($result,MYSQLI_ASSOC);
      $projectID = $projectID[0]['ID'];
      $queryFinancier = "INSERT INTO finansetajs (project_id $financierNames)
      VALUES ($projectID $financierValues)";
      mysqli_query($mysqli, $queryFinancier);
      closeDB();
      echo $queryFinancier;
      echo('Project ID=');
      print_r($projectID);

      /*When done send to the main project page with admin access*/
      header("location:../admin.php");
      exit;
    };

?>