<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "kopi_shop");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Assuming login.php is your login page
    exit;
}

// Fetch hot coffees
$hot_coffees = $mysqli->query("SELECT * FROM menu WHERE category='hot'");

// Fetch cold coffees
$cold_coffees = $mysqli->query("SELECT * FROM menu WHERE category='cold'");
// Fetch pastries
$pastries = $mysqli->query("SELECT * FROM menu WHERE category='pastry'");
// Fetch salads
$salad = $mysqli->query("SELECT * FROM menu WHERE category='salad'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="admin1.css">

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
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Menu</span>
				</a>
			</li>
			<li>
				<a href="edit.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
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
					<i class='bx bxs-log-out-circle' ></i>
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
					<h1>Menu</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Kopi</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<span class="text">
						<h1 style="padding-bottom: 30px; font-size: 50px;">Drinks</h1>
						<div class="container-fluid pt-5">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
										<h1 class="mb-5">Hot Coffee</h1>
										<?php while ($row = $hot_coffees->fetch_assoc()): ?>
										<div class="row align-items-center mb-5">
											<div class="col-4 col-sm-3 position-relative">
												<img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
											</div>
											<div class="col-8 col-sm-9">
												<h4><?php echo $row['name']; ?></h4>
											</div>
											
										</div>
										<?php endwhile; ?>
									</div>
									<div class="col-lg-6">
										<h1 class="mb-5">Cold Coffee</h1>
										<?php while ($row = $cold_coffees->fetch_assoc()): ?>
										<div class="row align-items-center mb-5">
											<div class="col-4 col-sm-3 position-relative">
												<img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
											</div>
											<div class="col-8 col-sm-9">
												<h4><?php echo $row['name']; ?></h4>
											</div>
											
										</div>
										<?php endwhile; ?>
									</div>
									<div class="col-lg-6">
							<h1 class="mb-5">Pastry</h1>
							<?php while ($row = $pastries->fetch_assoc()): ?>
							<div class="row align-items-center mb-5">
								<div class="col-4 col-sm-3 position-relative">
									<img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
								</div>
								<div class="col-8 col-sm-9">
									<h4><?php echo $row['name']; ?></h4>
								</div>
								
							</div>
							<?php endwhile; ?>
						</div>
						<div class="col-lg-6">
							<h1 class="mb-5">Salad</h1>
							<?php while ($row = $salad->fetch_assoc()): ?>
							<div class="row align-items-center mb-5">
								<div class="col-4 col-sm-3 position-relative">
									<img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
								</div>
								<div class="col-8 col-sm-9">
									<h4><?php echo $row['name']; ?></h4>
								</div>
								
							</div>
							<?php endwhile; ?>
						</div>

								</div>
							</div>
						</div>
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
