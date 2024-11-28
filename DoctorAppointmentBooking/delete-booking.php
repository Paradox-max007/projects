<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Styles for the message and loading spinner */
.message {
    font-size: 18px;
    text-align: center;
    margin-top: 20px;
}

.loading-spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #3498db;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 20px auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

    </style>
    <title>Delete Booking</title>
</head>
<body>

<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "appointment";

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check for errors in the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['name'])) {
    $recordId = $_GET['name'];

    $sql1 = "DELETE FROM bookings WHERE email = '$recordId'";
    
    if ($conn->query($sql1)  === TRUE) {
        

       echo " <div class='message'>Deleting record...</div>
    <div class='loading-spinner'></div>
    <script>
        // Simulate a delay for the delete operation (adjust the delay as needed)
const delay = 1000; // 2 seconds

setTimeout(() => {
    const message = document.querySelector('.message');
    const spinner = document.querySelector('.loading-spinner');

    message.textContent = 'Record deleted!';
    spinner.style.display = 'none';
}, delay);


            // Delayed reload after 5 seconds
            setTimeout(function() {
                history.back();
                location.reload();
            }, 1500);

    </script>";
      
       
    } else {
        echo "<script> alert('Error deleting record ' ) </script>";
    }

}

?>
</body>
</html>