<?php
include 'C:/Users/Playtech/OneDrive/Desktop/UniServerZ/www/Assessment2php/config.php';

// Check for a GET request with an ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch booking details
    $query = $conn->prepare("SELECT * FROM bookings WHERE bookingID = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $booking = $result->fetch_assoc();
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $startDate = htmlspecialchars($_POST['startDate']);
    $endDate = htmlspecialchars($_POST['endDate']);
    // more fields can be added here

    // Update the database
    $updateQuery = $conn->prepare("UPDATE bookings SET startDate = ?, endDate = ? WHERE bookingID = ?");
    $updateQuery->bind_param("ssi", $startDate, $endDate, $id);
    $updateQuery->execute();

    if ($updateQuery->affected_rows > 0) {
        echo "Booking updated successfully.";
    } else {
        echo "Error updating booking.";
    }

    $updateQuery->close();
}

$conn->close();
?>

<html>
<head><title>Edit Booking</title></head>
<body>
    <h1>Edit Booking</h1>
    <?php if ($booking): ?>
        <form method="POST">
            Start Date: <input type="date" name="startDate" value="<?php echo $booking['startDate']; ?>"><br>
            End Date: <input type="date" name="endDate" value="<?php echo $booking['endDate']; ?>"><br>
            <!-- More fields can be added here -->
            <input type="submit" value="Update Booking">
        </form>
    <?php else: ?>
        <p>Booking not found.</p>
    <?php endif; ?>
    <a href="listBookings.php">Back to Bookings List</a>
    <a href="deleteBooking.php?id=<?php echo $id; ?>&confirm=yes">Delete Booking</a>
</body>
</html>