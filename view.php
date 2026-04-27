<?php
include 'db.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
table {
background: linear-gradient(to right, #667eea, #764ba2);
color:white;
}
tr:hover {
background-color: rgba(255,255,255,0.2);
}
</style>

<div class="container mt-4">

<h3>Food Table</h3>

<table class="table text-white">
<tr>
<th>ID</th>
<th>Name</th>
<th>description</th>
</tr>

<?php
$res = mysqli_query($conn,"SELECT * FROM menu_items");

while($row=mysqli_fetch_assoc($res)){
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['item_name']; ?></td>
<td><?php echo $row['description']; ?></td>
</tr>

<?php } ?>

</table>

</div>


