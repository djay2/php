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

if(isset($_GET['order'])){ $order=$_GET['order']; }
else { $order='`Purchase Requisition`'; }

if(isset($_GET['sort'])){ $sort=$_GET['sort'];  }
else { $sort='ASC';}


$sql1 = "SELECT * FROM feedback ORDER BY $order $sort";
$result = mysqli_query($mysqli, $sql1);

echo $result->num_rows;

  

if ($result->num_rows > 0) {

$sort=='DESC' ? $sort='ASC' : $sort='DESC';

  print "<table border='1'>"; 
  print "<tr><td><a href='?order=`Purchase Requisition`&&sort=$sort'>Purchase Requisition</a></td>"; 
  print "<td><a href='?order=Material&&sort=$sort'>Material</a></td>";
  print "<td><a href='?order=`Short Text`&&sort=$sort'>Short Text</a></td>";
  print "<td><a href='?order=`User Remarks`&&sort=$sort'>User Remarks</a></td>";
  print "<td><a href='?order=Status&&sort=$sort'>Status</a></td>";
  print "<td>Date</td>";
  print "<td>Time</td>";
  print "</tr>"; 


while($row = $result->fetch_assoc())
	{
		
		
  $pr=$row['Purchase Requisition'];
  $m= $row['Material'];
  $st=$row['Short Text'];
  $ur=$row['User Remarks'];
  $status=$row['Status'];
  $date=$row['Date'];
  $time=$row['Time'];
  //echo $pr;
  //echo $m;

 
echo  "<tr><td>".$pr."</td><td>".$m."</td><td>".$st."</td><td>".$ur."</td><td>".$status."</td><td>".$date."</td><td>".$time."</td></tr>"; 
 
}
echo "</table>";
}
$mysqli->close();

?>