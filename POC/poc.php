
<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BausVote POC</title>
  </head>
  <body>
    <h1>Hello world!</h1>
    <?php
      $link = mysqli_connect(
                  'localhost',  /*hosting*/
                  'root',  /*login */
                  '',/*password */
                  'bauska_projects'); /*Data base name */

      mysqli_set_charset($link,"utf8");
      if (!$link) {
         printf("Nav iespējams pieslēgties datu bāzei. Kļūdas kods: %s\n", mysqli_connect_error());
         exit;
      };

      $query = "SELECT * FROM projekti";

      if ($result = mysqli_query($link, $query)) {

          /* Get array */
          while ($row = mysqli_fetch_assoc($result)) {
              echo $row["project_name"],". Budžets: ", $row["budget"];
          }
          /* Free results */
          mysqli_free_result($result);
      }
      /* close connection */
      mysqli_close($link);
     ?>
  </body>
</html>
