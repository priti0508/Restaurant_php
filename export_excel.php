<?php
include "db.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=courses.xls");

echo "ID\tCourse Name\tDescription\tDuration\n";

$res = mysqli_query($conn,"SELECT * FROM menu_items");

while($row=mysqli_fetch_assoc($res)){
    echo $row['id']."\t".
         $row['item_name']."\t".
         $row['description']."\t";
         
}
?>