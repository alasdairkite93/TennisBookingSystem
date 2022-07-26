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
$info = $_POST['time'];
$name = $_SESSION["name"];
$date = $_POST['date'];
$playerId = $_SESSION["playerId"];
$exp = explode(",", $info);
$time = $exp[0];
$coachId = $exp[1];

try {
$conn=myconnect();
$sql ="INSERT INTO Training (playerId, onDate, atTime, coachId) VALUES (:playerId, :date, :time, :coachId)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":playerId", $playerId);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':time', $time);
$stmt->bindParam(':coachId', $coachId);

$coachname =$conn->prepare("SELECT name FROM Coach WHERE coachId='$coachId'");
$coachname->execute();
$result=$coachname->fetchAll();
foreach($result as $row){
  $coachname = $row['name'];
}

if($stmt->execute()){
  echo "Thank you $name, your booking was successful.";
  echo "<p> Summary: training with $coachname on $date at $time</p>";
}else {
  echo "record not created";}
} catch (PDOException $e){
print_r($e);
}

?>
</body>
</html>
