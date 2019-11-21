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
        require_once "blocks/head.php";
      ?>
      <h1>Kopējā projektu statistika</h1>
      <a class="back-button" href="index.php"><span>Visi Projekti</span></a>
      <h2>Kopējais budžets projektiem: <?php echo budgetSum(0);?></h2>        
        <div id="budgetBySection">        
            <script>
                budgetBySection([
                ['Sekcija', 'Daudzums eiro'],
                ['Mobilitāte un satiksmes drošība', 10000000],
                ['Kvalitatīva, droša vide', 1238866],
                ['Kvalitatīva izglītība', 32465546],
                ['Pievilcīga kultūras un sporta vide', 5534566],
                ['Efektīva pārvalde', 438744]
                ]);
            </script>
        </div>
        <div id="barChartWrapper">
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
                    ['ERAF', 100000],
                    ['Pašvaldība', 332445],
                    ['Valsts', 2543312],
                    ['ES', 943242]
                    ]);
                </script>
            </div>
            <div id="projectsInSection">        
                <script>
                    projectsInSection([
                        ['Sekcija', 'Projektu skaits'],
                        ['Mobilitāte un satiksmes drošība', 10],
                        ['Kvalitatīva, droša vide', 12],
                        ['Kvalitatīva izglītība', 24],
                        ['Pievilcīga kultūras un sporta vide', 5],
                        ['Efektīva pārvalde', 8]
                    ]);
                </script>
            </div>
        </div>
      </div>
    </body>
</html>