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
 ?>
