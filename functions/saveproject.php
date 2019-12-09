<html>
  <head>
    <!--Favicon-->
		<link rel="icon" type="image/png" href="../Design/Icons/output-onlinepngtools.ico">
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- FONT -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <?php
        require_once "connect.php";
        require_once "function.php";
        
        /*Get values from filled form*/
        $name = $_POST["Name"];
        $financer = $_POST["Financer"];
        $status = $_POST["Status"];
        $category = $_POST["Category"];
        $number = $_POST["Number"];
        $sam = $_POST["SAM"];
        $budget = moneyToInt($_POST["Budget"]);
        $budgetspent = moneyToInt($_POST["BudgetSpent"]);
        $purpose = $_POST["Purpose"];
        $activities = $_POST["Activities"];
        $startdate = $_POST["StartDate"];
        $finishdate = $_POST["FinishDate"];
        $cname = $_POST["CoordinatorName"];
        $ccontacts = $_POST["CoordinatorContacts"];
        $cemail = $_POST["CoordinatorEmail"];
        $Municipality = moneyToInt($_POST["Municipality"]);
        $Cits = moneyToInt($_POST["Cits"]);
        $ELFLA = moneyToInt($_POST["ELFLA"]);
        $ERAF = moneyToInt($_POST["ERAF"]);
        $ESF = moneyToInt($_POST["ESF"]);
        $KF = moneyToInt($_POST["KF"]);
        $KPFI = moneyToInt($_POST["KPFI"]);
        $LAT_LIT = moneyToInt($_POST["LAT-LIT"]);
        $NFI = moneyToInt($_POST["NFI"]);
        $Valsts = moneyToInt($_POST["Valsts"]);

        saveNewProject($name, $financer, $status, $category, $number, $sam, $budget, $budgetspent, $purpose, $activities, $startdate, $finishdate, $cname, $ccontacts, $cemail, $Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts);


        
        function saveNewproject($name, $financer, $status, $category, $number, $sam, $budget, $budgetspent, $purpose, $activities, $startdate, $finishdate, $cname, $ccontacts, $cemail, $Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts){
          global $mysqli;
          connectDB();
          /*Check if required fields are filled. If not provide link to previous field*/
          if($name == '' or $startdate == '' or $finishdate == ''){
          ?>
          <div class = "jumbotron my-container">
            <div class="container">
              <div class="row">
                <div class="col-md-6 login-image">
                  <img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
                </div>
                <div class="col-md-6">
                  <div class="login-tilte">Kļūda:</div>  
                  <b>Aizpildiet visus nepieciešamos laukus!</b>
                  </br>
                  <a href="javascript:history.go(-1)">Atpakaļ pie jaunā projekta.</a>
                </div>
              </div>
            </div>
          </div>
          <?php 

          /*Check if starting date is not greater than ending date. If not provide link to previous field*/
          }else if($startdate > $finishdate){
            ?>
              <div class = "jumbotron my-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6 login-image">
                      <img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
                    </div>
                    <div class="col-md-6">
                      <div class="login-tilte">Kļūda:</div>  
                      <b>Sākšanas datums ir lielāks par beigšanas datumu!</b>
                      </br>
                      <a href="javascript:history.go(-1)">Atpakaļ pie jaunā projekta.</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php 
          /*Insert values in projekti table in DB*/ 
          }else{
            $query = "INSERT INTO projekti (Name, Financer, Status, Category, Number, SAM, Budget, BudgetSpent, Purpose, Activities, StartDate, FinishDate, CoordinatorName, CoordinatorContacts, CoordinatorEmail)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt1 = $mysqli->prepare($query);
            $stmt1->bind_param("sssssssssssssss",$name, $financer, $status, $category, $number, $sam, $budget, $budgetspent, $purpose, $activities, $startdate, $finishdate, $cname, $ccontacts, $cemail);
            if(empty($startdate)){
              $startdate = null;
            };
            if(empty($finishdate)){
              $finishdate = null;
            };
            $stmt1->execute();
            $stmt1->close();
            closeDB();
            saveFinancier($Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts);
          }
        };   

        /*Get financiers and values into strings to later insert them in query*/
        function saveFinancier($Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts){
          global $mysqli;
          connectDB();
          $query = "SELECT ID FROM projekti ORDER BY ID DESC LIMIT 1";
          $result = mysqli_query($mysqli, $query);
          $projectID = mysqli_fetch_all($result,MYSQLI_ASSOC);
          $projectID = $projectID[0]['ID'];
          echo $projectID;
          $queryFinancier = "INSERT INTO finansetajs (project_id, Municipality, Cits, ELFLA, ERAF, ESF, KF, KPFI, LATLIT, NFI, Valsts)
          VALUES (?,?,?,?,?,?,?,?,?,?,?)";
          $stmt2 = $mysqli->prepare($queryFinancier);
          $stmt2->bind_param("sssssssssss", $projectID, $Municipality, $Cits, $ELFLA, $ERAF, $ESF, $KF, $KPFI, $LAT_LIT, $NFI, $Valsts);
          $stmt2->execute();
          $stmt2->close();
          closeDB();

          /*When done send to the main project page with admin access*/
          header("location:../index.php");
          exit;
        };

    ?>    
  </body>
</html>