<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
  <link href="css/buttons.css" rel="stylesheet">
    <?php
      require_once "functions/function.php";
      $projects = getProjects($_GET['id']);
      $title = $projects["Name"];
      require_once "blocks/head.php";
     ?>
     <?php
      function intToMoney($amount){
      $money = floatval($amount) / 100;
      return $money;
      }
    ?>
  </head>
  <body>
    <a class="back-button" href="index.php"><span>Visi Projekti</span></a>

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

      <hr>
      <section class='b-content'>
      <div class='wrap'>
      <article class='b-article'>
      <h1 class='header-1'>
      <?php echo $projects["Name"]; ?>
      </h1>
      <hr>
      <div class='tr-details'>
      <b>Projekta finansētājs: </b>
      <?php echo $projects["Financer"]; ?>
      <br><br>
      <b>Statuss: </b>
      <?php echo $projects["Status"]; ?>
      <br><br>
      <b>Projekta numurs: </b>
      <?php echo $projects["Number"]; ?>
      <br><br>
      Projekta programma/SAM: </b>
      <?php echo $projects["SAM"]; ?>
      <br><br> 
      <b>Projekta budžets: </b>
      <?php echo
      intToMoney($projects["Budget"]); ?>
      EUR <br><br>
      <b>Projekta mērķis</b> <br>
      <?php echo $projects["Purpose"]; ?>
      <br><br>
      <b>Galvenās aktivitātes</b> <br>
      <?php echo $projects["Activities"]; ?>
      <br><br>
      <b>Īstenošanas laiks: </b>
      <?php echo date("d.m.Y.", strtotime($projects["StartDate"])), " - ", date("d.m.Y.", strtotime($projects["FinishDate"])); ?>
      <br><br>
      <b>Koordinators: </b>
      <?php echo $projects["CoordinatorName"]; ?>
      <br><br>
      <b>Kontakti: </b>
      <?php echo $projects["CoordinatorContacts"]; ?>
      <br><br>
      </div>
      <hr>
      </article>
      </div>
     </section>
  </body>
</html>
