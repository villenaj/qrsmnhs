<?php
$con = mysqli_connect('us-cdbr-east-06.cleardb.net','b3f163b9ed5cc0','e937938d','heroku_8f911c5e407f80b');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$today = date('Y-m-d');

echo "<table class='table table-bordered table-striped'>
<tr>
<th width='33%'>Name</th>
<th width='33%'>Status</th>
<th width='33%'>Time</th>
</tr>";

$pmoutsql = "SELECT a.*, e.* FROM attendances a
JOIN employees e ON a.idemp = e.id
WHERE a.date = '$today'
ORDER BY a.pmout DESC";
$pmout = mysqli_query($con,$pmoutsql);

while($row = mysqli_fetch_array($pmout)) {
  if($row['pmout'] !== NULL) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
    echo "<td>" . "Departed" . "</td>";
    echo "<td>" . date("h:i:s A", strtotime($row['pmout'])) . "</td>";
    echo "</tr>";
  }
}

$pminql = "SELECT a.*, e.* FROM attendances a
JOIN employees e ON a.idemp = e.id
WHERE a.date = '$today'
ORDER BY a.pmin DESC";
$pmin = mysqli_query($con,$pminql);

while($row = mysqli_fetch_array($pmin)) {
  if($row['pmin'] !== NULL) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
    echo "<td>" . "Arrived" . "</td>";
    echo "<td>" . date("h:i:s A", strtotime($row['pmin'])) . "</td>";
    echo "</tr>";
  }
}

$amoutsql = "SELECT a.*, e.* FROM attendances a
JOIN employees e ON a.idemp = e.id
WHERE a.date = '$today'
ORDER BY a.amout DESC";
$amout = mysqli_query($con,$amoutsql);

while($row = mysqli_fetch_array($amout)) {
  if($row['amout'] !== NULL) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
    echo "<td>" . "Departed" . "</td>";
    echo "<td>" . date("h:i:s A", strtotime($row['amout'])) . "</td>";
    echo "</tr>";
  }
}

$aminsql = "SELECT a.*, e.* FROM attendances a
JOIN employees e ON a.idemp = e.id
WHERE a.date = '$today'
ORDER BY a.amin DESC";
$amin = mysqli_query($con,$aminsql);

while($row = mysqli_fetch_array($amin)) {
  if($row['amin'] !== NULL) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
    echo "<td>" . "Arrived" . "</td>";
    echo "<td>" . date("h:i:s A", strtotime($row['amin'])) . "</td>";
    echo "</tr>";
  }
}

echo "</table>";

mysqli_close($con);
?>
