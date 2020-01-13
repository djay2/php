<?php

if(isset($_POST['submit']))
{
	
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
$Search_for=$_POST['Search_for'];

$Entered_value=$_POST['Entered_value'];

$sql = "SELECT  `Purchase Requisition`,Material,`Short Text`,`User Remarks` FROM feedback WHERE `$Search_for`=$Entered_value";

$result = mysqli_query($mysqli, $sql);

if ($result->num_rows > 0) {
// Fetch all

  print "<table border=1><tr>\n"; 
  print "\t<td>Purchase Requisition"; 
  print "</td>";
  print "<td>Material";
  print "</td>";
  print "<td>Short Text</td>";
  print "<td>User Remarks</td>";
  print "</tr>";

while($row = $result->fetch_assoc())
	{

// Free result set
//mysqli_free_result($result);
  $pr= $row['Purchase Requisition'];
  $m= $row['Material'];
  $st=$row['Short Text'];
  $ur=$row['User Remarks'];
  //echo $pr;
  //echo $m; 
 
echo  "<tr><td>".$pr."</td><td>".$m."</td><td>".$st."</td><td>".$ur."</td></tr>"; 
 

	}
print "</table>";
}
else
{

}
	$mysqli->close();

}
?>

<html>
<body>
<form action="feedback_display.php" method="POST">
<table>
<tr>
<td>Enter PR no.</td>
<td><input type="text" name="pr"></td></tr>
<tr><td>User Remarks</td><td><textarea name="ur"></textarea></td></tr>
<tr><td></td><td><input type="submit" name="submit"></td></tr>
</table>
</form>
</body>
</html>