<?php
// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $carSelection = $_POST['car-selection'];
    $pickupDate = $_POST['pickup-date'];
    $returnDate = $_POST['return-date'];
    $gps = isset($_POST['gps']) ? 1 : 0;
    $childSeat = isset($_POST['child-seat']) ? 1 : 0;
    $insurance = isset($_POST['insurance']) ? 1 : 0;
    $termsAccepted = isset($_POST['terms']) ? 1 : 0;

    // Calculate rental duration in days
    $startDate = new DateTime($pickupDate);
    $endDate = new DateTime($returnDate);
    $interval = $startDate->diff($endDate);
    $duration = $interval->days;

    // Validate form fields
    if (empty($fullName) || empty($email) || empty($phone) || empty($carSelection) || empty($pickupDate) || empty($returnDate) || !$termsAccepted) {
        echo "Please fill in all required fields and accept the terms.";
        exit;
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO rentals (full_name, email, phone, car_selection, pickup_date, return_date, rental_duration, gps, child_seat, insurance, terms_accepted)
            VALUES ('$fullName', '$email', '$phone', '$carSelection', '$pickupDate', '$returnDate', '$duration', '$gps', '$childSeat', '$insurance', '$termsAccepted')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        echo "<h2>Rental Summary</h2>";
        echo "<p><strong>Full Name:</strong> $fullName</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Car Model:</strong> $carSelection</p>";
        echo "<p><strong>Pickup Date:</strong> $pickupDate</p>";
        echo "<p><strong>Return Date:</strong> $returnDate</p>";
        echo "<p><strong>Rental Duration:</strong> $duration days</p>";
        echo "<p><strong>THANK__YOU FOR BOOKING CAR VISIT AGIAN </strong></p>";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
