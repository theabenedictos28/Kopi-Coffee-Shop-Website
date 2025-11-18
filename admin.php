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

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle add, edit, delete actions as before...
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

// Database connection
$mysqli = new mysqli("localhost", "root", "", "kopi_shop");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['add'])) {
        // Handle add action
        if(isset($_POST['category'])) {
            $category = $_POST['category'];
        } else {
            echo "Please provide details"; // Display error message if category is not selected
            exit; // Stop further execution
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Check if admin has provided all details
        if(empty($category) || empty($name) || empty($description) || empty($price) || empty($_FILES["image"]["name"])) {
            echo "Please enter all details."; // Display message to admin
        } else {
            // Handle image upload
            $targetDirectory = "img/"; // Directory where images will be stored
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]); // Get the target file path
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Get the image file type
            
            // Upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                //for special characters
                $category = $mysqli->real_escape_string($_POST['category']);
                $name = $mysqli->real_escape_string($_POST['name']);
                $description = $mysqli->real_escape_string($_POST['description']);
                $price = $mysqli->real_escape_string($_POST['price']);
                // Insert data into database
                $sql = "INSERT INTO menu (category, name, description, price, image) VALUES ('$category', '$name', '$description', '$price', '$targetFile')";
                if ($mysqli->query($sql) === TRUE) {
                    echo "New item added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } elseif(isset($_POST['edit'])) {
        // Handle edit action
        $id = $_POST['id'];
        // Redirect to edit page with the ID
        header("Location: edit_menu.php?id=$id");
        exit();
    } elseif(isset($_POST['delete'])) {
        // Handle delete action
        $id = $_POST['id'];
        // Delete the menu item from database
        $sql = "DELETE FROM menu WHERE id = '$id'";
        if ($mysqli->query($sql) === TRUE) {
            echo "Menu item deleted successfully";
        } else {
            echo "Error deleting menu item: " . $mysqli->error;
        }
    }
}

// Fetch menu items
$sql = "SELECT * FROM menu";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/add.css" rel="stylesheet">
    <title>Kopi Admin</title>
    <style>

    .radio-group {
    display: flex;
    flex-direction: row;
}
    .radio-group label {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Add logout button -->
        <form method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
        <div class="add-menu">
            <h2>Add New Menu Item</h2>
            <form method="post" enctype="multipart/form-data">
                <label for="category">Category:</label>
                <div class="radio-group">
                    <input type="radio" id="hot" name="category" value="Hot" required>
                    <label for="hot">Hot</label>

                    <input type="radio" id="cold" name="category" value="Cold" required>
                    <label for="cold">Cold</label>

                    <input type="radio" id="pastry" name="category" value="Pastry" required>
                    <label for="pastry">Pastry</label> 
                    
                    <input type="radio" id="salad" name="category" value="Salad" required>
                    <label for="salad">Salad</label>
                </div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea><br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required><br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required><br>
                <input type="submit" name="add" value="Submit">
            </form>
        </div>

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
</body>
</html>
