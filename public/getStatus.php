<?php

$con = mysqli_connect('localhost','root','','qrattendance');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$today = date('Y-m-d');
$sql = "SELECT a.*, e.* FROM attendances a
JOIN employees e ON a.idemp = e.id
WHERE a.date = '$today'";
$result = mysqli_query($con,$sql);

echo "<table class='table table-bordered table-striped'>
<tr>
<th width='80%'>Name</th>
<th width='10%'>AM</th>
<th width='10%'>PM</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
    if($row['amin']) {
        echo "<td>" . '<i class="fas fa-circle text-success">' . "</td>";
    }
    if($row['pmin']) {
        echo "<td>" . '<i class="fas fa-circle text-success">' . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>