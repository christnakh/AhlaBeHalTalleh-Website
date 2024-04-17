Create database if not EXISTS ahla;
use ahla;


CREATE TABLE if NOT EXISTS Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL
);


CREATE TABLE IF NO EXISTS Flights (
    FlightID INT PRIMARY KEY AUTO_INCREMENT,
    DepartureCity VARCHAR(100) NOT NULL,
    DestinationCity VARCHAR(100) NOT NULL,
    DepartureDateTime DATETIME NOT NULL,
    ArrivalDateTime DATETIME NOT NULL,
    AvailableSeats INT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL
);


CREATE TABLE IF NOT EXISTS Hotels (
    HotelID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Location VARCHAR(100) NOT NULL,
    Description TEXT,
    PricePerNight DECIMAL(10, 2) NOT NULL,
    TotalRooms INT NOT NULL,
    AvailableRooms INT NOT NULL
);


CREATE TABLE IF NOT EXISTS FlightBookings (
    BookingID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    FlightID INT,
    NumberOfTickets INT NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    BookingDateTime DATETIME NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (FlightID) REFERENCES Flights(FlightID)
);


CREATE TABLE IF NOT EXISTS HotelBookings (
    BookingID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    HotelID INT,
    CheckInDate DATE NOT NULL,
    CheckOutDate DATE NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    BookingDateTime DATETIME NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (HotelID) REFERENCES Hotels(HotelID)
);



INSERT INTO Hotels (Name, Location, Description, PricePerNight, TotalRooms, AvailableRooms) VALUES
('Hotel A', 'City A', 'Luxury hotel in the heart of City A', 150.00, 100, 100),
('Hotel B', 'City B', 'Boutique hotel with a view of the ocean', 200.00, 50, 50),
('Hotel C', 'City C', 'Cozy hotel nestled in the mountains', 120.00, 80, 80),
('Hotel D', 'City D', 'Modern hotel near the business district', 180.00, 120, 120),
('Hotel E', 'City E', 'Historic hotel with elegant architecture', 250.00, 70, 70),
('Hotel F', 'City F', 'Family-friendly hotel with recreational facilities', 170.00, 90, 90),
('Hotel G', 'City G', 'Charming hotel with a garden courtyard', 190.00, 60, 60),
('Hotel H', 'City H', 'Sleek and stylish hotel for the urban traveler', 220.00, 110, 110),
('Hotel I', 'City I', 'Secluded resort with private beach access', 300.00, 40, 40),
('Hotel J', 'City J', 'Rustic lodge surrounded by nature trails', 140.00, 85, 85);


INSERT INTO HotelBookings (UserID, HotelID, CheckInDate, CheckOutDate, TotalPrice, BookingDateTime) VALUES
(1, 1, '2024-04-20', '2024-04-25', 750.00, '2024-04-17 09:30:00'),
(2, 3, '2024-05-10', '2024-05-15', 600.00, '2024-04-17 10:15:00'),
(3, 5, '2024-06-02', '2024-06-07', 1250.00, '2024-04-17 11:00:00'),
(4, 2, '2024-07-15', '2024-07-20', 1000.00, '2024-04-17 11:45:00'),
(5, 4, '2024-08-08', '2024-08-12', 720.00, '2024-04-17 12:30:00'),
(6, 6, '2024-09-18', '2024-09-23', 850.00, '2024-04-17 13:15:00'),
(7, 8, '2024-10-05', '2024-10-10', 1100.00, '2024-04-17 14:00:00'),
(8, 10, '2024-11-12', '2024-11-17', 700.00, '2024-04-17 14:45:00'),
(9, 7, '2024-12-20', '2024-12-25', 1140.00, '2024-04-17 15:30:00'),
(10, 9, '2025-01-08', '2025-01-13', 1500.00, '2024-04-17 16:15:00');


INSERT INTO Users (Username, Email, Password) VALUES
('user1', 'user1@example.com', 'password1'),
('user2', 'user2@example.com', 'password2'),
('user3', 'user3@example.com', 'password3'),
('user4', 'user4@example.com', 'password4'),
('user5', 'user5@example.com', 'password5'),
('user6', 'user6@example.com', 'password6'),
('user7', 'user7@example.com', 'password7'),
('user8', 'user8@example.com', 'password8'),
('user9', 'user9@example.com', 'password9'),
('user10', 'user10@example.com', 'password10');
