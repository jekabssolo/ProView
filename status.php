<!DOCTYPE html>
<html>
    <head>
        <!-- Load d3.js & color scale -->
        <script src="https://d3js.org/d3.v4.js"></script>
        <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <?php 
          require_once "functions/function.php";
          $projectData = dataToVariables($_GET['id']);
          $completion = completionStatusRow($projectData[1]);
          $budgetCategory = $projectData[2];
          $updateComments = $projectData[5];
          $budgetSpent = $projectData[3];
          $projectBudget = $projectData[4];
          require_once "blocks/head.php"; 
        ?>
    </head>
    <body>
      <h1 class='header-1'>
        <?php echo $projectData[0]; ?>
      </h1>
      <a class="back-button" href="index.php"><span>Visi Projekti</span></a>
      <div class='dropdown'>
        <button class='dropbtn'>
          Sekcija
          <i class='fa fa-caret-down'></i>
        </button>
        <div class='dropdown-content'>          
          <?php 
            echo "<a href='individualAbout.php?id=".$_GET["id"]."'>Par projektu</a>";
          ?>
          <a class='selected'>Statuss</a>
        </div>
      </div>  

      <h1>Projekta statuss</h1>
      <div id="progressBorder">
        <?php echo '<div id="progressBar" style="width:'.$completion.'"></div>' ?>
      </div>
      <div id="statusWrapper">
        <div class="progressStatus"><h2>Iesniegts</h2></div>
        <div class="progressStatus"><h2>Balsošana</h2></div>
        <div class="progressStatus"><h2>Plānošana</h2></div>
        <div class="progressStatus"><h2>Aktīvs</h2></div>
        <div class="progressStatus"><h2>Arhivēts</h2></div>
      </div>

      <h1>Jaunumi</h1>
      <div id="updateLog">
        <h2 class='updateData'>
          <?php
            ksort($updateComments);
            foreach($updateComments as $keypair => $valuePair){
              if(!empty($keypair) and !empty($valuePair)){
                for($i=0; $i < count($valuePair); $i++){
                  echo date("d.m.Y.", strtotime($keypair));
                  ?>&nbsp<?php      
                  echo $valuePair[$i];
                  ?></br><?php
                };
              };
            };
          ?>
        </h2>
      </div>
      <h1>Budžeta pārskats</h1>
      <div id="budgetChart">
        <div id="budgetPie">
          <script>budgetChart([
          ['Budžeta veids', 'Daudzums eiro'],
          ['Iztērēts', <?php echo intToMoney($budgetSpent);?>],
          ['Atlikušais projekta budžets', <?php echo intToMoney($projectBudget - $budgetSpent);?>]
          ]);</script>
        </div>
        <div id="allBudgetPie">        
          <script>allBudgetChart([
          ['Budžeta veids', 'Daudzums eiro'],
          ['Šī projekta budžets', <?php echo intToMoney($projectBudget);?>],
          ['Citu projektu budžets sekcijā', <?php echo intToMoney(budgetInCategory($projectBudget,$budgetCategory));?>]
          ]);</script>
        </div>
        <p><?php dataToVariables($_GET["id"])?></p>
      </div>
    </body>
</html>