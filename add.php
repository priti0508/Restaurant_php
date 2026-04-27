<?php
session_start();
include 'db.php';

if(isset($_POST['add'])){
$name=$_POST['name'];
$desc=$_POST['desc'];


$img=$_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'],"uploads/".$img);

mysqli_query($conn,"INSERT INTO menu_items(item_name,description,image,user_id)
VALUES('$name','$desc','$img','".$_SESSION['id']."')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            padding-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            border: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card p-4">
                <h3 class="text-center mb-4 fw-bold"> Add New items</h3>
                
                <form method="POST" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">item Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter food Name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="desc" class="form-control" rows="3" placeholder="Enter food  Description" required></textarea>
                    </div>
                
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Items Image</label>
                        <input type="file" name="img" class="form-control" required>
                    </div>
                    
                    <div class="d-grid mt-4">
                        <button type="submit" name="add" class="btn btn-success btn-lg">Add item</button>
                    </div>
                    
                </form>
                <div class="text-center mt-3">
                    <a href="home.php" class="btn btn-outline-secondary btn-sm"> Back to Home</a>
                </div>
                
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>