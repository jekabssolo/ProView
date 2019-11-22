<!DOCTYPE html>
<html>
    <head>
        <title>Statistika</title>
        <!-- Load d3.js & color scale -->
        <script src="https://d3js.org/d3.v4.js"></script>
        <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
      <?php 
        require_once "functions/function.php";
        require_once "functions/statistics.php";
        require_once "blocks/head.php";
      ?>
      <?php 
        $priorityArray = priorities();
        $moneyFromFinancier = budgetByFinanciers();
        $priorityBudgeArray = priorityBudget();
      ?>
      <h1>Kopējā projektu statistika</h1>
      <a class="back-button" href="index.php"><span>Visi Projekti</span></a>
      <h2>Kopējais budžets projektiem: <?php echo budgetSum(0);?></h2>        
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
        <div id="barChartWrapper">
            <div id="projectsInSection">        
                <script>
                    projectsInSection([
                        ['Sekcija', 'Projektu skaits'],
                        ['Mobilitāte un satiksmes drošība', <?php echo $priorityArray[0];?>],
                        ['Kvalitatīva, droša vide', <?php echo $priorityArray[1];?>],
                        ['Kvalitatīva izglītība', <?php echo $priorityArray[2];?>],
                        ['Pievilcīga kultūras un sporta vide', <?php echo $priorityArray[3];?>],
                        ['Efektīva pārvalde', <?php echo $priorityArray[4];?>]
                    ]);
                </script>
            </div>
            <div id="projectsByFinancier">        
                <script>
                    projectsByFinancier([
                    ['Finansētājs', 'Projektu skaits'],
                    ['ERAF', 10],
                    ['Pašvaldība', 3],
                    ['Valsts', 2],
                    ['ES', 9]
                    ]);
                </script>
            </div>
            <div id="moneyByFinancier">        
                <script>
                    moneyByFinancier([
                    ['Finansētājs', 'Finansējums eiro'],
                    <?php
                        foreach($moneyFromFinancier as $keypair => $valuePair){ ?>
                          ['<?php echo $keypair;?>', <?php echo intToMoney($valuePair);?>],
                        <?php }
                        ?>
                    ]);
                </script>
            </div>
        </div>
      </div>
    </body>
</html>