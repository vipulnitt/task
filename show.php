<?php
include 'partials/_dbconnect.php';
function dateDiffInDays($date1, $date2) 
  {
      $diff = strtotime($date2) - strtotime($date1);
      return abs(round($diff / 86400));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>

</head>
<body>
<h1 align="center"> Employee Details</h1>
<table cellspacing="3" bgcolor="#000000" align="center">
<?php

$sql = "SELECT * FROM `details` ORDER BY `Id` ASC";
$res = mysqli_query($conn,$sql);
?>
<tr bgcolor="#ffffff"> 
<th>Id</th>
<th>Name</th>
<th>Position</th>
<th>Date of Joining</th>
<th>Year</th>
</tr>
<?php
if(mysqli_num_rows($res))
{    
    while($image=mysqli_fetch_assoc($res))
    {   
        $datetime1=date("Y-m-d");
        $datetime2= $image['DateOfJoining'];
        $interval = (dateDiffInDays($datetime1, $datetime2))/365;
        if($interval<=5)
        {
            ?>
              <tr bgcolor="#ffffff">
            <?php
        }else
        {
            ?>
            <tr bgcolor="#A6FF00">
          <?php
        }
     ?>

<td><?php echo $image['Id'] ?></td>
    <td><?php echo $image['Name'] ?></td>
<td> <?php echo $image['Position'] ?></td>
<td><?php echo $image['DateOfJoining'] ?></td>
<td><?php echo $interval?></td>
</tr>
     <?php
    }
}

?>
</table>
</body>
</html>