<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashstyle.css">
    <title>User Dashboard</title>
</head>
<body>
    <?php include("navbar.php");?>
    
    <div class="dash">

<div class="container">
    <h2>My appointments</h2>
  <?php
  if($patient_id){
    $sql="SELECT appointments.*,patients.* from appointments left join patients on
    appointments.patient_id=patients.patient_id where patients.patient_id=$user_id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        echo "<table>";
        echo "<tr><th>Name</th>
        <th>Phone</th>
        <th>Speciality</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Time</th>
        <th>Comments</th>
        <th>Action</th></tr>";
    while($row=$result->fetch_assoc())
    {
  echo "<tr>";
  echo "<td>{$row["Firstname"]}</td>";
  echo "<td>{$row["phone"]}</td>";
  echo "<td>{$row["speciality"]}</td>";
  echo "<td>{$row["doctor"]}</td>";
  echo "<td>{$row["date"]}</td>";
  echo "<td>{$row["time"]}</td>";
  echo "<td>{$row["comments"]}</td>";
  echo "<td><span>  <a href='edit_appointment.php' class='btn btn-info btn-lg'>
  <span class='glyphicon glyphicon-edit'></span>
  <span>  <a href='delete_appointment.php' class='btn btn-info btn-lg'>
  <span class='glyphicon glyphicon-trash'></span>
  </td>"; 
  

                    
                    echo "</tr>";
    }    
    echo "</table>";
    }
    else{
        echo "No user records";
    }
  }
  else{
    echo "No session records";
  }
  $conn->close();

  ?>
        
</div>
</div>

</body>
</html>
