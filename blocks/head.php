<?php require_once "functions/function.php"; ?>
<meta charset="utf-8">
<title>
<?php 
    $projName = dataToVariables($_GET["id"]); 
    echo $projName[0];
?>
</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/script.js"></script>
