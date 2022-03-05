<?php

// add.order_process.php

include 'database_conn.php';

if(count($_POST) > 0) {

 $firstname = $_POST['firstname'];
 $product = $_POST['product'];
 $order = $_POST['order'];
 $order_ = date('Y-m-d');

 $query = "INSERT INTO orders (firstname, , product , ) VALUES ('$firstname', '', '$product' )";

 if (mysqli_query($db_connect, $query)) {
   $message = 1;
 } else {
   $message = 4;
 }
}

header ("Location: order.index.php?message=".$message."");