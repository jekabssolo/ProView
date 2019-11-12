<!DOCTYPE html>
<html>
    <head>
        <?php 
          require_once "functions/function.php";
          $projects = getProjects($_GET['id']);
          $completion = completionStatusRow($_GET['id']);
          $updateComments = updateLog($_GET['id']);
          require_once "blocks/head.php"; 
        ?>
    </head>
    <body>
      <h1 class='header-1'>
        <?php echo $projects["Name"]; ?>
      </h1>
      <div class='dropdown'>
        <button class='dropbtn'>
          Sekcija
          <i class='fa fa-caret-down'></i>
        </button>
        <div class='dropdown-content'>
          
          <?php 
            echo "<a href='individualAbout.php?id=".$projects["ID"]."'>Par projektu</a>";
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

      <h1>Update log</h1>
      <div id="updateLog">
        <h2 class='updateData'>
          <?php 
          for ($i = 0; $i< count($updateComments); $i++){
            echo $updateComments[$i]["Date"];
          ?>
          <?php echo $updateComments[$i]["Comments"];
          ?>
          </br> 
          <?php 
          };
          ?>
      </div>
      <h1>Budget Overview</h1>
      <div id="budgetChart">
        <div id="budgetPie">
          <script>budgetChart([
          ['Budžeta veids', 'Daudzums eiro'],
          ['Iztērēts',     <?php echo $projects['BudgetSpent']?>],
          ['Kopējs projekta budžets', <?php echo $projects['Budget']?>]
          ]);</script>
        </div>

        <div id="allBudgetPie">
          <script>allBudgetChart([
          ['Budžeta veids', 'Daudzums eiro'],
          ['Šī projekta budžets',     <?php echo $projects['BudgetSpent']?>],
          ['Visu projektu budžets', <?php echo budgetSum();?>]
          ]);</script>
        </div>
      </div>
    </body>
</html>