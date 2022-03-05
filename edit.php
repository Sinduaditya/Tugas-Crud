<?php

include 'database_conn.php';
$query = "SELECT * FROM customers WHERE customer_id='" . $_GET["customer_id"] . "'"; // Fetch data from the table customers using id
$result = mysqli_query($db_connect, $query);
$customer = mysqli_fetch_assoc($result); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit customer - CRUD Sederhana Dengan mengunakan PHP, MySQL dan Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <div class="page-header mb-4">
      <h2>Edit customer</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <form action="edit_process.php" method="POST">
              <input type="hidden" name="customer_id" value="<?php echo $_GET["customer_id"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama depan</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $customer['firstname']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="exampleInputEmail1">Nama terakhir</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $customer['lastname']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $customer['email']; ?>" required="">
              </div>
              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>