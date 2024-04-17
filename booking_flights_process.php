<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    session_start();

if (!isset($_SESSION['UserID'])) {
    // Redirect user to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}
    require_once("connection.php");
    $flightID = $_GET['flight_id'];
    $sql = "SELECT * FROM Flights WHERE FlightID = $flightID";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $departureCity = $row["DepartureCity"];
        $destinationCity = $row["DestinationCity"];
        $price = $row["Price"];
        $availableSeats = $row["AvailableSeats"];

        echo "<h2>Flight Details</h2>";
        echo "<p><strong>Flight from:</strong> $departureCity</p>";
        echo "<p><strong>Flight to:</strong> $destinationCity</p>";
        echo "<p><strong>Available Seats:</strong> $availableSeats</p>";
        echo "<p><strong>Price:</strong> $price</p>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numTickets = $_POST['num_tickets'];
            $totalPrice = $numTickets * $price;
            $bookingDateTime = date('Y-m-d H:i:s');

            if(isset($_SESSION['UserID'])) {
                $userID = $_SESSION['UserID'];

                if ($numTickets <= $availableSeats) {
                    $insertSql = "INSERT INTO FlightBookings (UserID, FlightID, NumberOfTickets, TotalPrice, BookingDateTime)
                              VALUES ($userID, $flightID, $numTickets, $totalPrice, '$bookingDateTime')";
                    if ($conn->query($insertSql) === TRUE) {
                        $updateSql = "UPDATE Flights SET AvailableSeats = AvailableSeats - $numTickets WHERE FlightID = $flightID";
                        if ($conn->query($updateSql) === TRUE) {
                            header("Location: booked.php");
                            exit();
                        } else {
                            echo "<div class='alert alert-danger'>Error updating available seats: " . $conn->error . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Error inserting booking: " . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>Not enough available seats!</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error: User session not found.</div>";
            }
        }

        echo "<h2>Book Your Tickets</h2>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='flight_id' value='$flightID'>";
        echo "<div class='form-group'>";
        echo "<label for='num_tickets'>Number of Tickets:</label>";
        echo "<input type='number' class='form-control' id='num_tickets' name='num_tickets' min='1' max='$availableSeats' required>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Confirm Booking</button>";
        echo "</form>";
    } else {
        echo "<div class='alert alert-warning'>Flight not found.</div>";
    }

    $conn->close();
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
