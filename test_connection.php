<?php
// Simple connection test
echo "<h2>Testing Database Connection</h2>";

$host = 'localhost';
$dbname = 'tieg';
$user = 'root';
$password = '';

echo "Attempting to connect with:<br>";
echo "Host: $host<br>";
echo "Database: $dbname<br>";
echo "User: $user<br>";
echo "Password: " . (empty($password) ? "EMPTY" : "SET") . "<br><br>";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<span style='color: green;'>✓ Connection successful!</span><br>";

    // Test a simple query
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo "<br><strong>Tables in database:</strong><br>";
    if (empty($tables)) {
        echo "No tables found in database.";
    } else {
        foreach ($tables as $table) {
            echo "- $table<br>";
        }
    }
} catch (PDOException $e) {
    echo "<span style='color: red;'>✗ Connection failed: " . $e->getMessage() . "</span><br>";

    echo "<br><strong>Troubleshooting steps:</strong><br>";
    echo "1. Check if MySQL is running in XAMPP<br>";
    echo "2. Try connecting without specifying database<br>";
    echo "3. Check if 'tieg' database exists<br>";
}

// Test connection without database
echo "<br><hr><h3>Testing connection without database:</h3>";
try {
    $dsn_no_db = "mysql:host=$host;charset=utf8mb4";
    $pdo_no_db = new PDO($dsn_no_db, $user, $password);
    echo "<span style='color: green;'>✓ Basic MySQL connection works!</span><br>";

    // Check if database exists
    $stmt = $pdo_no_db->query("SHOW DATABASES");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo "<br><strong>Available databases:</strong><br>";
    foreach ($databases as $db) {
        echo "- $db";
        if ($db === 'tieg') {
            echo " <span style='color: green;'>← TARGET DATABASE</span>";
        }
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "<span style='color: red;'>✗ Basic connection failed: " . $e->getMessage() . "</span><br>";
}
