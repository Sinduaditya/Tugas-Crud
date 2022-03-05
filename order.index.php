<?php

// Membaca dan menampilkan data customer ke front-end
include 'database_conn.php';
    
$query = "select orders.*, customers.firstname, customers.email from orders left join customers on (orders.customer_id = customers.customer_id) limit 200";
$result = mysqli_query($db_connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php include 'message.php';  ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="float-left mb-4">
                <h2>Customers Orders List</h2>
            </div>            
            <div class="float-right">
                <a href="add.order.php" class="btn btn-success">Tambah customer order baru</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Tanggal Order</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Fetch data customer dengan array assosiative -->
                <?php $number = 1; ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($order_data = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th scope="row"><?php echo $number;?></th>
                        <td><?php echo $order_data['firstname'];?></td>
                        <td><?php echo $order_data['email'];?></td>
                        <td><?php echo $order_data['product'];?></td>
                        <td><?php echo $order_data['date'];?></td>
                        <td>
                            <a href="delete_order.php?id=<?php echo $order_data['id'];?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $number++; ?>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="">Tidak ada data ditemukan!</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <a href="index.php" class="btn btn-primary my-3">Kembali ke daftar customer</a>
            </div>
        </div>
    </div>    
</div>
</body>
</html>