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

// Initialize variables
$category = $name = $description = $price = $image = "";

// If ID is provided in URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch menu item details
    $sql = "SELECT * FROM menu WHERE id = '$id'";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $category = $row['category'];
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
    } else {
        echo "Menu item not found";
    }
}

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image upload
    $targetDirectory = "img/"; // Directory where images will be stored
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]); // Get the target file path
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Get the image file type
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
        } else {
            // Upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                            // Update data in database
                $sql = "UPDATE menu SET category = '$category', name = '$name', description = '$description', price = '$price', image = '$targetFile' WHERE id = '$id'";
                if ($mysqli->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $mysqli->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/edit_menu.css" rel="stylesheet">
    <title>Edit Menu Item</title>
</head>
<body>
    <div class="container">
        <h2>Edit Menu Item</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="category">Category:</label>
            <div class="radio-group">
                <input type="radio" id="hot" name="category" value="hot" <?php if($category == 'hot') echo 'checked'; ?>>
                <label for="hot">Hot</label>
                <input type="radio" id="cold" name="category" value="cold" <?php if($category == 'cold') echo 'checked'; ?>>
                <label for="cold">Cold</label>
                <input type="radio" id="pastry" name="category" value="pastry" <?php if($category == 'pastry') echo 'checked'; ?>>
                <label for="cold">Pastry</label>
                <input type="radio" id="salad" name="category" value="salad" <?php if($category == 'salad') echo 'checked'; ?>>
                <label for="cold">Salad</label>
            </div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $description; ?></textarea><br>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
