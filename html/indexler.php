<?php
$servername = "mysql:3306";
$username = "app";
$password = "app";
/*
try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
		echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}*/

// Connection 
try {
    echo'hi';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo'bağlandı';
} catch (PDOException $e) {
    die("Veritabanına bağlanılamadı: " . $e->getMessage());
} 

?>