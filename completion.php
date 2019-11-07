<?php 

  function completionCheck($completionStatus){
    if ($completionStatus == "Voting"){
      return $completionBar = 175;
    }else if($completionStatus == "Planning"){
      return $completionBar = 350;
    }else if($completionStatus == "Active"){
      return $completionBar = 525;  
    }else if($completionStatus == "Completed"){
     return  $completionBar = 700;  
    }
  };
?>