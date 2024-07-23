<?php
//creating connection to database
session_start();
include('connection.php');
$errors=[];
if($_SERVER['REQUEST_METHOD']="POST")

{
    function sanitizeInput($data)
    {
        return htmlspecialchars(trim($data));
    }
    //DECLARE VARIABLES
    $email=sanitizeInput($_POST["login_email"]);
    $password=sanitizeInput($_POST["login_password"]);

    //select,prepare and bind
    $sql="SELECT patient_id,password from patients where email=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        //create session
        $_SESSION['loggedin']=true;
        $_SESSION['user_id']=$row['patient_id'];
        header("location:dashboard.php");

    }
    $stmt->close();
}
$conn->close();

?>