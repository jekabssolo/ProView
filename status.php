<!DOCTYPE html>
<html>
    <head>
        <?php require_once "blocks/head.php"; ?>
    </head>
    <body>
      <h1>"Project title"</h1>
      <select name="Project view" id="selectView">
        <option value="About">About</option>
        <option value="Status" selected="selected">Status</option>
      </select>
      <div id="progressBorder">
        <div id="progressBar"></div>
      </div>
      <div id="progressTitle">
          <h2>Voting</h2>
          <h2>Planning</h2>
          <h2>Active</h2>
          <h2>Completed</h2>
      </div>
      <h1>Project completion</h1>
      <h1>Update log</h1>
      <h1>Budget Overview</h1>
    </body>
    <script src="script.js"></script>
</html>
