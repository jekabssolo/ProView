<!DOCTYPE html>
<html>
    <head>
    		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <?php session_start(); /* Starts the session */
      if(!isset($_SESSION['UserData']['Username'])){
      header("location:login.php");
      exit;
      }else {
        $now = time();
        if ($now > $_SESSION['expire']) {
          session_destroy();
          echo "Jūsu sesija ir beigusies! <a href='/login.php'>Ieiet atpakaļ</a>";
      }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>function sortsubmit(){document.getElementById("sorting").submit();}</script>
    <script>function filtersubmit(){document.getElementById("filtering").submit();}</script>
             <!-- table row linking to individual view -->
             <script>
         jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<link rel="stylesheet" href="style.css">

    
    <title>Administrēšana</title>


      <?php
        require_once "functions/function.php";
        $projects = getProjects("");


        // search and filter and sort results
        if(!empty($_POST)){
          if(!array_key_exists('status',$_POST)){
            $statusval="";
          }else{
            $statusval=$_POST["status"];
          }
          if(!array_key_exists('financer',$_POST)){
            $finanval="";
          }else{
            $finanval=$_POST["financer"];
          }
          if(!array_key_exists('budgetsort',$_POST)){
            $budgetsort="";
          }else{
            $budgetsort=$_POST["budgetsort"];
          }
          if(!array_key_exists('entrysort',$_POST)){
            $entrysort="";
          }else{
            $entrysort=$_POST["entrysort"];
          }
          $searchval = preg_replace("/[']/", "", $_POST["search"]);
          require_once "functions/searchfilter.php";
          $projects = getProjectscontaining($finanval, $statusval, $searchval, $budgetsort, $entrysort);
        }
       ?>
  
    </head>



    
    <body>

      <header class="shadow-sm">
        <div class="container">
          <div class="row">
            <div class="col">
              <a class="header-logo" href="/admin.php">
                <img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
              </a>
            </div>
            <div class="col">
              <div class="header-right admin-button" onclick="window.location='/logout.php'">
                <img src="Design/Icons/logout.png" class="admin-icon" alt="Logout icon">
                Iziet
              </div>
            </div>
          </div>
      </header>

      <div class="container">
			<div class="row">
				<div class="col-md-3 shadow-sm p-3 mb-5 bg-white rounded no-margin">
					<!-- filter forms -->
					<div class="select-container">
						<div>
							<form method="post" id="filtering">
								<div class="title-container">
									<img src="Design/Icons/funnel-outline.png" class="img-style" alt="Funnel icon">
									<span class="title-style">Kārtot</span>
								</div>
								<br>
								
								<!-- Pēc statusa <br> -->
								<select class="custom-select" size="1" name="status" onchange="filtersubmit()">
									<option value='' selected>Pēc statusa</option>
									<option value='Aktīvs' <?php echo isset($_POST['status']) && $_POST['status'] == 'Aktīvs' ? 'selected' : '' ?>>Aktīvs</option>
									<option value='Arhivēts' <?php echo isset($_POST['status']) && $_POST['status'] == 'Arhivēts' ? 'selected' : '' ?>>Arhivēts</option>
									<option value='Plānošana' <?php echo isset($_POST['status']) && $_POST['status'] == 'Plānošana' ? 'selected' : '' ?>>Plānošana</option>
									<option value='Balsošana' <?php echo isset($_POST['status']) && $_POST['status'] == 'Balsošana' ? 'selected' : '' ?>>Balsošana</option>
									<option value='Iesniegts' <?php echo isset($_POST['status']) && $_POST['status'] == 'Iesniegts' ? 'selected' : '' ?>>Iesniegts</option>
								</select>

								<!-- <br><br>Pēc finansētāja <br> -->	
								<select class="custom-select" size="1" name="financer" onchange="filtersubmit()">
									<option value='' selected>Pēc finansētāja</option>
									<option value='Pašvaldība' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'Pašvaldība' ? 'selected' : '' ?>>Pašvaldība</option>
									<option value='Cits' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'Cits' ? 'selected' : '' ?>>Cits</option>
									<option value='ELFLA' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'ELFLA' ? 'selected' : '' ?>>ELFLA</option>
									<option value='ERAF' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'ERAF' ? 'selected' : '' ?>>ERAF</option>
									<option value='ESF' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'ESF' ? 'selected' : '' ?>>ESF</option>
									<option value='KF' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'KF' ? 'selected' : '' ?>>KF</option>
									<option value='KPFI' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'KPFI' ? 'selected' : '' ?>>KPFI</option>
									<option value='LAT-LIT' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'LAT-LIT' ? 'selected' : '' ?>>LAT-LIT</option>
									<option value='NFI' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'NFI' ? 'selected' : '' ?>>NFI</option>
									<option value='Valsts' <?php echo isset($_POST['financer']) && $_POST['financer'] == 'Valsts' ? 'selected' : '' ?>>Valsts</option>
								</select>

								<input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
								<input type="hidden" name="budgetsort" value="<?php echo isset($_POST['budgetsort']) ? $_POST['budgetsort'] : '' ?>">
								<input type="hidden" name="entrysort" value="<?php echo isset($_POST['entrysort']) ? $_POST['entrysort'] : '' ?>">
							</form>
							<br>
		
							<!-- clearing filters form -->
							<form method="post">
								<input name="status" value="" type="hidden">
								<input name="financer" value="" type="hidden">
								<input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
								<input type="hidden" name="budgetsort" value="<?php echo isset($_POST['budgetsort']) ? $_POST['budgetsort'] : '' ?>">
								<input type="hidden" name="entrysort" value="<?php echo isset($_POST['entrysort']) ? $_POST['entrysort'] : '' ?>">
								<input type="submit" class="clear-button" value="Notīrīt filtrus">
							</form>
							<br>
						</div>
					</div>


					<hr>

					<div class="select-container">
						<div>
							<!-- Sorting form -->
							<form method="post" id="sorting">
								<div class="title-container">
									<img src="Design/Icons/sort-button-with-three-lines.png" class="img-style" alt="Sort icon">
									<span class="title-style">Kārtot</span>
								</div>
								<br>

								<!-- Sorting by budget -->
								<!-- Pēc budžeta<br> -->
								<select class="custom-select" size="1" name="budgetsort" onchange="sortsubmit()">
									<option value='' selected>Pēc budžeta</option>
									<option value='ASC' <?php echo isset($_POST['budgetsort']) && $_POST['budgetsort'] == 'ASC' ? 'selected' : '' ?>>Mazākais vispirms</option>
									<option value='DESC' <?php echo isset($_POST['budgetsort']) && $_POST['budgetsort'] == 'DESC' ? 'selected' : '' ?>>Lielākais vispirms</option>
								</select>

								<!-- Sorting by entry date -->
								<!-- Pēc ievietošanas datuma<br> -->
								<select class="custom-select" size="1" name="entrysort" onchange="sortsubmit()">
									<option value='' selected>Pēc ievietošanas datuma</option>
									<option value='ASC' <?php echo isset($_POST['entrysort']) && $_POST['entrysort'] == 'ASC' ? 'selected' : '' ?>>Jaunākie vispirms</option>
									<option value='DESC' <?php echo isset($_POST['entrysort']) && $_POST['entrysort'] == 'DESC' ? 'selected' : '' ?>>Senākie vispirms</option>
								</select>

								<input type="hidden" name="status" value="<?php echo isset($_POST['status']) ? $_POST['status'] : '' ?>">
								<input type="hidden" name="financer" value="<?php echo isset($_POST['financer']) ? $_POST['financer'] : '' ?>">
								<input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
							</form>
		
							<br>
		
							<!-- clearing sorting form -->
							<form method="post">
								<input type="hidden" name="status" value="<?php echo isset($_POST['status']) ? $_POST['status'] : '' ?>">
								<input type="hidden" name="financer" value="<?php echo isset($_POST['financer']) ? $_POST['financer'] : '' ?>">
								<input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
								<input type="hidden" name="budgetsort" value="">
								<input type="hidden" name="entrysort" value="">
								<input type="submit" class="clear-button" value="Notīrīt kārtošanu">
							</form>
							<br>
							<br>
						</div>
					</div>
				</div>

				<div class="col-md-8 offset-md-1 shadow-sm p-3 mb-5 bg-white rounded table-column">
					<div class="container">
						<div class="row">
							<div class="col-sm align-self-start col2-style">
								<img src="Design/Icons/management (1).png" class="img-style" alt="Management icon">
								<span class="title-style">Projektu saraksts</span>
							</div>
							<div class="col-sm align-self-end col2-style">
								<!-- Search form -->
								<form method="post">
									<div class="search-container">
										<img src="Design/Icons/search.png" class="search-icon" alt="Search icon">
										<input type="text" class="search-form" placeholder="Meklēt projektus" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>" maxlength="65534">
									</div>
									<input type="hidden" name="status" value="<?php echo isset($_POST['status']) ? $_POST['status'] : '' ?>">
									<input type="hidden" name="financer" value="<?php echo isset($_POST['financer']) ? $_POST['financer'] : '' ?>">
									<input type="hidden" name="budgetsort" value="<?php echo isset($_POST['budgetsort']) ? $_POST['budgetsort'] : '' ?>">
									<input type="hidden" name="entrysort" value="<?php echo isset($_POST['entrysort']) ? $_POST['entrysort'] : '' ?>">
									<!-- <input type="submit" value="Meklēt"> -->
								</form>
							</div>
						</div>
					</div>

					<div class="table-responsive-sm">
						<!-- results table -->
						<table class="table table-bordered table-hover">
							<tr class="header">
								<th class="align-middle">Nosaukums</th>
								<th class="align-middle">Statuss</th>
								<th class="align-middle">Īstenošanas laiks</th>
                <th class="align-middle">Rediģēt</th>
							</tr>
							<?php
								for ($i = 0; $i<count($projects); $i++){
									echo "<tr class='entry'>";
									echo "<td class='align-middle' data-href='/individualAboutAdmin.php?id=".$projects[$i]["ID"]."'>", $projects[$i]["Name"], "</td>";
									switch ($projects[$i]["Status"]) {
										case 'Aktīvs':
											$background = "rgb(33, 150, 83, 0.3)";
											$border = "#219653";
											$color = "#219653";
											break;
										case 'Arhivēts':
											$background = "#F2994A";
											$border = "#F2994A";
											$color = "#6D4623";
											break;
										case 'Plānošana':
											$background = "rgb(242, 201, 76, 0.3)";
											$border = "#F2C94C";
											$color = "#786B41";
											break;
										case 'Balsošana':
											$background = "rgb(155, 81, 224, 0.3)";
											$border = "#9B51E0";
											$color = "#9B51E0";
											break;
										case 'Iesniegts':
											$background = "rgb(242, 153, 74, 0.3)";
											$border = "#F2994A";
											$color = "#A76D3C";
											break;
									}
									echo "<td class='project-status align-middle text-center' data-href='/individualAboutAdmin.php?id=".$projects[$i]["ID"]."'><span class='status-text' style='background:" . $background . "; border: 2px solid " . $border . "; color: " . $color . "'>".$projects[$i]["Status"]."</span></td>";
									echo "<td class='align-middle' data-href='/individualAboutAdmin.php?id=".$projects[$i]["ID"]."'>".date("d.m.Y.", strtotime($projects[$i]["StartDate"])), " - ", date("d.m.Y.", strtotime($projects[$i]["FinishDate"])),"</td>";
                  echo "<td class='align-middle text-center' data-href='/individualEdit.php?id=".$projects[$i]["ID"]."'><img src='Design/Icons/edit.png' class='img-style' alt='Edit icon'></td>";
                  echo "</tr>";  
								};
								
								if (count($projects) == 0){
									echo "<tr><td colspan='4' align='center'>Nekas netika atrasts</td></tr>";
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- BOOTSTARP JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>