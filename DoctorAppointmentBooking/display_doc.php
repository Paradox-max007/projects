<!DOCTYPE html>
<html>
<head>
    <title>Doctor Details</title>
    <link rel="stylesheet" type="text/css" href="disp-doc.css">
    <style>
        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .button:hover {
            background-color: #45a049;
        }
        h1{
            text-align: center;
            color: white;
        }
        table{
            text-align: center;
        }
        .img {
            width: 50px; /* Adjust the width as needed */
            height: auto; /* To maintain aspect ratio */
            position: absolute; /* Positioning */
            top: 10px; 
            left: 30px; 
        }
        /* Style for profile images (small circle) */
.profile-image img {
    width: 100%;
    height: 200px;
    border-radius: 3%;
    border: 3px solid #fff;
    margin: 0 auto 10px;
    display: block;
}
    </style>
</head>
<body>
    <a href="index.php"><img src="home-img.jpg" alt="HOME" class="img"></a>
<h1><u>Doctors</u></h2>




<?php
session_start();
// Database connection parameters
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

// Query to retrieve profiles and their details
$query = "SELECT profile_images.id, profile_images.file_data, doc_reg.docname, doc_reg.email, doc_reg.mobile, qualification.specialisation
          FROM profile_images
          INNER JOIN doc_reg ON profile_images.id = doc_reg.user_id 
          INNER JOIN qualification ON profile_images.id = qualification.user_id";
$result = $conn->query($query);


// ... (previous PHP code)

if ($result->num_rows > 0) {
    echo '<div class="profile-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="profile-tile">';
        echo '<div class="profile-image">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['file_data']) . '" alt="' . $row['docname'] . '">';
        echo '</div>';
        echo '<div class="profile-details">';

        echo '<h2>'.'Dr.' . $row['docname'] . '</h2><br>';
        
        
        echo '<b>Specialisation: ' . $row['specialisation'] . '</b><br><br>';
        
        echo '<div>';
        if (isset($_SESSION['name'])) {
            echo '<b>Email: ' . $row['email'] . '</b><br><br>';
        echo '<b>Mobile: ' . $row['mobile'] . '</b><br><br>';
        ?>
        <a href="booking.php?id=<?= $row['id']; ?>" class="button">Book Appointment</a>
        <?php
    }
    else{
        echo "<b><a href='login-main.php' class='button'> Login to Book Appointment</a></b>";
    }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<div class="profile-container">';
    echo '<div class="profile-tile">';
    echo '<h2>No Doctors Found</h2>';
    echo '</div>';
    echo '</div>';
}


// ... (remaining PHP code)
?>

</body>
</html>
