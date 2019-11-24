<?php
    require_once "connect.php";
    require_once "function.php";

    function priorityBudget(){
        global $mysqli;
        connectDB();
        // Settings for query
        $query = "SELECT Category, Budget  FROM projekti";   
        $result = mysqli_query($mysqli, $query);
        closeDB();
        $prioritiesAndBudget = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $SecurityBudget = 0;
        $EnvironmentBudget = 0;
        $EducationBudget = 0;
        $CultureBudget = 0;
        $ManagementBudget = 0;
        $priorityBudget = [];
        for($i = 0; $i < count($prioritiesAndBudget); $i++){
                switch ($prioritiesAndBudget[$i]["Category"]) {
                    case 'Mobilitāte un satiksmes drošība':
                        $SecurityBudget += $prioritiesAndBudget[$i]["Budget"];
                        break;
                    case 'Kvalitatīva, droša vide':
                        $EnvironmentBudget += $prioritiesAndBudget[$i]["Budget"];
                        break;
                    case 'Kvalitatīva izglītība':
                        $EducationBudget += $prioritiesAndBudget[$i]["Budget"];
                        break;
                    case 'Pievilcīga kultūras un sporta vide':
                        $CultureBudget += $prioritiesAndBudget[$i]["Budget"];
                        break;
                    case 'Efektīva pārvalde':
                        $ManagementBudget += $prioritiesAndBudget[$i]["Budget"];
                        break;
                };
            
        };
        $priorityBudget = [$SecurityBudget, $EnvironmentBudget, $EducationBudget, $CultureBudget, $ManagementBudget];
        return $priorityBudget;
    };

    function priorities(){
        global $mysqli;
        connectDB();
        $query = "SELECT Category FROM projekti";    
        $result = mysqli_query($mysqli, $query);
        closeDB();
        $priorities = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $prioritySecurity = 0;
        $priorityEnvironment = 0;
        $priorityEducation = 0;
        $priorityCulture = 0;
        $priorityManagement = 0;
        $priorityArray = [];
        for($i = 0; $i < count($priorities); $i++){  
            switch ($priorities[$i]["Category"]) {
                case 'Mobilitāte un satiksmes drošība':
                    $prioritySecurity += 1;
                    break;
                case 'Kvalitatīva, droša vide':
                    $priorityEnvironment += 1;
                    break;
                case 'Kvalitatīva izglītība':
                    $priorityEducation += 1;
                    break;
                case 'Pievilcīga kultūras un sporta vide':
                    $priorityCulture += 1;
                    break;
                case 'Efektīva pārvalde':
                    $priorityManagement += 1;
                    break;
            };
        };
        $priorityArray = [$prioritySecurity, $priorityEnvironment, $priorityEducation, $priorityCulture, $priorityManagement];
        return $priorityArray;
      }

    function budgAndProjFinancier(){
        global $mysqli;
        connectDB();
        $query = "SELECT * FROM finansetajs";    
        $result = mysqli_query($mysqli, $query);
        closeDB();
        $budgetByFinancier = array();
        $projectsByFinancier = array();
        $financier = mysqli_fetch_all($result,MYSQLI_ASSOC);
        for($i = 0; $i < count($financier); $i++){ 
            $financierName =  array_slice($financier[$i],2);
            foreach($financierName as $keypair => $valuePair){                
                if(isset($valuePair) and isset($projectsByFinancier[$keypair])){
                    $projectsByFinancier[$keypair] += 1;    
                }else if (isset($valuePair)){
                    $projectsByFinancier[$keypair] = 1;
                }
                if(isset($valuePair) and array_key_exists($keypair, $budgetByFinancier)){
                    $budgetByFinancier[$keypair] = $budgetByFinancier[$keypair] + $valuePair;
                }else if(isset($valuePair)){
                    $budgetByFinancier[$keypair] = $valuePair;
                }
            }
        }
        return [$budgetByFinancier, $projectsByFinancier];

    }; 
?>