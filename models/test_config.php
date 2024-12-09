<?php

$host = "localhost:8889";
$dbname= "student1000";
$username = "root";
$password = "root";

try{
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username,$password); 
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  echo "Connected successfully to the database";
}
catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * from students";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";

echo "<tr><th>First Name</th><th>Last Name</th></tr>";

foreach ($results as $row) {

    echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td></tr>";

}

echo "</table>";


$pdo = null;

?>