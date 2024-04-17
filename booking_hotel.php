<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Hotels</title>
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
        .hotel-link {
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
        .hotel-link:hover {
            background-color: #f0f0f0;
            color: #555;
        }
        .no-rooms {
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
        <h2 class="mb-4">Available Hotels</h2>
        <?php
        // Database connection
        require_once("connection.php");

        // Retrieve hotels from the database
        $sql = "SELECT * FROM Hotels";
        $result = $conn->query($sql);

        // Check if there are hotels
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $hotelID = $row["HotelID"];
                $availableRooms = $row["AvailableRooms"];
                $roomText = ($availableRooms > 0) ? "Available Rooms: $availableRooms" : "No more rooms available";

                echo "<a href='booking_hotel_process.php?hotel_id=$hotelID' class='hotel-link'>";
                echo "<h5 class='mb-0'>{$row["Name"]}</h5>";
                echo "<p class='mb-0'><strong>Location:</strong> {$row["Location"]}</p>";
                echo "<p class='mb-0'>$roomText</p>";
                echo "<p class='mb-0'><strong>Price per Night:</strong> {$row["PricePerNight"]}</p>";
                echo "</a>";
            }
        } else {
            echo "<p>No hotels available.</p>";
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
