<?php

$user = 'root';
$password = ''; //To be completed if you have set a password to root
$database = 'test'; //To be completed to connect to a database. The database must exist.
$port = 3308;
// Create connection

$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$prs=$_POST['prs'];
//DISPLAY STATUS WITH DATA

$sql1 = "SELECT * FROM feedback WHERE `Purchase Requisition`=$prs";
$result = mysqli_query($mysqli, $sql1);

if ($result->num_rows > 0) {
// Fetch all
$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
   
  $pr= $row['Purchase Requisition'];
  $m= $row['Material'];
  $st=$row['Short Text'];
  $ur=$row['User Remarks'];
  $status=$row['Status'];
  $date=$row['Date'];
  $time=$row['Time'];
  echo $pr;
  echo $m;
  print "<table border=1><tr>\n"; 
  print "\t<td>Purchase Requisition"; 
  print "</td>";
  print "<td>Material";
  print "</td>";
  print "<td>Short Text</td>";
  print "<td>User Remarks</td>";
  print "<td>Status</td>";
  print "<td>Date</td>";
  print "<td>Time</td>";
  print "</tr>"; 
 
echo  "<tr><td>".$pr."</td><td>".$m."</td><td>".$st."</td><td>".$ur."</td><td>".$status."</td><td>".$date."</td><td>".$time."</td></tr>"; 
 print "</table>";
}

$mysqli->close();

?>