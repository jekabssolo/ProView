<!DOCTYPE html>
<html>
    <head>
      <?php
        require_once "blocks/head.php";
        require_once "functions/function.php";
        $projects = getProjects("");
       ?>
    </head>
    <body>
        <h1>ProView Bauska</h1>
        <?php
          for ($i = 0; $i< count($projects); $i++){
            echo "<section class='b-content'>";
            echo "<div class='wrap'>";
            echo "<article class='b-article'>";
            echo "<h1 class='header-1'><a href='/individualAbout.php?id=".$projects[$i]["ID"]."'>".$projects[$i]["Name"]."</a></h1>";
            echo "<hr>";
            echo "<div class='tr-details'>";
            echo "<b>Statuss: </b>".$projects[$i]["Status"]."<br><br>";
            echo "<b>Projekta numurs: </b>".$projects[$i]["Number"]."<br><br>";
            echo "<b>Īstenošanas laiks: </b>", date("d.m.Y.", strtotime($projects[$i]["StartDate"])), " - ", date("d.m.Y.", strtotime($projects[$i]["FinishDate"])), "<br><br>";
            echo "</div>";
            echo "<hr>";
            echo "</article>";
            echo "</div>";
            echo "</section>";
          };
         ?>
    </body>
</html>
