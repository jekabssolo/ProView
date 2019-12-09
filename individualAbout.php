<!DOCTYPE html>
<html lang="lv" dir="ltr">
	<head>
		<!--Favicon-->
		<link rel="icon" type="image/png" href="../Design/Icons/output-onlinepngtools.ico">
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- FONT -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


		<link href="css/buttons.css" rel="stylesheet">
		<link rel="stylesheet" href="style.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<title>Par projektu</title>
		
		<?php
			require_once "functions/function.php";
			$projects = getProjects($_GET['id']);
			$financers = financervalues($_GET['id']);
			$title = $projects["Name"];
			require_once "blocks/head.php";
		?>
		<?php
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
						<div class="header-center">
							<?php 
								switch ($projects["Status"]) {
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
								echo "<span class='status-text' style='background:" . $background . "; border: 2px solid " . $border . "; color: " . $color . "'>".$projects["Status"]."</span>";
							?>
						</div>
					</div>
					<div class="col-md">
						<div class='center admin-button' onclick='window.location="<?php echo "status.php?id=" . $projects["ID"] ?>"'>
							<img src='Design/Icons/icon.png' class='admin-icon' alt='Stats icon'>
							Statuss
						</div>
						<!-- <div class="header-right" onclick="window.location='/admin.php'">
							<a class='selected'>Par projektu: </a>
							<?php 
								echo "<a href='status.php?id=".$projects["ID"]."'>Statuss</a>";
							?>
						</div> -->
					</div>
				</div>
		</header>

		<div class="container">
			<div class="row">
				<div class="col-md-12 shadow-sm p-3 mb-5 bg-white rounded individual-main-container">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<div class="title-style"><?php echo $projects["Name"]; ?></div>
							</div>
							<div class="col-md-3 text-right">
								<div>
									<img src="Design/Icons/avatar.png" class="img-style avatar-icon individual-icon" alt="Avatar icon">
									<span class="coordination-text">
										<p class="coordination-name">Koordinators:</p>
										<b><?php echo $projects["CoordinatorName"]; ?></b> <br>
									</span>
								</div>
								<img src="Design/Icons/phone-call.png" class="img-style individual-icon" alt="Phone icon">
								<p class="coordination-tel"><?php echo $projects["CoordinatorContacts"]; ?></p>
								<img src="Design/Icons/email.png" class="img-style individual-icon" alt="Email icon">
								<p class="coordination-tel"><?php echo $projects["CoordinatorEmail"]; ?></p>
							</div>
						</div>
					</div>
					<br>
					<table class="table table-bordered">
						<tr>
							<td>
								<b>Projekta finansētājs: </b>
								<?php echo $projects["Financer"]; ?>
							</td>
							<td>
								<b>Projekta budžets: </b>
								<?php echo intToMoney($projects["Budget"]); ?> EUR
							</td>
						</tr>
						<tr>
							<td>
								<b>Projekta numurs: </b>
								<?php echo $projects["Number"]; ?>
							</td>
							<td>
								<b>Īstenošanas laiks: </b>
								<?php echo date("d.m.Y.", strtotime($projects["StartDate"])), " - ", date("d.m.Y.", strtotime($projects["FinishDate"])); ?>
							</td>
						</tr>
					</table>
					<br>
					<div>
						<b>Vidējā termiņa prioritāte: </b> <br>
						<?php echo $projects["Category"]; ?>
					</div>
					<br>
					<div>
						<b>Budžeta sadalījums: </b> <br>
						<?php echo $Municipality > 0 ? "Pašvaldība - ".$Municipality." EUR<br>" : "" ?>
						<?php echo $Cits > 0 ? "Cits - ".$Cits." EUR<br>" : "" ?>
						<?php echo $ELFLA > 0 ? "ELFLA - ".$ELFLA." EUR<br>" : "" ?>
						<?php echo $ERAF > 0 ? "ERAF - ".$ERAF." EUR<br>" : "" ?>
						<?php echo $ESF > 0 ? "ESF - ".$ESF." EUR<br>" : "" ?>
						<?php echo $KF > 0 ? "KF - ".$KF." EUR<br>" : "" ?>
						<?php echo $KPFI > 0 ? "KPFI - ".$KPFI." EUR<br>" : "" ?>
						<?php echo $LATLIT > 0 ? "LAT-LIT - ".$LATLIT." EUR<br>" : "" ?>
						<?php echo $NFI > 0 ? "NFI - ".$NFI." EUR<br>" : "" ?>
						<?php echo $Valsts > 0 ? "Valsts - ".$Valsts." EUR<br>" : "" ?>
					</div>
					<br>
					<div>
						<b>Projekta programma/SAM: </b> <br>
						<?php echo $projects["SAM"]; ?>
					</div>
					<br>
					<div>
						<b>Projekta mērķis</b> <br>
						<?php echo $projects["Purpose"]; ?>
					</div>
					<br>
					<div>
						<b>Galvenās aktivitātes</b> <br>
						<?php echo $projects["Activities"]; ?>
					</div>
					<br>
				</div>
			</div>
		</div>

		<!-- BOOTSTARP JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
