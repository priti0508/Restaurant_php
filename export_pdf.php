<?php
include 'db.php';

header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=courses.pdf");

echo "<h2>Course Report</h2>";

echo "<table border='1' cellpadding='10'>
<tr>
<th>ID</th>
<th>Course Name</th>
<th>Description</th>
<th>Duration</th>
</tr>";

$res = mysqli_query($conn,"SELECT * FROM menu_items");

while($row=mysqli_fetch_assoc($res)){
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['item_name']."</td>
    <td>".$row['description']."</td>
   
    </tr>";
}

echo "</table>";
?>