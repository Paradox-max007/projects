<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'appointment';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['department'])) {
    $department = $_GET['department'];
    
    $sql = "SELECT profile_images.id,profile_images.file_data, doc_reg.docname, doc_reg.email, doc_reg.mobile, qualification.specialisation,doc_reg.place
          FROM profile_images
          INNER JOIN doc_reg ON profile_images.id = doc_reg.user_id 
          INNER JOIN qualification ON profile_images.id = qualification.user_id 
          WHERE qualification.specialisation='$department'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<div class="doctor-tile">';
            echo '<div class="profile-image">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['file_data']) . '" alt="' . $row['docname'] . '">';
            echo '</div>';
            echo '<div class="details">';
            echo '<h3>Doctor Name: ' . $row['docname'] . '</h3>';
            echo '<p>Specialisation: ' . $row['specialisation'] . '</p>';
            echo '<p>Place: ' . $row['place'] . '</p>';
            if (isset($_SESSION['name'])) {
                echo '<p>Contact: ' . $row['mobile'] . '</p>';
                echo '<p>Email: ' . $row['email'] . '</p>';
            ?>

            <a href="booking.php?id=<?= $row['id']; ?>" class="button">Book Appointment</a>
            <?php
            }
            else{
                echo "<b><a href='login-main.php' class='button'> Login to Book Appointment</a></b>";
            }
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No doctors found in ' . $department;
    }
} else {
    echo 'Department not specified';
}
?>
