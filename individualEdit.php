<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
  <style>
      .logout{
    position: fixed;
    right: 5%;
    top: 2%;
    color: #0645AD;
    }
  </style>
  <?php session_start(); /* Starts the session */
    if(!isset($_SESSION['UserData']['Username'])){
    header("location:login.php");
    exit;
    }else{
      $now = time();
      if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Jūsu sesija ir beigusies! <a href='/login.php'>Ieiet atpakaļ</a>";
      }
    }
  ?>
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
    <a class="back-button" href="admin.php"><span>Visi Projekti</span></a>

            <!-- Logout field -->
            <a class="logout" href="logout.php">Iziet!</a>

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
