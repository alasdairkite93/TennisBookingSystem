<?php
  session_start();
?>

<html>
<head>
</head>
<body>
  <h3>Tennis COMP8870</h3>

  <?php

  $name = $_POST['name'];
  $playerId = $_POST['playerId'];

  $_SESSION["playerId"] = $playerId;
  $_SESSION["name"] = $name;

  echo "<p>Hello ".$name." ".$playerId."! Please select a date and one of more coaches:</p>";
  require 'connect.php';
  $conn=myconnect();
  $sql = "SELECT coachId, name, gender, location FROM Coach JOIN Court ON Coach.courtNo = Court.courtNo ORDER By name ASC;";
  $handle = $conn->prepare($sql);
  $handle->execute();
  $conn = null;
  $res = $handle->fetchAll();
  ?>
  <form action="check.php" method="post">
    <fieldset>
    <input type="date" name="date">
  <?php
  echo "<table><tr><th>Name</th><th>location</th><th>gender</th><th></th></tr>";
  foreach($res as $row)
  {
    echo "<tr><td>".$row['name']."</td><td>".$row['location']."</td><td>".$row['gender']."</td><td><input type='checkbox' name='coachId[]' value=".$row['coachId']."></td></tr>";
  }

  echo "</table>";
   ?>

 </fieldset>
    <input type="submit" value="Check Availability">

 </form>
 </body>
 </html>
