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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['items'])) {
    $selected_items = $_POST['items'];
    if (!empty($selected_items) && is_array($selected_items)) {
        $stmt = $conn->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($selected_items as $item_id) {
            foreach ($products as $product) {
                if ($product['id'] == $item_id) {
                    $_SESSION['cart'][] = ['id' => $product['id'], 'name' => $product['name'], 'price' => $product['price']];
                    break;
                }
            }
        }
    }
    header("Location: index.php");
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
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .item-card { margin: 10px; }
    .cart-section { margin-top: 20px; }
    .multi-add { margin-top: 10px; }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Shopping Cart</h1>
    <form method="post" action="index.php">
      <div class="row" id="items">
        <?php
        $stmt = $conn->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($products)) {
            echo "<p class='text-warning'>No products available. Please add products via admin.php.</p>";
        }
        foreach ($products as $product):
        ?>
          <div class="col-md-4 item-card">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?> - $<?php echo htmlspecialchars($product['price']); ?></h5>
                <div class="form-check">
                  <input type="checkbox" name="items[]" value="<?php echo $product['id']; ?>" class="form-check-input">
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="multi-add">
        <button type="submit" class="btn btn-primary">Add Selected to Cart</button>
      </div>
    </form>
    <div class="cart-section">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Cart</h2>
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
          <a href="cart.php" class="btn btn-success mt-3">View Full Cart</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>