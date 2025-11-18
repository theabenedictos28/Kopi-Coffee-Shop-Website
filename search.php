<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "kopi_shop");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the search query is set
if(isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Perform the search query
    $search_result = $mysqli->query("SELECT * FROM menu WHERE name LIKE '%$search_query%'");

    // Display search results
    while ($row = $search_result->fetch_assoc()) {
        // Display search results in desired format
        echo "<div class='search-result'>";
        echo "<h3>{$row['name']}</h3>";
        echo "<p>{$row['description']}</p>";
        echo "</div>";
    }
} else {
    // If no search query is set, display a message or perform a default action
    echo "No search query provided.";
}
?>
