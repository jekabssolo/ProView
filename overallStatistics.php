<!DOCTYPE html>
<html>
    <head>
        <title>Statistika</title>
        <!-- Load d3.js & color scale -->
        <script src="https://d3js.org/d3.v4.js"></script>
        <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- FONT -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
      <?php 
        require_once "functions/function.php";
        require_once "functions/statistics.php";
        require_once "blocks/head.php";
      ?>
      <?php 
        $priorityArray = priorities();
        $budgAndProjFinancier = budgAndProjFinancier();
        $priorityBudgeArray = priorityBudget();
      ?>
        <header class="shadow-sm">
			<div class="container">
				<div class="row">
					<div class="col-md">
						<a class="header-logo" href="/">
							<img src="/ProView Bauska Logo - Final.png" class="header-logo" alt="Logo">
						</a>
					</div>
					<div class="col-md">
						<div class='admin-button' onclick='window.location="/"'>
							Visi projekti
						</div>
					</div>
				</div>
        </header>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12 shadow-sm p-3 mb-5 bg-white rounded individual-main-container">
                    <b class="coordination-name">Kopējais budžets projektiem</b>
                    <div class="stat1-container col-md-4">
                        <img src="Design/Icons/statistical.png" class="stat1-icon" alt="Stat1 icon">
                        <input type="text" class="stat1-form" name="stat1" value="<?php echo intToMoney(budgetSum(0));?>" maxlength="65534" disabled>
                    </div>

                    <div class="container mt-3">
                        <div class="row">

                        </div>
                    </div>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <b class="coordination-name">Budžeta sadalījums pēc vietējā termiņa prioritātēm</b>
                                <div id="budgetBySection">        
                                    <script>
                                        budgetBySection([
                                        ['Sekcija', 'Daudzums eiro'],
                                        ['Mobilitāte un satiksmes drošība', <?php echo intToMoney($priorityBudgeArray[0]);?>],
                                        ['Kvalitatīva, droša vide', <?php echo intToMoney($priorityBudgeArray[1]);?>],
                                        ['Kvalitatīva izglītība', <?php echo intToMoney($priorityBudgeArray[2]);?>],
                                        ['Pievilcīga kultūras un sporta vide', <?php echo intToMoney($priorityBudgeArray[3]);?>],
                                        ['Efektīva pārvalde', <?php echo intToMoney($priorityBudgeArray[4]);?>]
                                        ]);
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b class="coordination-name">Projektu daudzums pēc vidējā termiņa prioritātēm</b>
                                <div id="projectsInSection">        
                                    <script>
                                        projectsInSection([
                                            ['Sekcija', 'Projektu skaits', { role: 'style' }],
                                            ['Mobilitāte un satiksmes drošība', <?php echo $priorityArray[0];?>, '#2D9CDB'],
                                            ['Kvalitatīva, droša vide', <?php echo $priorityArray[1];?>, '#EB5757'],
                                            ['Kvalitatīva izglītība', <?php echo $priorityArray[2];?>, '#27AE60'],
                                            ['Pievilcīga kultūras un sporta vide', <?php echo $priorityArray[3];?>, '#F2994A'],
                                            ['Efektīva pārvalde', <?php echo $priorityArray[4];?>, '#9B51E0']
                                        ]);
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b class="coordination-name">Projektu sadalījums pēc finansētāja</b>
                                <div id="projectsByFinancier">        
                                    <script>
                                        projectsByFinancier([
                                        ['Finansētājs', 'Projektu skaits', { role: 'style' }],
                                        <?php
                                            $colors = ['#2D9CDB', '#EB5757', '#27AE60', '#F2994A', '#9B51E0'];
                                            $count = 0;
                                            foreach($budgAndProjFinancier[1] as $keypair => $valuePair){ ?>
                                                ['<?php echo $keypair;?>', <?php echo $valuePair;?>, '<?php echo $colors[$count] ?>'],
                                            <?php
                                                $count = $count + 1;
                                                }
                                            ?>
                                        ]);
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b class="coordination-name">Finansējuma apjoms pēc finansētāja</b>
                                <div id="moneyByFinancier">        
                                    <script>
                                        moneyByFinancier([
                                        ['Finansētājs', 'Finansējums eiro', { role: 'style' }],
                                        <?php
                                            $colors = ['#2D9CDB', '#EB5757', '#27AE60', '#F2994A', '#9B51E0'];
                                            $count = 0;
                                            foreach($budgAndProjFinancier[0] as $keypair => $valuePair){ ?>
                                            ['<?php echo $keypair;?>', <?php echo intToMoney($valuePair);?>, '<?php echo $colors[$count] ?>'],
                                            <?php
                                                $count = $count + 1;
                                                }
                                            ?>
                                        ]);
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </body>
</html>