<?php

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$ur=$_POST['ur'];
$pr=$_POST['pr'];
$status='action required';
$date=date("d-m-Y");
echo $date;
date_default_timezone_set("Asia/Kolkata");
$time=date("H:i");
echo $time;
$sql = "UPDATE feedback SET 
`User Remarks`='$ur',
Status='$status',
Date='$date',
Time='$time'  
WHERE 
`Purchase Requisition`=$pr";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
	//header( "Location: dbfetch.php" );
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

//DISPLAY STATUS WITH DATA

$sql1 = "SELECT * FROM feedback WHERE `Purchase Requisition`=$pr";
$result = mysqli_query($mysqli, $sql1);

if ($result->num_rows > 0) {
// Fetch all
$row= mysqli_fetch_array($result, MYSQLI_ASSOC);

$pr= $row['Purchase Requisition'];
  $m= $row['Material'];
  $st=$row['Short Text'];
  $ur=$row['User Remarks'];
 
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