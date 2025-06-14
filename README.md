<h1 style="color: #2c3e50; text-align: center;">Shopping Cart - WET Assignment</h1>

<div style="text-align: center; font-size: 1.2em; color: #34495e;">
    This is a simple shopping cart system built using HTML, CSS (Bootstrap), PHP, and MySQL. It provides a simple e-commerce platform where an admin can manage products and users can browse, add items to a cart, and view their selections.<br><br> It was assigned by Sir Gulsher Laghari.
<h2>Author</h2>
Name: Ahmed Mustafa<Br>
Roll No: 2K22/CSM/9
</div>

<h2 style="color: #2980b9;">Features</h2>

### <h3 style="color: #27ae60;">1. User Interface</h3>
<img src="https://github.com/AhmedShaikh0/shoppingcart_WET/blob/main/images/WET_1.png" alt="User Interface" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
<ul style="list-style-type: disc; padding-left: 20px; color: #7f8c8d;">
    <li>Users can view a list of available products fetched from the database.</li>
    <li>Responsive design using Bootstrap for a clean and mobile-friendly interface.</li>
    <li>Ability to select multiple products and add them to the cart with a single form submission.</li>
</ul>

### <h3 style="color: #27ae60;">2. Cart Functionality</h3>
<img src="https://github.com/AhmedShaikh0/shoppingcart_WET/blob/main/images/WET_2.png" alt="Cart Functionality" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
<ul style="list-style-type: disc; padding-left: 20px; color: #7f8c8d;">
    <li>Users can add selected products to their cart, with the cart updated on page reload.</li>
    <li>Real-time display of cart contents and total price on the main page.</li>
    <li>Option to view the full cart on a dedicated page.</li>
    <li>Ability to clear the cart from the cart page.</li>
</ul>
<img src="https://github.com/AhmedShaikh0/shoppingcart_WET/blob/main/images/WET_3.png" alt="Cart Clear Functionality" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">

### <h3 style="color: #27ae60;">3. Admin Login System</h3>
<img src="https://github.com/AhmedShaikh0/shoppingcart_WET/blob/main/images/WET_4.png" alt="Admin Login System" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
<ul style="list-style-type: disc; padding-left: 20px; color: #7f8c8d;">
    <li>Secure login for admin users with username and password authentication stored in a MySQL database.</li>
    <li>Passwords are hashed using MD5 (note: consider upgrading to a stronger hashing method like bcrypt for production use).</li>
    <li>Logout functionality to end the admin session.</li>
</ul>

### <h3 style="color: #27ae60;">4. Product Management</h3>
<img src="https://github.com/AhmedShaikh0/shoppingcart_WET/blob/main/images/WET_5.png" alt="Product Management" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
<ul style="list-style-type: disc; padding-left: 20px; color: #7f8c8d;">
    <li>Admin can add new products with names and prices via a form.</li>
    <li>Admin can delete existing products from the product list.</li>
    <li>Products are stored in a MySQL database and dynamically displayed in the admin panel.</li>
</ul>

<h3 style="color: #27ae60;">5. Database Integration</h3>
<ul style="list-style-type: disc; padding-left: 20px; color: #7f8c8d;">
    <li>Uses MySQL to store product details (id, name, price) and admin credentials (username, password).</li>
    <li>Session-based cart management to persist user selections across pages.</li>
</ul>

## <h2 style="color: #2980b9;">Installation</h2>

1. Import `shopping_WET.sql` to your phpmyadmin.

2. **Configure the Project**:
   Clone or copy the project files to your web server directory (e.g., `htdocs` in XAMPP or `www` in WAMP).

3. **Run the Application**:
   Start your PHP and MySQL servers (e.g., Apache in XAMPP).
   Access the application via your browser (e.g., `http://localhost/your_folder/index.php` for the user interface or `http://localhost/your_folder/admin.php` for admin login).
   Log in as an admin with the credentials you set up, then manage products or browse as a user.

<h2>Usage</h2>

- **Admin**:
  - Log in at `admin.php` with your admin credentials.
  - Add products by entering a name and price, then submit.
  - Delete products by clicking the "Delete" button next to each product and confirming.
  - Log out when finished.

- **User**:
  - Visit `index.php` to see available products.
  - Check the boxes next to the products you want, then click "Add Selected to Cart".
  - View the updated cart on the same page or visit `cart.php` for a detailed view.
  - Clear the cart from `cart.php` if needed.

<h2>Files</h2>

- `config.php`: Database connection configuration.
- `admin.php`: Admin login, product addition, and deletion interface.
- `index.php`: User interface to view products and manage the cart.
- `cart.php`: Dedicated page to view and clear the cart.

<h2>Contributing</h2>

Feel free to fork this repository and submit pull requests for improvements. Suggestions for enhancing security (e.g., upgrading password hashing) or adding features (e.g., product editing) are welcome.

<h2>License</h2>

This project is open-source. you can use it but also consider contributing back to the community.
