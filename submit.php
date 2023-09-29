<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'formData';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error array
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $storeName = $_POST['store_name'];
    $promoCode = $_POST['promo_code'];
    $fullName = $_POST['full_name'];
    $last4Digit = $_POST['last_4_digit'];

    // Validation for each field
    if (empty($storeName)) {
        $errors[] = "Store Name is required.";
    }

    if (empty($promoCode)) {
        $errors[] = "Promo Code is required.";
    }

    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    }

    if (empty($last4Digit)) {
        $errors[] = "Last 4 Digits of cellphone number is required.";
    }

    if (empty($errors)) {
        // Insert data into the database
        $sql = "INSERT INTO form_entries (store_name, promo_code, full_name, last_4_digit)
                VALUES ('$storeName', '$promoCode', '$fullName', '$last4Digit')";

        if ($conn->query($sql) === TRUE) {
            echo "Form data submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        *
        {
            font-size: 28px;
        }
    </style>
</head>
<body>
  
</body>
</html>
