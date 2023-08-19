<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $contactNumber = $_POST["mobile"];
    $email = $_POST["email"];
    $whatsapp_num = $_POST["whatsapp_no"];
    $query = $_POST["query"];


    // Validate and sanitize the form data (perform necessary checks)

    

    // Connect to the database
    $servername = "localhost"; // Replace with your MySQL server name
    $username = "u339725174_emaar"; // Replace with your MySQL username
    $password = "Emaargroup@123"; // Replace with your MySQL password
    $dbname = "u339725174_emaargroup"; // Replace with your MySQL database name

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Handle database connection error
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    // Prepare and execute the database query
    try {
        $stmt = $conn->prepare("INSERT INTO urbanoasis2 (name, contact_number,email, whatsapp_number, query) VALUES (:name, :contactNumber,:email,:whatsapp_num, :query)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':whatsapp_num', $whatsapp_num);
        $stmt->bindParam(':query', $query);
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle database query error
        echo "Error: " . $e->getMessage();
        exit;
    }


    // Close the database connection
    $conn = null;

header("Location: success.html");
    exit;
}

