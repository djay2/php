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

//DISPLAY STATUS WITH DATA

$sql1 = "SELECT * FROM feedback WHERE `Status`='action required' ";
$result = mysqli_query($mysqli, $sql1);

//echo $result->num_rows;

if ($result->num_rows > 0) {
// Fetch all
$i=1;
  print "<form method='post'><table border=1><tr>\n"; 
  //print"<td><input type='checkbox' id='cb'>select all</td>";
  print "\t<td></td><td>Purchase Requisition"; 
  print "</td>";
  print "<td>Material";
  print "</td>";
  print "<td>Short Text</td>";
  print "<td>User Remarks</td>";
  print "<td>Status</td>";
  print "<td>Date</td>";
  print "<td>Time</td>";
  print "</tr>"; 
while($row = $result->fetch_assoc()) {
   
  $pr= $row['Purchase Requisition'];
  $m= $row['Material'];
  $st=$row['Short Text'];
  $ur=$row['User Remarks'];
  $status=$row['Status'];
  $date=$row['Date'];
  $time=$row['Time'];
  //echo $pr;
  //echo $m;
 
echo  "<tr><td><input type='checkbox' name='language[]' id='cb".$i."' value='".$pr."'></td><td>".$pr."</td><td>".$m."</td><td>".$st."</td><td>".$ur."</td><td>".$status."</td><td>".$date."</td><td>".$time."</td></tr>"; 
$i++;
}
print"<tr><td align='center'><input type='submit' name='submit'></td></tr>";
print "</table>";
}
else
{ echo "no result";}

if(isset($_POST["submit"]))
          {
           $for_query = '';
           if(!empty($_POST["language"]))
           {
            foreach($_POST["language"] as $language)
            {
             $for_query = $language ;
				$sql2="UPDATE feedback SET 
`Status`='action taken'
WHERE 
`Purchase Requisition`=$for_query";
			$result=mysqli_query($mysqli, $sql2);
			}
			//echo $for_query;
		  }
		  }
$mysqli->close();

?>