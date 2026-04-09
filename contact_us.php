<?php

// DB connection
$conn = mysqli_connect("127.0.0.1","root","","tour");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

// Check form submit
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Get form data safely
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $trip_package = $_POST['trip_package'] ?? '';
    $message = $_POST['message'] ?? '';

    // Insert query
    $sql = "INSERT INTO contact(Name,Email,Phone,trip_package,Message)
            VALUES ('$name','$email','$phone','$trip_package','$message')";

    // Execute query
    if(mysqli_query($conn,$sql)){
        echo "<script>
        alert('We will contact you soon');
        window.location.href='index.html';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);

?>