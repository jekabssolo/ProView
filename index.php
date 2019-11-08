<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
      .project-table{
        border-collapse: collapse;
        border: 1px solid black;
        width: 60%;
        font-size: 110%;
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
    </style>
    <title>Projekti</title>
      <?php
        require_once "functions/function.php";
        $projects = getProjects("");
       ?>
    </head>



    
    <body>
        <h1 style="text-align:center;">ProView Bauska</h1>



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