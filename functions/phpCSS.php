<?php
    header("Content-type: text/css; charset: UTF-8");
    function completionRow($status){
        if ($status["Status"] == "Aktīvs"){
            $barWidth = "600px";
            echo "Is here";
        }
    };
?>

#progressBar{
    width: <?php echo $barWidth ?>;
}