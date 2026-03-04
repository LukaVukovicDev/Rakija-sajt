<?php
require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";


if(!$user->is_logged()){
  header("Location: login.php");
  exit();

}

$user_id = $_SESSION['user_id'];

$order = new Order();

$orders = $order->get_orders();


?>

<table class="table table-striped" style="position: relative; 
  top: 100px; 
  left:20px;
  ">
<thead>
<tr>
  <th scope="col">Order ID</th>
  <th scope="col">Product Name</th>
  <th scope="col">Quantity</th>
  <th scope="col">Price</th>
  <th scope="col">Size</th>
  <th scope="col">Image</th>
  <th scope="col">Delivery Address</th>
  <th scope="col">Order Date</th>

</tr>

</thead>
<tbody>
<?php foreach($orders as $order) : ?>
<tr>
    <td><?php echo htmlspecialchars($order['order_id']); ?></td>
    <td><?php echo htmlspecialchars($order['name']); ?></td>
    <td><?php echo htmlspecialchars($order['quantity']); ?></td>
    <td><?php echo htmlspecialchars($order['price']); ?></td>
    <td><?php echo htmlspecialchars($order['size']); ?></td>
    <td><img src="<?php echo htmlspecialchars($order['image']); ?>" height="50"></td>
    <td><?php echo htmlspecialchars($order['delivery_address']); ?></td>
    <td><?php echo htmlspecialchars($order['created_at']); ?></td>

</tr>
<?php endforeach; ?>
</tbody>

</table>


<?php require_once "inc/footer.php"; ?>

