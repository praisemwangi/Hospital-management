<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="dashboard.css">
        <title>Delete Appointment</title>
</head>
<body>
    <?php include("navbar.php");?>
    <div class="appointment">
        <div class="container">
            <h2>My Appointment</h2>
            <form action="delete_appointment.php" method="post">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
            <button type="button" onclick="deleteAppointment(<?php echo $appointment['id']; ?>)">Delete Appointment</button>
</form>

<script>
function deleteAppointment(id) {
  document.querySelector("form[action='delete_appointment.php']").submit();
}
</script>

<?php

// Connect to database
$conn = new mysqli($servername,$username,$password,$dbname);

// Get appointment ID from form
$patient_id = $_POST['patient_id'];

// Prepare DELETE query
$sql = "DELETE FROM appointments WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $appointmentId);

// Execute query and handle result
if ($stmt->execute()) {
  echo "Appointment deleted successfully!";
} else {
  echo "Error deleting appointment: " . $stmt->errorInfo()[2];
}

?>
</div>
</div>

</body>
</html>


            