<?php
echo "<h1>mySQL DB connection test</h1>";
$host = 'poseidon.salford.ac.uk';
$dbname = 'aee826';
$user = 'aee826';
$pass = 'yi<Z^VT62mxA';

$dbHandle = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
$sqlQuery = 'SELECT * FROM lots '; // put your students table name
echo $sqlQuery;  //helpful for debugging to see what SQL query has been created

$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
$statement->execute();   // execute the PDO statement

echo "<table border='1'>";
while ($row = $statement->fetch()) {
    echo "<tr><td>" . $row[0] ."</td><td>". $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3]. "</td><td>" . $row[4]. "</td><td>" . $row[5]."</td><td>" . '<img src="images/' .$row[5]. ' " alt="no picture" />' . "</td>"
    ;}
    echo "</table>";
$dbHandle = null;
?>