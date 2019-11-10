<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
      .project-table{
        position: absolute;
        border-collapse: collapse;
        border: 1px solid black;
        width: 65%;
        font-size: 110%;
        top: 25%;
        left: 20%;
      }
      .project-table tr:nth-child(even){background-color: #f2f2f2;}
      .project-table tr:hover {background-color: #ddd;}
      .project-table th {
        padding-top: 12px;
        padding-bottom: 12px;
        padding-right: 12px;
        padding-left: 12px;
        text-align: left;
        background-color: #a3a3a3;
        color: black;
        border: 1px solid black;
      }
      .project-table td {
        border: 1px solid black;
        padding-top: 12px;
        padding-bottom: 12px;
        padding-right: 12px;
        padding-left: 12px;
      }
      [data-href] {
          cursor: pointer;
      }

      .search-field{
        position: absolute;
        left: 23%;
        top: 15%;
      }
      .filter{
        position: sticky;
      }

    </style>
    
    
    <title>Projekti</title>


      <?php
        require_once "functions/function.php";
        $projects = getProjects("");
        // search and filter results
        if(array_key_exists('search',$_POST) || array_key_exists('status',$_POST) || array_key_exists('financer',$_POST)){
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
          require_once "functions/searchfilter.php";
          $projects = getProjectscontaining($finanval, $statusval, $_POST["search"]);
        }
       ?>
  
    </head>



    
    <body>


        <h1 style="text-align:center;">ProView Bauska</h1>
        <br>


        <!-- filter forms -->
        <form method="post" class="filter">
          Filtrēt: <br> <br>
          Pēc statusa <br> <br>
          <input type="radio" name="status" value="Aktīvs" <?php if((isset($_POST['status']) && $_POST['status'] == 'Aktīvs')) echo ' checked="checked"';?> > Aktīvs<br>
          <input type="radio" name="status" value="Arhivēts" <?php if((isset($_POST['status']) && $_POST['status'] == 'Arhivēts')) echo ' checked="checked"';?>> Arhivēts<br>
          <input type="radio" name="status" value="Plānošana" <?php if((isset($_POST['status']) && $_POST['status'] == 'Plānošana')) echo ' checked="checked"';?>> Plānošana<br>
          <input type="radio" name="status" value="Balsošana" <?php if((isset($_POST['status']) && $_POST['status'] == 'Balsošana')) echo ' checked="checked"';?>> Balsošana<br>
          <input type="radio" name="status" value="Iesniegts" <?php if((isset($_POST['status']) && $_POST['status'] == 'Iesniegts')) echo ' checked="checked"';?>> Iesniegts <br> <br>
          
          Pēc finansētāja <br> <br>
          <input type="radio" name="financer" value="Pašvaldība" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'Pašvaldība')) echo ' checked="checked"';?> > Pašvaldība<br>
          <input type="radio" name="financer" value="Cits" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'Cits')) echo ' checked="checked"';?>> Cits<br>
          <input type="radio" name="financer" value="ELFLA" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'ELFLA')) echo ' checked="checked"';?>> ELFLA<br>
          <input type="radio" name="financer" value="ERAF" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'ERAF')) echo ' checked="checked"';?>> ERAF<br>
          <input type="radio" name="financer" value="ESF" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'ESF')) echo ' checked="checked"';?> > ESF<br>
          <input type="radio" name="financer" value="KF" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'KF')) echo ' checked="checked"';?>> KF<br>
          <input type="radio" name="financer" value="KPFI" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'KPFI')) echo ' checked="checked"';?>> KPFI<br>
          <input type="radio" name="financer" value="LAT-LIT" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'LAT-LIT')) echo ' checked="checked"';?>> LAT-LIT<br>
          <input type="radio" name="financer" value="NORVĒĢU FINANŠU INSTRUMENTS" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'NORVĒĢU FINANŠU INSTRUMENS')) echo ' checked="checked"';?>> NFI<br>
          <input type="radio" name="financer" value="Valsts" <?php if((isset($_POST['financer']) && $_POST['financer'] == 'Valsts')) echo ' checked="checked"';?>> Valsts<br> <br>
          
          <input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
          
          <input type="submit" value="Filtrēt">
        </form>

        <br>

        <!-- clearing filters form -->
        <form method="post" class="filter">
          <input name="status" value="" type="hidden">
          <input name="financer" value="" type="hidden">
          <input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
          <input type="submit" value="Notīrīt filtrus">
        </form>

        <!-- Search form -->
        <form method="post" class="search-field">
              Meklēt pēc nosaukuma<br>
              <input type="text" size="30" placeholder="Sāc rakstīt" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
              <input type="hidden" name="status" value="<?php echo isset($_POST['status']) ? $_POST['status'] : '' ?>">
              <input type="hidden" name="financer" value="<?php echo isset($_POST['financer']) ? $_POST['financer'] : '' ?>">
              <input type="submit" value="Meklēt">
        </form>



        <br>
        <table class="project-table" align="center">
        <tr class="header">
                <th>Nosaukums</th>
                <th>Statuss</th>
                <th>Īstenošanas laiks</th>
            </tr>
        <?php
          for ($i = 0; $i<count($projects); $i++){
           
            echo "<tr class='entry' data-href='/individualAbout.php?id=".$projects[$i]["ID"]."'>";
            echo "<td>", $projects[$i]["Name"], "</td>";
            echo "<td>".$projects[$i]["Status"]."</td>";
            echo "<td>".date("d.m.Y.", strtotime($projects[$i]["StartDate"])), " - ", date("d.m.Y.", strtotime($projects[$i]["FinishDate"])),"</td>";
            echo "</tr>";  
          };
         ?>
         </table>


         <!-- table row linking to individual view -->
         <script>
         jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                window.location = $(this).data("href");
            });
        });
         </script>



    </body>
</html>