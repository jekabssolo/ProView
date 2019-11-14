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
    <?php
      // require_once "functions/update.php";
      // updateExisting($_GET['id']);
    ?>
  </head>
  <body>
    <a class="back-button" href="admin.php"><span>Visi Projekti</span></a>

            <!-- Logout field -->
            <a class="logout" href="logout.php">Iziet!</a>
      <hr>



      <section class='b-content'>
      <div class='wrap'>
      <article class='b-article'>

      
      <form method="post" class="edit-info">
      <b>Projekta nosaukums: </b><br>
      <input name="Name" type="text" size="99" maxlength="21844" value="<?php echo $projects["Name"]; ?>">

      <br><br>
      <b>Projekta finansētājs: </b><br>

      <select size="1" name="Financer">
              <option value='Pašvaldība' <?php echo $projects["Financer"] == 'Pašvaldība' ? 'selected' : '' ?>>Pašvaldība</option>
              <option value='Cits' <?php echo $projects["Financer"] == 'Cits' ? 'selected' : '' ?>>Cits</option>
              <option value='ELFLA' <?php echo $projects["Financer"] == 'ELFLA' ? 'selected' : '' ?>>ELFLA</option>
              <option value='ERAF' <?php echo $projects["Financer"] == 'ERAF' ? 'selected' : '' ?>>ERAF</option>
              <option value='ESF' <?php echo $projects["Financer"] == 'ESF' ? 'selected' : '' ?>>ESF</option>
              <option value='KF' <?php echo $projects["Financer"] == 'KF' ? 'selected' : '' ?>>KF</option>
              <option value='KPFI' <?php echo $projects["Financer"] == 'KPFI' ? 'selected' : '' ?>>KPFI</option>
              <option value='LAT-LIT' <?php echo $projects["Financer"] == 'LAT-LIT' ? 'selected' : '' ?>>LAT-LIT</option>
              <option value='NFI' <?php echo $projects["Financer"] == 'NFI' ? 'selected' : '' ?>>NFI</option>
              <option value='Valsts' <?php echo $projects["Financer"] == 'Valsts' ? 'selected' : '' ?>>Valsts</option>
          </select>

      <br><br>
      <b>Statuss: </b><br>

      <select size="1" name="Status">
          <option value='Aktīvs' <?php echo $projects["Status"] == 'Aktīvs' ? 'selected' : '' ?>>Aktīvs</option>
          <option value='Arhivēts' <?php echo $projects["Status"] == 'Arhivēts' ? 'selected' : '' ?>>Arhivēts</option>
          <option value='Plānošana' <?php echo $projects["Status"] == 'Plānošana' ? 'selected' : '' ?>>Plānošana</option>
          <option value='Balsošana' <?php echo $projects["Status"] == 'Balsošana' ? 'selected' : '' ?>>Balsošana</option>
          <option value='Iesniegts' <?php echo $projects["Status"] == 'Iesniegts' ? 'selected' : '' ?>>Iesniegts</option>
      </select>

      <br><br>
      <b>Projekta numurs: </b><br>
      <input name="Number" type="text" size="30" maxlength="21844" value="<?php echo $projects["Number"]; ?>">
      <br><br>

      Projekta programma/SAM: </b><br>
      <textarea name="SAM" rows="5" cols="40"><?php echo $projects["SAM"]; ?></textarea>
      <br><br> 

      <b>Projekta budžets: </b><br><br>
      <b>Kopējais budžets: </b><br>
      <input name="Budget" type="number" maxlength="21844" value="<?php echo
      intToMoney($projects["Budget"]); ?>">
      EUR <br><br>
      <b>Iztērētais budžets: </b><br>
      <input name="BudgetSpent" type="number" maxlength="21844" value="<?php echo
      intToMoney($projects["BudgetSpent"]); ?>">
      EUR <br><br>

      <b>Projekta mērķis</b> <br>
      <textarea name="Purpose" rows="5" cols="80"><?php echo $projects["Purpose"]; ?></textarea>
      <br><br>

      <b>Galvenās aktivitātes</b> <br>
      <textarea name="Activities" rows="7" cols="100"><?php echo $projects["Activities"]; ?></textarea>
      <br><br>

      <b>Īstenošanas laiks: </b><br><br>
      <b>Sākšanas datums: </b><br>
      <input name="StartDate" type="date" value="<?php echo $projects["StartDate"];?>">
      <br><br>
      <b>Beigšanas datums: </b><br>
      <input name="FinishDate" type="date" value="<?php echo $projects["FinishDate"];?>">
      <br><br>

      <b>Koordinators: </b><br>
      <input name="CoordinatorName" type="text" size="25" maxlength="21844" value="<?php echo $projects["CoordinatorName"]; ?>">
      <br><br>

      <b>Kontakti: </b><br>
      <input name="CoordinatorContacts" type="text" size="25" maxlength="21844" value="<?php echo $projects["CoordinatorContacts"]; ?>">
      <br><br>


      <hr>
      </form>

      </article>
      </div>
     </section>
  </body>
</html>
