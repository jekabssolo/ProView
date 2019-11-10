<!DOCTYPE html>
<html>
    <head>
        <?php 
          require_once "functions/function.php";
          $projects = getProjects($_GET['id']);
          $completion = completionStatusRow($_GET['id']);
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
      <h1>Budget Overview</h1>
    </body>
</html>