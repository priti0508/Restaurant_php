<?php
session_start();
include 'db.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(to right, #eef2f3, #8e9eab);
}


.navbar {
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}


.carousel-item img {
    height: 400px;
    object-fit: cover;
    border-radius: 10px;
}


.card {
    border-radius: 15px;
    transition: 0.3s;
    border: none;
}
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.card img {
    height: 200px;
    object-fit: cover;
}

.btn-edit {
    background-color: orange;
    color: white;
}
.btn-delete {
    background-color: red;
    color: white;
}
</style>

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 shadow">

  <a class="navbar-brand fw-bold text-warning">Food Items</a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="nav">

   
    <ul class="navbar-nav me-auto">

      <li class="nav-item">
        <a class="nav-link" href="home.php"> Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="add.php"> Add food</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="view.php"> View food</a>
      </li>

      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
           Export Data
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="export_excel.php">Excel</a></li>
          <li><a class="dropdown-item" href="export_pdf.php">PDF</a></li>
        </ul>
      </li>

    </ul>

   
    <div class="d-flex">
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>

  </div>

</nav>


<div class="container mt-5">
<div class="row">

<?php
$res = mysqli_query($conn,"SELECT * FROM menu_items");
while($row=mysqli_fetch_assoc($res)){
?>

<div class="col-md-4 mb-4">
<div class="card">

<img src="uploads/<?php echo $row['image']; ?>">

<div class="card-body">
<h5><?php echo $row['item_name']; ?></h5>
<p><?php echo $row['description']; ?></p>

<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit btn-sm">Edit</a>

<a href="delete.php?id=<?php echo $row['id']; ?>" 
class="btn btn-delete btn-sm"
onclick="return confirm('Delete this items?')">Delete</a>

</div>

</div>
</div>

<?php } ?>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>