<?php
require_once("connection.php");

session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: login.php");
    exit();
}
$userID = $_SESSION['UserID'];

$flightBookingsQuery = "SELECT * FROM FlightBookings WHERE UserID = $userID";
$flightBookingsResult = $conn->query($flightBookingsQuery);

$hotelBookingsQuery = "SELECT * FROM HotelBookings WHERE UserID = $userID";
$hotelBookingsResult = $conn->query($hotelBookingsQuery);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bookings</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>User Bookings</h2>
        <h3>Flight Bookings</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Flight ID</th>
                        <th>Number of Tickets</th>
                        <th>Total Price</th>
                        <th>Booking Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($flightBookingsResult->num_rows > 0) {
                        while ($row = $flightBookingsResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['BookingID']."</td>";
                            echo "<td>".$row['FlightID']."</td>";
                            echo "<td>".$row['NumberOfTickets']."</td>";
                            echo "<td>".$row['TotalPrice']."</td>";
                            echo "<td>".$row['BookingDateTime']."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No flight bookings found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h3>Hotel Bookings</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Hotel ID</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Total Price</th>
                        <th>Booking Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($hotelBookingsResult->num_rows > 0) {
                        while ($row = $hotelBookingsResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['BookingID']."</td>";
                            echo "<td>".$row['HotelID']."</td>";
                            echo "<td>".$row['CheckInDate']."</td>";
                            echo "<td>".$row['CheckOutDate']."</td>";
                            echo "<td>".$row['TotalPrice']."</td>";
                            echo "<td>".$row['BookingDateTime']."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hotel bookings found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
