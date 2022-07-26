<?php

function myconnect() {
  $host = 'localhost';
  $dbname = 'websystems';
  $user = 'root';
  $pwd = 'password';

  try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($conn) {
    return $conn;
          echo 'Connected to ' . $dbname;
        } else {
            echo 'Failed to connect';
          }
  } catch (PDOException $e) {
      echo "PDOException: ".$e->getMessage();
    }
  }
  ?>
