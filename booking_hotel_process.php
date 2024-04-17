<?php
session_start();
require_once("connection.php");

// Check if user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect user to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Retrieve hotel ID from the URL parameter
$hotelID = $_GET['hotel_id'];

// Query the database to fetch hotel details
$sql = "SELECT * FROM Hotels WHERE HotelID = $hotelID";
$result = $conn->query($sql);

// Check if hotel exists
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hotelName = $row["Name"];
    $location = $row["Location"];
    $pricePerNight = $row["PricePerNight"];
    $availableRooms = $row["AvailableRooms"];

    // Process booking when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numRooms = $_POST['num_rooms'];

        if ($numRooms <= $availableRooms) {
            $userID = $_SESSION['UserID'];
            $checkInDate = $_POST['check_in_date'];
            $checkOutDate = $_POST['check_out_date'];
            $totalPrice = $numRooms * $pricePerNight;
            $bookingDateTime = date('Y-m-d H:i:s');

            $insertSql = "INSERT INTO HotelBookings (UserID, HotelID, CheckInDate, CheckOutDate, TotalPrice, BookingDateTime)
                          VALUES ($userID, $hotelID, '$checkInDate', '$checkOutDate', $totalPrice, '$bookingDateTime')";
            if ($conn->query($insertSql) === TRUE) {
                $updateSql = "UPDATE Hotels SET AvailableRooms = AvailableRooms - $numRooms WHERE HotelID = $hotelID";
                if ($conn->query($updateSql) === TRUE) {
                    header("Location: booked.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Error updating available rooms: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error inserting booking: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Not enough available rooms!</div>";
        }
    }

    // Display hotel details and booking form
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Hotel Booking</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class='container'>
    <h2>Hotel Details</h2>
    <p><strong>Name:</strong> $hotelName</p>
    <p><strong>Location:</strong> $location</p>
    <p><strong>Available Rooms:</strong> $availableRooms</p>
    <p><strong>Price per Night:</strong> $pricePerNight</p>

    <h2>Book Your Stay</h2>
    <form method='post' action=''>
        <input type='hidden' name='hotel_id' value='$hotelID'>
        <div class='form-group'>
            <label for='check_in_date'>Check-in Date:</label>
            <input type='date' class='form-control' id='check_in_date' name='check_in_date' required>
        </div>
        <div class='form-group'>
            <label for='check_out_date'>Check-out Date:</label>
            <input type='date' class='form-control' id='check_out_date' name='check_out_date' required>
        </div>
        <div class='form-group'>
            <label for='num_rooms'>Number of Rooms:</label>
            <input type='number' class='form-control' id='num_rooms' name='num_rooms' min='1' max='$availableRooms' required>
        </div>
        <button type='submit' class='btn btn-primary'>Confirm Booking</button>
    </form>
</div>

</body>
</html>";

} else {
    // Hotel not found
    echo "<div class='alert alert-warning'>Hotel not found.</div>";
}

$conn->close();
?>
