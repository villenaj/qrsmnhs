<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','qrattendance');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"qrattendance");
$sql = "SELECT * FROM events WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo '<table class="table table-bordered" id="event-table">';
echo '<thead>';
echo '<tr>';
echo '<th style="width: 20%;">Attribute</th>';
echo '<th style="width: 80%;">Details</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while($row = mysqli_fetch_array($result)) {
  echo '<tr>';
  echo '<td>Title</td>';
  echo '<td>' . $row['title'] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>Description</td>';
  echo '<td>';
  echo '<div style="height: 100px; overflow: auto;">';
  echo $row['description'];
  echo '</div>';
  echo '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>Who</td>';
  echo '<td>' . $row['who'] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>Start</td>';
  echo '<td>' . $row['start'] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>End</td>';
  echo '<td>' . $row['end'] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>Location</td>';
  echo '<td>' . $row['location'] . '</td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

mysqli_close($con);
?>