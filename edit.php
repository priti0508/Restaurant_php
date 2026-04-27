<?php
include 'db.php';
$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM menu_items WHERE id=$id"));

if(isset($_POST['update'])){
$name=$_POST['name'];
mysqli_query($conn,"UPDATE menu_items SET item_name='$name' WHERE id=$id");
header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food </title>
    
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
                <h3 class="text-center mb-4 fw-bold"> Edit item</h3>
                
                <form method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Food Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $data['item_name']; ?>" required>
                    </div>
                    
                    <div class="d-grid mt-4">
                        <button type="submit" name="update" class="btn btn-warning btn-lg text-dark fw-bold">Update</button>
                    </div>
                    
                </form>
                <div class="text-center mt-3">
                    <a href="home.php" class="btn btn-outline-secondary btn-sm"> Cancel</a>
                </div>
                
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>