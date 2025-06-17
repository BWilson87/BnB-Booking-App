<?php
include 'C:/Users/Playtech/OneDrive/Desktop/UniServerZ/www/Assessment2php/config.php'; 
// Check if the booking ID is present
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Booking ID received: $id"; // This should show the ID if everything is correct
} else {
    echo "No ID provided"; // This shows if no ID is passed
}
    // Fetch the booking details to preview
    $query = "SELECT * FROM bookings WHERE bookingID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if ($stmt->error) {
        echo "Execution error: " . $stmt->error;
    }
    $result = $stmt->get_result();

    echo "<br>Rows fetched: " . $result->num_rows; // Debug output

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Booking ID: " . $row['bookingID'] . "<br>";
        echo "Customer ID: " . $row['customerID'] . "<br>";
        // Add more booking details here
        echo "<a href='deletebooking.php?id=" . $row["bookingID"] . "'>Delete</a>";
    } else {
        echo "Booking not found.";
    }

    $stmt->close();


// Check if deletion has been confirmed
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $query = "DELETE FROM bookings WHERE bookingID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Booking deleted successfully.";
    } else {
        echo "Error deleting booking.";
    }

    $stmt->close();
}

$conn->close();
?>

<a href="listBookings.php">Back to Bookings List</a>