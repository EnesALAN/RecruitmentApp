
	
<?php
    // This username password and port information changed on Server
    $host="localhost";
    $username="root";
    $password="1995";
    $dbname="candidatedb";
    $port="3307";

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo 'PDO Exception: ' . $e->getMessage();
        exit();
    }
?>