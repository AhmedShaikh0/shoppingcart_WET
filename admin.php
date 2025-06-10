<!-- WET Assignment 
Name: Ahmed Mustafa
Roll No: 2K22/CSM/9
Teacher: Sir Gulsher Laghari -->

<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_uname']) && isset($_POST['login_pass'])) {
        include 'config.php';

        $uname = $_POST['login_uname'];
        $pass = md5($_POST['login_pass']); // Hash the input password with MD5

        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_uname = :uname LIMIT 1");
        $stmt->execute([':uname' => $uname]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && $pass === $admin['admin_pass']) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_uname'] = $admin['admin_uname'];
        } else {
            $login_error = "Invalid username or password!";
        }
    }
    if (!isset($_SESSION['admin_logged_in'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Admin Login</h1>
    <?php if (isset($login_error)) echo "<p class='text-danger'>$login_error</p>"; ?>
    <form method="post" action="admin.php" class="w-50 mx-auto">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="login_uname" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="login_pass" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>
</html>
<?php
        exit();
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['price'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
    $stmt->execute(['name' => $name, 'price' => $price]);
    echo "<p class='text-success mt-3'>Product added successfully!</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
    $stmt->execute([':id' => $delete_id]);
    echo "<p class='text-success mt-3'>Product deleted successfully!</p>";
}

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Add Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Admin Panel - <?php echo htmlspecialchars($_SESSION['admin_uname']); ?></h1>
    <form method="post" action="admin.php" class="w-50 mx-auto">
      <input type="hidden" name="logout" value="1">
      <button type="submit" class="btn btn-danger mb-4">Logout</button>
    </form>
    <form method="post" action="admin.php" class="w-50 mx-auto">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Add Product</button>
    </form>

    <h2 class="mt-4">Current Products</h2>
    <table class="table mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
          <tr>
            <td><?php echo htmlspecialchars($product['id']); ?></td>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td>
              <form method="post" action="admin.php" style="display:inline;">
                <input type="hidden" name="delete_id" value="<?php echo $product['id']; ?>">
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>