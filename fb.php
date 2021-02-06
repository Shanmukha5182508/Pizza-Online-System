<?php
$con = mysqli_connect
("localhost","root","mrunal15","mrunal");
if(!$con)
{
die("could not connect".mysqli_error($con));
}
else
{
echo"congrats! connection established successfully<br>";
// escape variables for security
$First_name = mysqli_real_escape_string($con, $_POST['nm']);
//$Last_name = mysqli_real_escape_string($con, $_POST['Last_Name']);
//$Birth_date =mysqli_real_escape_string($con, $_POST['Birthday_Day','Birthday_Month','Birthday_Year']);
$Email_id = mysqli_real_escape_string($con, $_POST['eml']);
//$Mobile_no = mysqli_real_escape_string($con, $_POST['Mobile_No']);
//$Male = mysqli_real_escape_string($con, $_POST['Male']);
//$Female = mysqli_real_escape_string($con, $_POST['Female']);
$Feedback= mysqli_real_escape_string($con, $_POST['fdb']);
$sql="INSERT INTO fb(First_name,Email_id,Feedback)
VALUES ('$First_name','$Email_id','$Feedback')";
if (!mysqli_query($con,$sql)) { die('error: ' . mysqli_error($con));
}
echo " Feedback added<br><br>";





$result = mysqli_query($con,"SELECT * FROM fb");
echo "<table border='1'>
<tr>
<th>First_name</th>


<th>Email_id</th>
<th>Feedback</th>


</tr>

";
echo "<a href='main.html'><u><font color=blue>HOME</font></u></a>";

while($row = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['First_name']."</td>";
//echo"<td>".$row['Last_name']."</td>";

echo"<td>".$row['Email_id']."</td>";
//echo"<td>".$row['Mobile_no']."</td>";


echo"<td>".$row['Feedback']."</td>";
echo"</tr>";
}
echo"</table>";
}
mysql_close($con);
?>
