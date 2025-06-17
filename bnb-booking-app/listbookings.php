<?php
include 'C:/Users/Playtech/OneDrive/Desktop/UniServerZ/www/Assessment2php/config.php'; // Contains your database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Booking ID: " . $row["bookingID"]. " - Customer ID: " . $row["customerID"]. " - Room ID: " . $row["roomID"] . " - Start Date: " . $row["startDate"]. " - End Date: " . $row["endDate"]. " <a href='viewbooking.php?id=".$row["bookingID"]."'>View</a> <a href='editbooking.php?id=".$row["bookingID"]."'>Edit</a> <a href='deletebooking.php?id=".$row["bookingID"]."'>Delete</a><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>