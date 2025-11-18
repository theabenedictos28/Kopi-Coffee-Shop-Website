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

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="edit.css">

	<title>KOPI Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">KOPI Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="">
				<a href="admin1.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Menu</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Edit Menu</span>
				</a>
			</li>
            <li>
				<a href="add.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Add Product</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="search.php" method="GET">
				<div class="form-input">
					<input type="search" name="query" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
                <div class="left">
					<h1>Edit Menu</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Kopi</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Edit Menu</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<span class="text">
						<h1 style="padding-bottom: 30px; font-size: 50px;">Menu Items</h1>
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
                                            <form method='post' class='add-menu'>
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
					</span>
				</li>
			</ul>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="admin.js"></script>
</body>
</html>
