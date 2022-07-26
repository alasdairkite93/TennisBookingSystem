<?php
  session_start();
 ?>

<html>
<head>
</head>
<body>
  <h3>Tennis COMP8870</h3>
<?php
require 'connect.php';
  $date = $_POST['date'];
  $coachId = $_POST['coachId'];

  $_SESSION["date"] = $date;

$conn=myconnect();

$Jane10 = "SELECT training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I1' AND training.onDate='$date' AND training.atTime='10:00:00';";
$handleJane10 = $conn->prepare($Jane10);
$handleJane10->execute();
$resJane10 = $handleJane10->fetchAll();

$Jane12 = "SELECT training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I1' AND training.onDate='$date' AND training.atTime='12:00:00';";
$hJane12 = $conn->prepare($Jane12);
$hJane12->execute();
$resJane12 = $hJane12->fetchAll();

$Jane16 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I1' AND training.onDate='$date' AND training.atTime='16:00:00';";
$hJane16 = $conn->prepare($Jane16);
$hJane16->execute();
$resJane16 = $hJane16->fetchAll();


$Yasser10 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I2' AND training.onDate='$date' AND training.atTime='10:00:00';";
$hYasser10 = $conn->prepare($Yasser10);
$hYasser10->execute();
$resYasser10 = $hYasser10->fetchAll();

$Yasser12 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I2' AND training.onDate='$date' AND training.atTime='12:00:00';";
$hYasser12 = $conn->prepare($Yasser12);
$hYasser12->execute();
$resYasser12 = $hYasser12->fetchAll();

$Yasser16 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I2' AND training.onDate='$date' AND training.atTime='16:00:00';";
$hYasser16 = $conn->prepare($Yasser16);
$hYasser16->execute();
$resYasser16 = $hYasser16->fetchAll();



$Jones10 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I3' AND training.onDate='$date' AND training.atTime='10:00:00';";
$hJones10 = $conn->prepare($Jones10);
$hJones10->execute();
$resJones10 = $hJones10->fetchAll();

$Jones12 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I3' AND training.onDate='$date' AND training.atTime='12:00:00';";
$hJones12 = $conn->prepare($Jones12);
$hJones12->execute();
$resJones12 = $hJones12->fetchAll();

$Jones16 = "SELECT coach.name, training.onDate, training.atTime FROM training INNER
JOIN Coach ON training.coachId=Coach.coachId WHERE Coach.coachId = 'I3' AND training.onDate='$date' AND training.atTime='16:00:00';";
$hJones16 = $conn->prepare($Jones16);
$hJones16->execute();
$resJones16 = $hJones16->fetchAll();


 ?>
 <form method="post" action="book.php">
 <fieldset>
    <table>
   <tr>
     <th>Name</th>
     <th>10:00</th>
     <th>12:00</th>
     <th>16:00</th>
   </tr>
<tr>
  <td>Jane Smith</td>
  <td><?php if (empty($resJane10)){?><p><input type='radio' name='time' value='10:00:00,I1'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
  <td><?php if (empty($resJane12)){?><p><input type='radio' name='time' value='12:00:00,I1'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
  <td><?php if (empty($resJane16)){?><p><input type='radio' name='time' value='16:00:00,I1'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
</tr>
<tr>
  <td>Yasser Crimp</td>
  <td><?php if (empty($resYasser10)){?><p><input type="radio" name="time" value='10:00:00,I2'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
  <td><?php if (empty($resYasser12)){?><p><input type="radio" name="time" value='12:00:00,I2'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
  <td><?php if (empty($resYasser16)){?><p><input type="radio" name="time" value='16:00:00,I2'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
</tr>
<tr>
  <td>Jane Jones</td>
  <td><?php if (empty($resJones10)){?><p><input type="radio" name="time" value='10:00:00,I3'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
  <td><?php if (empty($resJones12)){?><p><input type="radio" name="time" value='12:00:00,I3'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
  <td><?php if (empty($resJones16)){?><p><input type="radio" name="time" value='16:00:00,I3'></p><?php } else {?><p><input type="radio" name="time" disabled></p><?php }?></td>
</tr>
</table>
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>" >
<input type="submit" value="Book training">
</fieldset>
</body>
</html>
