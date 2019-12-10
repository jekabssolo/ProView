<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
    <title>Projekta rediģēšana</title>
  <script>function saveproject(){document.getElementById("changes").submit();}</script>
  <script>function deleteproject(){
    var conf = confirm('Vai tiešām vēlaties izdzēst projektu?');
    if(conf){
      document.getElementById("delete").submit();
    }
    }
  </script>
  <!--Favicon-->
  <link rel="icon" type="image/png" href="../Design/Icons/output-onlinepngtools.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <style>
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
  </style> -->
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
      moneyToInt($_POST['KF']), moneyToInt($_POST['KPFI']), moneyToInt($_POST['LAT-LIT']), moneyToInt($_POST['NFI']), moneyToInt($_POST['Valsts']));
      echo "<meta http-equiv='refresh' content='0'>";
      }
    ?>

    <?php
      if (!empty($_POST['Delete'])){
        require_once "functions/delete.php";
        deleteProject($_GET["id"]);
        header("location:index.php");
      }
    ?>

    <?php
      if (!empty($_POST['Update'])){
      require_once "functions/update.php";
      $response = newUpdate($_GET['id'], $_POST['UpdateDate'], $_POST['Update']);
      echo "<meta http-equiv='refresh' content='0'>";
      }
    ?>



    <!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- FONT -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="shadow-sm">
			<div class="container">
				<div class="row">
					<div class="col-md">
						<a class="header-logo" href="/">
							<img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
						</a>
					</div>
					<div class="col-md">
						<div class='admin-button'>
							<img src='Design/Icons/edit.png' class='admin-icon' alt='Edit icon'>
							Rediģēt Projektu
						</div>
					</div>
				</div>
		</header>
      
    <form method="post" class="edit-info" id="changes">
      <div class="container shadow-sm p-3 mb-2 bg-white rounded new-project-my">
        <!-- succesful update or added news message -->
        <div id="success-message"><h1><?php echo isset($response) ? $response : "" ?></h1></div>
        <div class="row">
          <div class="col-md-9">
            <b class="coordination-name">Projekta nosaukums: </b>
            <br>              
            <input name="Name" class="form-control my-new-name" type="text" maxlength="21844" value="<?php echo $name; ?>">
          </div>
          <div class="col-md-3">
            <b class="coordination-name">Koordinators:</b> <br>
            <input name="CoordinatorName" class="form-control" type="text" size="25" maxlength="21844" value="<?php echo $cname; ?>">

            <b class="coordination-name" >Telefona numurs: </b> <br>
            <input name="CoordinatorContacts" class="form-control" type="text" size="25" maxlength="21844" value="<?php echo $ccontacts; ?>">

            <b class="coordination-name">Epasts: </b> <br>
            <input name="CoordinatorEmail" class="form-control" type="text" size="25" maxlength="21844" value="<?php echo $cemail; ?>">
            <br>
          </div>
        </div>
        <div class="new-middle-part">
          <div class="row border-bottom pb-2">
            <div class="col-md-4">
              <b class="coordination-name">Projekta finansētājs: </b>
              <br>
              <select class="form-control" name="Financer">
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
              <b class="coordination-name">Projekta numurs: </b>
              <br>
              <input name="Number" class="form-control" type="text" maxlength="21844" value="<?php echo $number; ?>">
            </div>
            <div class="col-md-4 border-left border-right">
              <b class="coordination-name">Īstenošanas laiks: </b>
              <br>
              <div class="row">
                <div class="col-5">
                  <b class="coordination-name">Sākšanas datums: </b>
                </div>
                <div class="col-7">
                  <input name="StartDate" class="form-control" type="date" value="<?php echo $startdate;?>">
                </div>
              </div>
              <div class="row">
                <div class="col-5">
                  <b class="coordination-name">Beigšanas datums: </b>
                </div>
                <div class="col-7">
                  <input name="FinishDate" class="form-control" type="date" value="<?php echo $finishdate;?>">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <b class="coordination-name">Statuss: </b>
              <br>
              <select class="form-control" name="Status">
                <option value='Aktīvs' <?php echo $status == 'Aktīvs' ? 'selected' : '' ?>>Aktīvs</option>
                <option value='Arhivēts' <?php echo $status == 'Arhivēts' ? 'selected' : '' ?>>Arhivēts</option>
                <option value='Plānošana' <?php echo $status == 'Plānošana' ? 'selected' : '' ?>>Plānošana</option>
                <option value='Balsošana' <?php echo $status == 'Balsošana' ? 'selected' : '' ?>>Balsošana</option>
                <option value='Iesniegts' <?php echo $status == 'Iesniegts' ? 'selected' : '' ?>>Iesniegts</option>
              </select>
              <b class="coordination-name">Kategorija: </b>
              <br>
              <select class="form-control" name="Category">
                <option value='Kvalitatīva, droša vide' <?php echo $status == 'Kvalitatīva, droša vide' ? 'selected' : '' ?>>Kvalitatīva, droša vide</option>
                <option value='Kvalitatīva izglītība' <?php echo $status == 'Kvalitatīva izglītība' ? 'selected' : '' ?>>Kvalitatīva izglītība</option>
                <option value='Efektīva pārvalde' <?php echo $status == 'Efektīva pārvalde' ? 'selected' : '' ?>>Efektīva pārvalde</option>
                <option value='Pievilcīga kultūras un sporta vide' <?php echo $status == 'Pievilcīga kultūras un sporta vide' ? 'selected' : '' ?>>Pievilcīga kultūras un sporta vide</option>
                <option value='Mobilitāte un satiksmes drošība' <?php echo $status == 'Mobilitāte un satiksmes drošība' ? 'selected' : '' ?>>Mobilitāte un satiksmes drošība</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-2">
              <b class="coordination-name">Projekta budžets: </b>
              <div class="row border-bottom mb-2">
                <div class="col-6">
                  <b class="coordination-name">Kopējais budžets: </b>
                  <input name="Budget" class="form-control" type="number" maxlength="21844" value="<?php echo $budget; ?>">EUR
                </div>
                <div class="col-6">
                  <b class="coordination-name">Iztērētais budžets: </b>
                  <input name="BudgetSpent" class="form-control" type="number" maxlength="21844" value="<?php echo $budgetspent; ?>">EUR 
                </div>
              </div>
              <b class="coordination-name">Budžeta sadalījums: </b>
              <div class="row">
                <div class="col-6">
                  <b class="coordination-name">Pašvaldība</b>
                  <input name="Municipality" class="form-control" type="number" maxlength="21844" value="<?php echo $Municipality; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">ELFLA</b>
                  <input name="ELFLA" class="form-control" type="number" maxlength="21844" value="<?php echo $ELFLA; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">ERAF</b>
                  <input name="ERAF" class="form-control" type="number" maxlength="21844" value="<?php echo $ERAF; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">ESF</b>
                  <input name="ESF" class="form-control" type="number" maxlength="21844" value="<?php echo $ESF; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">KF</b>
                  <input name="KF" class="form-control" type="number" maxlength="21844" value="<?php echo $KF; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">KPFI</b>
                  <input name="KPFI" class="form-control" type="number" maxlength="21844" value="<?php echo $KPFI; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">LAT-LIT</b>
                  <input name="LAT-LIT" class="form-control" type="number" maxlength="21844" value="<?php echo $LATLIT; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">NFI</b>
                  <input name="NFI" class="form-control" type="number" maxlength="21844" value="<?php echo $NFI; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">Valsts</b>
                  <input name="Valsts" class="form-control" type="number" maxlength="21844" value="<?php echo $Valsts; ?>">EUR 
                </div>
                <div class="col-6">
                  <b class="coordination-name">Cits</b>
                  <input name="Cits" class="form-control" type="number" maxlength="21844" value="<?php echo $Cits; ?>">EUR 
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <b class="coordination-name">Projekta programma/SAM: </b>
        <br>
        <textarea class="form-control" name="SAM" rows="5"><?php echo $sam; ?></textarea>
        <br> 

        <b class="coordination-name">Projekta mērķis</b>
        <br>
        <textarea class="form-control" name="Purpose" rows="5"><?php echo $purpose; ?></textarea>
        <br>

        <b class="coordination-name">Galvenās aktivitātes</b> <br>
        <textarea class="form-control" name="Activities" rows="7"><?php echo $activities; ?></textarea>
        <br>
      </div>
      <button class="btn" type="Submit"><i class='fa fa-save' id="save" onclick="saveproject()"></i></button>              
    </form>

    <div class="container shadow-sm p-3 mb-5 bg-white rounded new-project-my">
      <div class="row">
      <form method="post" id="post-update">
          <b class="coordination-name">Jaunumi:</b>
          <div id="updateLog" class="mb-3">
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
          <b class="coordination-name">Pievienot:</b>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <input name="UpdateDate" class="form-control mb-1" type="date">
              </div>
              <div class="col-md-6">
                <input name="Update" class="form-control mb-1" type="text" size="75" maxlength="21844" placeholder="Jaunums">
              </div>
            </div>
          </div>
          <input type="submit" class='admin-button' value="Pievienot jaunumu">
        </form>
      </div>
    </div>
      <!-- delete button and form -->
      <i class='fa fa-trash' id="delete-bttn" onclick="deleteproject()"></i>
      <form method="post" id="delete">
      <input type="hidden" name="Delete" value="true">
    </form>
  </body>
</html>
