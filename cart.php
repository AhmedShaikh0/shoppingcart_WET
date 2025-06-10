<!-- WET Assignment 
Name: Ahmed Mustafa
Roll No: 2K22/CSM/9
Teacher: Sir Gulsher Laghari -->

<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit();
}

$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .item-list { list-style-type: none; padding-left: 0; }
    .item-list li { margin: 10px 0; }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Shopping Cart</h1>
    <div class="card cart-section">
      <div class="card-body">
        <h2 class="card-title">Cart Items</h2>
        <ul class="list-group">
          <?php
          if (!empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $item) {
                  echo "<li class='list-group-item'>" . htmlspecialchars($item['name']) . " - \${$item['price']}</li>";
              }
          } else {
              echo "<li class='list-group-item'>Cart is empty</li>";
          }
          ?>
        </ul>
        <h4 class="mt-3">Total: $<span><?php echo number_format($total, 2); ?></span></h4>
        <form method="post" action="cart.php" class="mt-3">
          <button type="submit" name="clear" class="btn btn-danger">Clear Cart</button>
        </form>
        <a href="index.php" class="btn btn-primary mt-3">Continue Shopping</a>
      </div>
    </div>
  </div>
</body>
</html>