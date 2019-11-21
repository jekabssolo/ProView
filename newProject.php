<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
  <title>Jauns projekts</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/buttons.css" rel="stylesheet">

  <!-- Starts the session -->
  <?php session_start();  
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
  <?php
      require_once "functions/function.php";
      require_once "blocks/head.php";
      /*Financiers from DB*/
      $financierList = financiers();
    ?>
 <?php
    $financer = "Pašvaldība";
    $status = "Iesniegts";
  ?>
  </head>
  <body>
  <a class="back-button" href="index.php"><span>Visi Projekti</span></a>

      <!-- Logout field -->
      <a class="logout" href="logout.php">Iziet!</a>      
      <hr>
      <section class='b-content'>
        <div class='wrap'>
          <article class='b-article'>
            <form action="functions/saveproject.php" method="post" class="edit-info" id="changes">
              <b>Projekta nosaukums: </b>
              <br>              
              <input name="Name" type="text" size="99" maxlength="21844" value="">
              <br><br>

              <!-- Dropdown menu with financiers -->
              <b>Projekta finansētājs: </b>
              <br>
              <select size="1" name="Financer">
                <option value='Pašvaldība' <?php echo $financer == 'Pašvaldība' ? 'selected' : '' ?>>Pašvaldība</option>
                <option value='Cits' <?php echo $financer == 'Cits' ? 'selected' : '' ?>>Cits</option>
                <option value='ELFLA' <?php echo $financer == 'ELFLA' ? 'selected' : '' ?>>ELFLA</option>
                <option value='ERAF' <?php echo $financer == 'ERAF' ? 'selected' : '' ?>>ERAF</option>
                <option value='ESF' <?php echo $financer == 'ESF' ? 'selected' : '' ?>>ESF</option>
                <option value='KF' <?php echo $financer == 'KF' ? 'selected' : '' ?>>KF</option>
                <option value='KPFI' <?php echo $financer == 'KPFI' ? 'selected' : '' ?>>KPFI</option>
                <option value='LAT-LIT' <?php echo $financer == 'LAT-LIT' ? 'selected' : '' ?>>LAT-LIT</option>
                <option value='NFI' <?php echo $financer == 'NFI' ? 'selected' : '' ?>>NFI</option>
                <option value='Valsts' <?php echo $financer == 'Valsts' ? 'selected' : '' ?>>Valsts</option>
              </select>
              <br><br>

              <!-- Dropdown menu with status -->
              <b>Statuss: </b>
              <br>
              <select size="1" name="Status">
                <option value='Aktīvs' <?php echo $status == 'Aktīvs' ? 'selected' : '' ?>>Aktīvs</option>
                <option value='Arhivēts' <?php echo $status == 'Arhivēts' ? 'selected' : '' ?>>Arhivēts</option>
                <option value='Plānošana' <?php echo $status == 'Plānošana' ? 'selected' : '' ?>>Plānošana</option>
                <option value='Balsošana' <?php echo $status == 'Balsošana' ? 'selected' : '' ?>>Balsošana</option>
                <option value='Iesniegts' <?php echo $status == 'Iesniegts' ? 'selected' : '' ?>>Iesniegts</option>
              </select>
              <br><br>

              <b>Projekta numurs: </b>
              <br>
              <input name="Number" type="text" size="30" maxlength="21844" value="">
              <br><br>

              Projekta programma/SAM: </b>
              <br>
              <textarea name="SAM" rows="5" cols="40"></textarea>
              <br><br> 

              <b>Projekta budžets: </b>
              <br><br>

              <b>Kopējais budžets: </b>
              <br>
              <input name="Budget" type="number" maxlength="21844" value="">
              EUR 
              <br><br>

              <b>Iztērētais budžets: </b>
              <br>
              <input name="BudgetSpent" type="number" maxlength="21844" value="">
              EUR 
              <br><br>

              <!-- All financiers from DB -->
              <b>Finansētāji: </b>
              <br>
              <?php 
                foreach($financierList as $keypair => $valuePair){
                  ?><H1> <?php echo $keypair; ?> </H1>
                  <input name="<?php echo $keypair;?>" type="number" maxlength="21844" value="">
                  EUR 
                  <br><br>
              <?php
                };
              ?>
              
              <b>Projekta mērķis</b>
              <br>
              <textarea name="Purpose" rows="5" cols="80"></textarea>
              <br><br>

              <b>Galvenās aktivitātes</b> <br>
              <textarea name="Activities" rows="7" cols="100"></textarea>
              <br><br>

              <b>Īstenošanas laiks: </b>
              <br><br>
              <b>Sākšanas datums: </b>
              <br>
              <input name="StartDate" type="date" value="">
              <br><br>

              <b>Beigšanas datums: </b>
              <br>
              <input name="FinishDate" type="date" value="">
              <br><br>

              <b>Koordinators: </b>
              <br>
              <input name="CoordinatorName" type="text" size="25" maxlength="21844" value="">
              <br><br>

              <b>Kontakti: </b>
              <br>
              <input name="CoordinatorContacts" type="text" size="25" maxlength="21844" value="">
              <br><br>
              <!-- saving button -->
              <button class="btn" type="Submit"><i class='fa fa-save' id="save"></i></button>              
              <hr>
            </form>
          </article>
        </div>
     </section>
  </body>
</html>