<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Assuming login.php is your login page
    exit;
}

// Database connection
$mysqli = new mysqli("localhost", "root", "", "kopi_shop");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Logout functionality
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Fetch menu items
$sql = "SELECT * FROM menu";
$result = $mysqli->query($sql);
?>

<div class="menu-items">
            <h2>Menu Items</h2>
            <table>
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td colspan='1'>" . $row['description'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td><img src='" . $row['image'] . "' width='50' height='50'></td>";
                        echo "<td>
                                <form method='post'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <input type='submit' name='edit' value='Edit'>
                                    <input type='submit' name='delete' value='Delete' onclick='return confirm(\"Are you sure you want to delete this menu item?\");'>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No menu items found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>