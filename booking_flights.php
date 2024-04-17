<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Flights</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for additional styling */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .flight-link {
            display: block;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
        }
        .flight-link:hover {
            background-color: #f0f0f0;
            color: #555;
        }
        .no-seats {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Available Flights</h2>
        <?php
        // Database connection
        require_once("connection.php");

        // Retrieve flights from the database
        $sql = "SELECT * FROM Flights";
        $result = $conn->query($sql);

        // Check if there are flights
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $flightID = $row["FlightID"];
                $availableSeats = $row["AvailableSeats"];
                $seatText = ($availableSeats > 0) ? "Available Seats: $availableSeats" : "No more seats available";

                echo "<a href='booking_flights_process.php?flight_id=$flightID' class='flight-link'>";
                echo "<h5 class='mb-0'>Flight from <strong>{$row["DepartureCity"]}</strong> to <strong>{$row["DestinationCity"]}</strong></h5>";
                echo "<p class='mb-0'>Departure: {$row["DepartureDateTime"]}</p>";
                echo "<p class='mb-0'>Arrival: {$row["ArrivalDateTime"]}</p>";
                echo "<p class='mb-0'>$seatText</p>";
                echo "<p class='mb-0'>Price: {$row["Price"]}</p>";
                echo "</a>";
            }
        } else {
            echo "<p>No flights available.</p>";
        }

        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
