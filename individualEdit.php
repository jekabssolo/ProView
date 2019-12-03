<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
  <script>function saveproject(){document.getElementById("changes").submit();}</script>
  <script>function deleteproject(){
    var conf = confirm('Vai tiešām vēlaties izdzēst projektu?');
    if(conf){
      document.getElementById("delete").submit();
    }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      .logout{
    position: absolute;
    right: 5%;
    top: 3%;
    color: #0645AD;
    }
      #success-message{
        position: absolute;
        top: 3%;
        right: 17%;
      }
      #save{
        position: absolute;
        top: 2%;
        right: 13%;
        font-size: xx-large;
        cursor: pointer;
      }
      #delete-bttn{
        position: absolute;
        top: 2%;
        right: 10%;
        font-size: xx-large;
        cursor: pointer;
      }
  </style>
  <?php session_start(); /* Starts the session */
    if(!isset($_SESSION['UserData']['Username'])){
    header("location:login.php?p=IndividualEdit.php?id=".$_GET['id']);
    exit;
    }else{
      $now = time();
      if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<script>var r = confirm('Jūsu sesija ir beigusies.'); r ? location.reload() : location.reload();</script>";
      }
    }
  ?>
  <link href="css/buttons.css" rel="stylesheet">
    <?php
      require_once "functions/function.php";
      $projects = getProjects($_GET['id']);
      $projectData = dataToVariables($_GET['id']);
      $updateComments = $projectData[5];
      $financers = financervalues($_GET['id']);
      $title = $projects["Name"];
      require_once "blocks/head.php";
     ?>

    <?php
        $name = $projects["Name"];
        $financer = $projects["Financer"];
        $status = $projects["Status"];
        $number = $projects["Number"];
        $category = $projects["Category"];
        $sam = $projects["SAM"];
        $budget = intToMoney($projects["Budget"]);
        $budgetspent = intToMoney($projects["BudgetSpent"]);
        $purpose = $projects["Purpose"];
        $activities = $projects["Activities"];
        $startdate = $projects["StartDate"];
        $finishdate = $projects["FinishDate"];
        $cname = $projects["CoordinatorName"];
        $ccontacts = $projects["CoordinatorContacts"];
        $cemail = $projects["CoordinatorEmail"];
        $Municipality = intToMoney($financers["Municipality"]);
        $Cits = intToMoney($financers["Cits"]);
        $ELFLA = intToMoney($financers["ELFLA"]);
        $ERAF = intToMoney($financers["ERAF"]);
        $KF = intToMoney($financers["KF"]);
        $KPFI = intToMoney($financers["KPFI"]);
        $ESF = intToMoney($financers["ESF"]);
        $LATLIT = intToMoney($financers["LATLIT"]);
        $NFI = intToMoney($financers["NFI"]);
        $Valsts = intToMoney($financers["Valsts"]);
    ?>


    <?php
      if (!empty($_POST['Name'])){
      require_once "functions/update.php";
      $response = updateExisting($_GET['id'], $_POST['Name'], $_POST['Financer'], $_POST['Status'], $_POST['Number'], $_POST['Category'], $_POST['SAM'], 
      moneyToInt($_POST['Budget']), moneyToInt($_POST['BudgetSpent']),  
      $_POST['Purpose'], $_POST['Activities'], $_POST['StartDate'], $_POST['FinishDate'], 
      $_POST['CoordinatorName'], $_POST['CoordinatorContacts'], $_POST['CoordinatorEmail'],
      moneyToInt($_POST['Municipality']), moneyToInt($_POST['Cits']), moneyToInt($_POST['ELFLA']), moneyToInt($_POST['ERAF']), moneyToInt($_POST['ESF']), 
      moneyToInt($_POST['KF']), moneyToInt($_POST['KPFI']), moneyToInt($_POST['LATLIT']), moneyToInt($_POST['NFI']), moneyToInt($_POST['Valsts']));
      echo "<meta http-equiv='refresh' content='0'>";
      }
    ?>

    <?php
      if (!empty($_POST['Delete'])){
        require_once "functions/delete.php";
        deleteProject($_GET["id"]);
        header("location:admin.php");
      }
    ?>

    <?php
      if (!empty($_POST['Update'])){
      require_once "functions/update.php";
      $response = newUpdate($_GET['id'], $_POST['UpdateDate'], $_POST['Update']);
      echo "<meta http-equiv='refresh' content='0'>";
      }
    ?>

  </head>
  <body>

    <a class="back-button" href="index.php"><span>Visi Projekti</span></a>

      <!-- succesful update or added news message -->
      <div id="success-message"><?php echo isset($response) ? $response : "" ?></div>

      <!-- Logout field -->
      <a class="logout" href="logout.php">Iziet</a>


      <!-- saving button -->
      <i class='fa fa-save' id="save" onclick="saveproject()"></i>

      <!-- delete button and form -->
      <i class='fa fa-trash' id="delete-bttn" onclick="deleteproject()"></i>
      <form method="post" id="delete">
      <input type="hidden" name="Delete" value="true">
      </form>


      <hr>

      <section class='b-content'>
      <div class='wrap'>
      <article class='b-article'>


      <!-- Edit project info -->

      <form method="post" class="edit-info" id="changes">


      <b>Projekta nosaukums: </b><br>
      <input name="Name" type="text" size="99" maxlength="21844" value="<?php echo $name; ?>">

      <br><br>
      <b>Projekta finansētājs: </b><br>

      <select size="1" name="Financer">
      isset($_POST['status']) && $_POST['status'] == 'Aktīvs' ? 'selected' : ''
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
      <b>Statuss: </b><br>

      <select size="1" name="Status">
          <option value='Aktīvs' <?php echo $status == 'Aktīvs' ? 'selected' : '' ?>>Aktīvs</option>
          <option value='Arhivēts' <?php echo $status == 'Arhivēts' ? 'selected' : '' ?>>Arhivēts</option>
          <option value='Plānošana' <?php echo $status == 'Plānošana' ? 'selected' : '' ?>>Plānošana</option>
          <option value='Balsošana' <?php echo $status == 'Balsošana' ? 'selected' : '' ?>>Balsošana</option>
          <option value='Iesniegts' <?php echo $status == 'Iesniegts' ? 'selected' : '' ?>>Iesniegts</option>
      </select>

      <br><br>

      <b>Vidējā termiņa prioritāte: </b><br>

      <select size="1" name="Category">
          <option value='Mobilitāte un satiksmes drošība' <?php echo $category == 'Mobilitāte un satiksmes drošība' ? 'selected' : '' ?>>Mobilitāte un satiksmes drošība</option>
          <option value='Kvalitatīva, droša vide' <?php echo $category == 'Kvalitatīva, droša vide' ? 'selected' : '' ?>>Kvalitatīva, droša vide</option>
          <option value='Kvalitatīva izglītība' <?php echo $category == 'Kvalitatīva izglītība' ? 'selected' : '' ?>>Kvalitatīva izglītība</option>
          <option value='Pievilcīga kultūras un sporta vide' <?php echo $category == 'Pievilcīga kultūras un sporta vide' ? 'selected' : '' ?>>Pievilcīga kultūras un sporta vide</option>
          <option value='Efektīva pārvalde' <?php echo $category == 'Efektīva pārvalde' ? 'selected' : '' ?>>Efektīva pārvalde</option>
      </select>

      <br><br>

      <b>Projekta numurs: </b><br>
      <input name="Number" type="text" size="30" maxlength="21844" value="<?php echo $number; ?>">
      <br><br>

      Projekta programma/SAM: </b><br>
      <textarea name="SAM" rows="5" cols="40"><?php echo $sam; ?></textarea>
      <br><br> 

      <b>Projekta budžets: </b><br><br>
      <b>Kopējais budžets: </b><br>
      <input name="Budget" type="number" maxlength="21844" value="<?php echo $budget; ?>">
      EUR <br><br>
      <b>Iztērētais budžets: </b><br>
      <input name="BudgetSpent" type="number" maxlength="21844" value="<?php echo $budgetspent; ?>">
      EUR <br><br>

      <b>Projekta mērķis</b> <br>
      <textarea name="Purpose" rows="5" cols="80"><?php echo $purpose; ?></textarea>
      <br><br>

      <b>Galvenās aktivitātes</b> <br>
      <textarea name="Activities" rows="7" cols="100"><?php echo $activities; ?></textarea>
      <br><br>

      <b>Īstenošanas laiks: </b><br><br>

      <b>Sākšanas datums: </b><br>
      <input name="StartDate" type="date" value="<?php echo $startdate;?>">
      <br><br>

      <b>Beigšanas datums: </b><br>
      <input name="FinishDate" type="date" value="<?php echo $finishdate;?>">
      <br><br>

      <b>Koordinators: </b><br>
      <input name="CoordinatorName" type="text" size="25" maxlength="21844" value="<?php echo $cname; ?>">
      <br><br>

      <b>Telefona numurs: </b><br>
      <input name="CoordinatorContacts" type="text" size="25" maxlength="21844" value="<?php echo $ccontacts; ?>">
      <br><br>

      <b>Epasts: </b><br>
      <input name="CoordinatorEmail" type="text" size="25" maxlength="21844" value="<?php echo $cemail; ?>">
      <br><br>

      <!-- Financer list -->

      <b>Budžeta sadalījums: </b><br><br>
      <b>Pašvaldība: </b><br>
      <input name="Municipality" type="number" maxlength="21844" value="<?php echo $Municipality; ?>">
      EUR <br><br>
      <b>Cits: </b><br>
      <input name="Cits" type="number" maxlength="21844" value="<?php echo $Cits; ?>">
      EUR <br><br>
      <b>ELFLA: </b><br>
      <input name="ELFLA" type="number" maxlength="21844" value="<?php echo $ELFLA; ?>">
      EUR <br><br>
      <b>ERAF: </b><br>
      <input name="ERAF" type="number" maxlength="21844" value="<?php echo $ERAF; ?>">
      EUR <br><br>
      <b>ESF: </b><br>
      <input name="ESF" type="number" maxlength="21844" value="<?php echo $ESF; ?>">
      EUR <br><br>
      <b>KF: </b><br>
      <input name="KF" type="number" maxlength="21844" value="<?php echo $KF; ?>">
      EUR <br><br>
      <b>KPFI: </b><br>
      <input name="KPFI" type="number" maxlength="21844" value="<?php echo $KPFI; ?>">
      EUR <br><br>
      <b>LAT-LIT: </b><br>
      <input name="LATLIT" type="number" maxlength="21844" value="<?php echo $LATLIT; ?>">
      EUR <br><br>
      <b>NFI: </b><br>
      <input name="NFI" type="number" maxlength="21844" value="<?php echo $NFI; ?>">
      EUR <br><br>
      <b>Valsts: </b><br>
      <input name="Valsts" type="number" maxlength="21844" value="<?php echo $Valsts; ?>">
      EUR <br><br>


      </form>
      
      <hr>

      <!-- See project news -->

      <form method="post" id="post-update">

      <b> Jaunumi: </b><br>

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

      <!-- Add project news -->

      Pievienot:

      <input name="UpdateDate" type="date">
      <input name="Update" type="text" size="75" maxlength="21844" placeholder="Jaunums">
      <input type="submit" value="Pievienot jaunumu">


      </form>
      <hr>

      </article>
      </div>
     </section>
  </body>
</html>
