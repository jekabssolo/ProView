
<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
    <?php
      require_once "functions/function.php";
      $projects = getProjects($_GET['id']);
      $title = $projects["Name"];
      require_once "blocks/head.php";
     ?>
  </head>
  <body>
    <div class='dropdown'>
      <button class='dropbtn'>
        Sekcija
        <i class='fa fa-caret-down'></i>
      </button>
      <div class='dropdown-content'>
        <a class='selected'>Par projektu</a>
        <?php 
            echo "<a href='status.php?id=".$projects["ID"]."'>Status</a>";
          ?>
      </div>
    </div>

    <?php
      echo "<section class='b-content'>";
      echo "<div class='wrap'>";
      echo "<article class='b-article'>";
      echo "<h1 class='header-1'>".$projects["Name"]."</h1>";
      echo "<hr>";
      echo "<div class='tr-details'>";
      echo "<b>Projekta finansētājs: </b>".$projects["Financer"]."<br><br>";
      echo "<b>Statuss: </b>".$projects["Status"]."<br><br>";
      echo "<b>Projekta numurs: </b>".$projects["Number"]."<br><br>";
      echo "<b>Projekta programma/SAM: </b>".$projects["SAM"]."<br><br>";
      echo "<b>Projekta budžets: </b>".$projects["Budget"]." EUR", "<br><br>";
      echo "<b>Projekta mērķis</b>", "<br>".$projects["Purpose"]."<br><br>";
      echo "<b>Galvenās aktivitātes</b>", "<br>".$projects["Activities"]."<br><br>";
      echo "<b>Īstenošanas laiks: </b>", date("d.m.Y.", strtotime($projects["StartDate"])), " - ", date("d.m.Y.", strtotime($projects["FinishDate"])), "<br><br>";
      echo "<b>Koordinators: </b>".$projects["CoordinatorName"]."<br><br>";
      echo "<b>Kontakti: </b>".$projects["CoordinatorContacts"]."<br><br>";
      echo "</div>";
      echo "<hr>";
      echo "</article>";
      echo "</div>";
      echo "</section>";
      echo "<a href='index.php'>Back to homepage</a>";
     ?>
  </body>
</html>
