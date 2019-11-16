<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
  <script>function saveproject(){document.getElementById("changes").submit();}</script>
  <script>function deleteproject(){
    var conf = confirm('Vai tiešām vēlaties izdzēst projektu?');
    if(conf){
      document.getElementById("delete").submit();
      console.log("did it!!!");
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
      function moneyToInt($amount){
        if ($amount < 0){
          $amount = $amount * -1;
        }
        $result = intval($amount*100);
      return $result;
      }
    ?>
    <?php
      if (!empty($_POST['Name'])){
      require_once "functions/update.php";
      $response = updateExisting($_GET['id'], $_POST['Name'], $_POST['Financer'], $_POST['Status'], $_POST['Number'], $_POST['SAM'], 
      moneyToInt($_POST['Budget']), moneyToInt($_POST['BudgetSpent']),  
      $_POST['Purpose'], $_POST['Activities'], $_POST['StartDate'], $_POST['FinishDate'], 
      $_POST['CoordinatorName'], $_POST['CoordinatorContacts']);
      }
    ?>

    <?php
      if (!empty($_POST['Delete'])){
        require_once "functions/delete.php";
        deleteProject($_GET["id"]);
        header("location:admin.php");
      }
    ?>

  </head>
  <body>

    <a class="back-button" href="admin.php"><span>Visi Projekti</span></a>

      <!-- succesful update message -->
      <div id="success-message"><?php if (isset($response)){echo $response;}?></div>

      <!-- Logout field -->
      <a class="logout" href="logout.php">Iziet!</a>


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


      <form method="post" class="edit-info" id="changes">


      <b>Projekta nosaukums: </b><br>
      <?php if(!empty($_POST)){
        $name = $_POST["Name"];
        $financer = $_POST["Financer"];
        $status = $_POST["Status"];
        $number = $_POST["Number"];
        $sam = $_POST["SAM"];
        $budget = intToMoney(moneyToInt($_POST["Budget"]));
        $budgetspent = intToMoney(moneyToInt($_POST["BudgetSpent"]));
        $purpose = $_POST["Purpose"];
        $activities = $_POST["Activities"];
        $startdate = $_POST["StartDate"];
        $finishdate = $_POST["FinishDate"];
        $cname = $_POST["CoordinatorName"];
        $ccontacts = $_POST["CoordinatorContacts"];
      }else{
        $name = $projects["Name"];
        $financer = $projects["Financer"];
        $status = $projects["Status"];
        $number = $projects["Number"];
        $sam = $projects["SAM"];
        $budget = intToMoney($projects["Budget"]);
        $budgetspent = intToMoney($projects["BudgetSpent"]);
        $purpose = $projects["Purpose"];
        $activities = $projects["Activities"];
        $startdate = $projects["StartDate"];
        $finishdate = $projects["FinishDate"];
        $cname = $projects["CoordinatorName"];
        $ccontacts = $projects["CoordinatorContacts"];
      }
      ?>
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

      <b>Kontakti: </b><br>
      <input name="CoordinatorContacts" type="text" size="25" maxlength="21844" value="<?php echo $ccontacts; ?>">
      <br><br>


      <hr>
      </form>

      </article>
      </div>
     </section>
  </body>
</html>
