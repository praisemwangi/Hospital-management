<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="appointment.css">
        <title>Appointment</title>
</head>
<body>
    <?php include("navbar.php");?>
    <div class="appointment">
        <div class="container">
            <h2>My Appointment</h2>
            <form action="process_appointment.php" method="POST">
                
                <?php
                $sql="SELECT * from patients where patient_id=$user_id";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    $row=$result->fetch_assoc();

                }
                ?>
                <label for name>Your Name</label>
                <input type="text" name="name" value=<?php echo $row['Firstname'];?> readonly/>
                <label for phone>Phone number</label>
                <input type="text" name="phone" value=<?php echo $row['phone'];?> />
                <select name="speciality" id="speciality" required>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Orthopedics">Orthopedics</option>
            </select>

            <fieldset>
                <legend>Select doctor</legend>
                <label class="custom-tooltip">
                    <input type="radio" name="doctor" value="Dr Williams" title="Speciality:cardiology"/>Dr Williams
                    </label>

                    
                <label class="custom-tooltip">
                    <input type="radio" name="doctor" value="Dr David" title="Speciality:cardiology"/>Dr David
                    </label>

                    
                <label class="custom-tooltip">
                    <input type="radio" name="doctor" value="Dr Smith" title="Speciality:orthopedecs"/>Dr Smith
                    </label>

                   
                <label class="custom-tooltip">
                    <input type="radio" name="doctor" value="Dr Johnson" title="Speciality:orthopedecs"/>Dr  Johnson
                     </label>
            </fieldset>

            <label for date>Preferred date</label>
            <input type="date" name="appointment_date" id="appointment_date" />
            <label for time>Preferred time</label>
            <input type="time" name="appointment_time" id="appointment_time"/>
            <label for comments>Comments</label>
            <textarea name="comments" cols="4">

            </textarea>
            <input type="text" name="patient_id" id="patient_id" value=<?php echo $row['patient_id'];?> hidden/>
            <button type="submit" name="submit" value="submit">Submit appointment
            </button>


</form>
</div>
</div>
    
   

</body>
</html>