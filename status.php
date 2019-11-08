<!DOCTYPE html>
<html>
    <head>
        <?php 
          require_once "functions/function.php";
          $projects = getProjects($_GET['id']);
          require_once "blocks/head.php"; 
        ?>
    </head>
    <body>
      <?php
        echo "<h1 class='header-1'>".$projects["Name"]."</h1>";
      ?>
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
      <div id="progressBorder">
        <div id="progressBar"></div>
      </div>
      <div id="progressTitle">
          <h2>Voting</h2>
          <h2>Planning</h2>
          <h2>Active</h2>
          <h2>Completed</h2>
      </div>
      <h1>Project completion</h1>
      <h1>Update log</h1>
      <h1>Budget Overview</h1>
    </body>
    <script src="script.js"></script>
</html>
