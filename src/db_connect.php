<?php 

$HOST = "localhost";
$USER = "root";
$PASS = "root";
$DB="getajob";

$TABLE="profiles";

$con=mysqli_connect($HOST,$USER,$PASS,$DB);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/*


bayondbinstance.cisgn95exije.us-east-1.rds.amazonaws.com
$sql="SELECT * FROM ".$TABLE."  ";
echo("<br>".$sql);
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
$data[] = $row; 
}
echo("</br>");
echo("<pre>");print_r($data);echo("</pre>");
// Free result set
mysqli_free_result($result);
mysqli_close($con);
*/
?>
