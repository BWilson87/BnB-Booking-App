<?php
include 'config.php'; // Includes your database configuration

// Fetch rooms to populate the dropdown
$query = "SELECT roomID, roomname FROM room";
$rooms = $conn->query($query);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomId = $_POST['roomId'];
    $customerId = $_POST['customerId']; // This needs to be fetched from session or form
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $numberOfGuests = $_POST['numberOfGuests'];
    $totalCost = calculateCost($startDate, $endDate, $roomId); // Implement this function based on your pricing logic

    // Insert the booking into the database
    $insertQuery = $conn->prepare("INSERT INTO bookings (roomID, customerID, startDate, endDate, numberOfGuests, totalCost) VALUES (?, ?, ?, ?, ?, ?)");
    $insertQuery->bind_param("iissii", $roomId, $customerId, $startDate, $endDate, $numberOfGuests, $totalCost);
    $insertQuery->execute();

    if ($insertQuery->affected_rows > 0) {
        echo "Booking successfully created.";
    } else {
        echo "Error creating booking.";
    }
    $insertQuery->close();
}

$conn->close();
?>

<!-- HTML Form for creating bookings -->
<html>
<head><title>Make a Booking</title></head>
<body>
    <h1>Make a Booking</h1>
    <form method="POST">
        <select name="roomId">
            <?php while ($room = $rooms->fetch_assoc()): ?>
                <option value="<?php echo $room['roomID']; ?>"><?php echo $room['roomname']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="date" name="startDate" required>
        <input type="date" name="endDate" required>
        <input type="number" name="numberOfGuests" min="1" required>
        <input type="submit" value="Create Booking">
    </form>
</body>
</html>