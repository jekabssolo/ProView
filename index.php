<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
      .project-table{
        position: absolute;
        border-collapse: collapse;
        border: 1px solid black;
        width: 60%;
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
       ?>
    </head>



    
    <body>


        <h1 style="text-align:center;">ProView Bauska</h1>
        <br>


        <!-- filter by status -->
        <form method="post" class="filter">
          Filtrēt: <br> <br>
          Pēc statusa <br> <br>
          <input type="radio" name="status" value="Aktīvs" <?php if((isset($_POST['status']) && $_POST['status'] == 'Aktīvs')) echo ' checked="checked"';?> > Aktīvs<br>
          <input type="radio" name="status" value="Arhivēts" <?php if((isset($_POST['status']) && $_POST['status'] == 'Arhivēts')) echo ' checked="checked"';?>> Arhivēts<br>
          <input type="radio" name="status" value="Plānošana" <?php if((isset($_POST['status']) && $_POST['status'] == 'Plānošana')) echo ' checked="checked"';?>> Plānošana<br>
          <input type="radio" name="status" value="Balsošana" <?php if((isset($_POST['status']) && $_POST['status'] == 'Balsošana')) echo ' checked="checked"';?>> Balsošana<br>
          <input type="radio" name="status" value="Iesniegts" <?php if((isset($_POST['status']) && $_POST['status'] == 'Iesniegts')) echo ' checked="checked"';?>> Iesniegts <br> <br>
          <input type="submit" value="Filtrēt">
        </form>

        <!-- Search form -->
        <form method="post" class="search-field">
              Meklēt pēc nosaukuma<br>
              <input type="text" size="30" placeholder="Sāc rakstīt" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
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

          // filter by status results
          if(array_key_exists('status',$_POST)){
            require_once "functions/filterstatus.php";
            $projects = getProjectsthatstatus($_POST["status"]);
          }




          // search results
          if(array_key_exists('search',$_POST)){
            require_once "functions/search.php";
            $projects = getProjectscontaining($_POST["search"]);
          }

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





<!-- <label for="x">I am looking for:</label>
<select id="x">
  <option value="t1">Tag 1</option>
  <option value="t2">Tag 2</option>
  <option value="t3">Tag 3</option>
</select>

<label for="y">That has:</label>
<select id="y">
  <option value="t4">Tag 4</option>
  <option value="t5">Tag 5</option>
  <option value="t6">Tag 6</option>
</select>

<label for="z">and is:</label>
<select id="z">
  <option value="t7">Tag 7</option>
  <option value="t8">Tag 8</option>
  <option value="t9">Tag 9</option>
</select> -->

    </body>
</html>