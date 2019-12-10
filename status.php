<!DOCTYPE html>
<html>
    <head>
    		<!--Favicon-->
		    <link rel="icon" type="image/png" href="../Design/Icons/output-onlinepngtools.ico">
        <!-- Load d3.js & color scale -->
        <script src="https://d3js.org/d3.v4.js"></script>
        <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- FONT -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>Projekta statuss</title>

        <?php 
          require_once "functions/function.php";
          $projectData = dataToVariables($_GET['id']);
          $completion = completionStatusRow($projectData[1]);
          $budgetCategory = $projectData[2];
          $updateComments = $projectData[5];
          $budgetSpent = $projectData[3];
          $projectBudget = $projectData[4];
          require_once "blocks/head.php"; 

          $projects = getProjects($_GET['id']);
        ?>
    </head>
    <body>
      <header class="shadow-sm">
        <div class="container">
          <div class="row">
            <div class="col-md">
              <a class="header-logo" href="/">
                <img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
              </a>
            </div>
            <div class="col-md">
              <div class="header-center">
                <?php 
                  switch ($projectData[1]) {
                    case 'Aktīvs':
                      $background = "rgb(33, 150, 83, 0.3)";
                      $border = "#219653";
                      $color = "#219653";
                      break;
                    case 'Arhivēts':
                      $background = "#F2994A";
                      $border = "#F2994A";
                      $color = "#6D4623";
                      break;
                    case 'Plānošana':
                      $background = "rgb(242, 201, 76, 0.3)";
                      $border = "#F2C94C";
                      $color = "#786B41";
                      break;
                    case 'Balsošana':
                      $background = "rgb(155, 81, 224, 0.3)";
                      $border = "#9B51E0";
                      $color = "#9B51E0";
                      break;
                    case 'Iesniegts':
                      $background = "rgb(242, 153, 74, 0.3)";
                      $border = "#F2994A";
                      $color = "#A76D3C";
                      break;
                    default:
                      $background = "rgb(242, 153, 74, 0.3)";
                      $border = "#F2994A";
                      $color = "#A76D3C";
                  }
                  echo "<span class='status-text' style='background:" . $background . "; border: 2px solid " . $border . "; color: " . $color . "'>".$projectData[1]."</span>";
                ?>
              </div>
            </div>
            <div class="col-md">
              <div class='center admin-button' onclick='window.location="<?php echo "individualAbout.php?id=" . $projects["ID"] ?>"'>
                <img src='Design/Icons/icon.png' class='admin-icon' alt='Stats icon'>
                Par projektu
              </div>
            </div>
          </div>
      </header>

      <div class="container">
        <div class="row">
          <div class="col-md-12 shadow-sm p-3 mb-5 bg-white rounded individual-main-container">
            <div class="status-title">
              <h1>Projekta statuss</h1>
            </div>
            <div class="progress mt-5 mb-3">
              <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $completion; ?>"></div>
            </div>
            <div id="statusWrapper" class="mb-5">
              <div class="progressStatus"><span class='status-text' style='background: rgb(242, 153, 74, 0.3); border: 2px solid #F2994A; color: #A76D3C;'>Iesniegts</span></div>
              <div class="progressStatus"><span class='status-text' style='background: rgb(155, 81, 224, 0.3); border: 2px solid #9B51E0; color: #9B51E0;'>Balsošana</span></div>
              <div class="progressStatus"><span class='status-text' style='background: rgb(242, 201, 76, 0.3); border: 2px solid #F2C94C; color: #786B41;'>Plānošana</span></div>
              <div class="progressStatus"><span class='status-text' style='background: rgb(33, 150, 83, 0.3); border: 2px solid #219653; color: #219653;'>Aktīvs</span></div>
              <div class="progressStatus"><span class='status-text' style='background: #F2994A; border: 2px solid #F2994A; color: #6D4623;'>Arhivēts</span></div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <b class="coordination-name">Jaunumi</b>
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
                </div>
                <div class="col-md-4">
                  <?php
                    if($projectBudget != 0){        
                  ?>
                    <b class="coordination-name">Šī projekta budžets</b>
                    <div id="budgetPie">
                      <script>
                        budgetChart([
                          ['Budžeta veids', 'Daudzums eiro'],
                          ['Iztērēts', <?php echo intToMoney($budgetSpent);?>],
                          ['Atlikušais projekta budžets', <?php echo intToMoney($projectBudget - $budgetSpent);?>]
                        ]);
                      </script>
                    </div>
                  <?php
                    } else {
                  ?>
                    <h2>Šī projekta budžeta pārskats šobrīd nav pieejams</h2>
                  <?php
                  };
                  ?>
                </div>
                <div class="col-md-4">
                  <?php
                    if($projectBudget != 0){        
                  ?>
                    <b class="coordination-name">Projekta budžets no visas sekcijas budžeta</b>
                    <div id="allBudgetPie">        
                      <script>
                        allBudgetChart([
                          ['Budžeta veids', 'Daudzums eiro'],
                          ['Šī projekta budžets', <?php echo intToMoney($projectBudget);?>],
                          ['Citu projektu budžets sekcijā', <?php echo intToMoney(budgetInCategory($projectBudget,$budgetCategory));?>]
                        ]);
                      </script>
                    </div>
                  <?php
                    } else {
                  ?>
                    <h2>Šī projekta budžeta pārskats šobrīd nav pieejams</h2>
                  <?php
                  };
                  ?>
                  <br>
                  <div>
                    <b>Pēdējo reizi informācija atjaunota:</b>
                    <?php echo date("d.m.Y.", strtotime($projects["UpdateDate"])); ?>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </body>
</html>