<!DOCTYPE HTML>
<html>
<head>
    <title>View Booking</title>
</head>
<body>

<?php
include 'C:/Users/Playtech/OneDrive/Desktop/UniServerZ/www/Assessment2php/config.php';

// Check for a valid booking ID in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute a query to retrieve the booking
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE bookingID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Booking ID: " . $row["bookingID"]. "<br>";
        echo "Customer ID: " . $row["customerID"]. "<br>";
        echo "Room ID: " . $row["roomID"]. "<br>";
        echo "Start Date: " . $row["startDate"]. "<br>";
        echo "End Date: " . $row["endDate"]. "<br>";
        // Add more fields if necessary
    } else {
        echo "No booking found with ID $id";
    }

    $stmt->close();
} else {
    echo "Invalid ID.";
}

$conn->close();
?>

<a href="listbookings.php">Back to Booking List</a>

</body>
</html>