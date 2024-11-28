<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve records from the database
$sql = "SELECT * FROM doc_reg INNER JOIN qualification ON doc_reg.user_id = qualification.user_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
    /* Style the table */
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Style the delete buttons */
    .delete-button {

            margin-right: 10px; 
            background-color: #ff0000;
        color: #fff;
        border: none;
        padding: 7px 10px;
        cursor: pointer;
        text-decoration: none;
        }
    .delete-button:hover {
        background-color: #cc0000;
    }
    .update-button{
        margin-left: 10px; /* Adjust this value to increase or decrease the space */
            background-color: #4AB834;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        border-radius: 6px;
    }
    .update-button:hover {
        background-color: #3F8A30;
    }
    .booking-button{
        margin-left: 10px; /* Adjust this value to increase or decrease the space */
            background-color: deeppink;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        border-radius: 6px;
    }
    .booking-button:hover {
        background-color: indigo;
    }
    .button-container {
            display: inline-flex;  
            justify-content: space-between; 
        }

        .button {
            margin: 0px;
        }
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
        .heading {
            text-align: center;
        }
        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            
        }
        .button {
            padding-left: 70%;
        }

</style>

    <title>Display Records</title>
</head>
<body>
    <div class="heading">
        <h1><u>Doctors List</u></h1>
        <div class="button">
        <button onclick="window.location.href='doc-registration.php'">Add Doctor</button>
    </div>
</body>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Place</th>
            <th>Medical ID</th>
            <th>Specialisation</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['docname'] . "</td>";
                echo "<td>" . $row['place'] . "</td>";
                echo "<td>" . $row['medical_id'] . "</td>";
                echo "<td>" . $row['specialisation'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                echo '<div class="button-container">';
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='record_id' value='" . $row['user_id'] . "'>";
                echo "<button type='submit' onclick='deleteUser()' name='delete_record' class='delete-button'>Delete</button>";
                echo "</form>";
                ?>
                
                 <a href="update-doc.php?id=<?= $row['user_id']; ?>" class="update-button">Update</a>
                 <a href="view-booking.php?id=<?= $row['user_id']; ?>" class="booking-button">Bookings</a>
                 
                 <?php
            
                echo '</div>';
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo "<td>No records found.</td>";
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
        }

        ?>
</table>


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

if (isset($_POST['delete_record'])) {
    $recordId = $_POST['record_id'];

    $sql1 = "DELETE FROM doc_reg WHERE user_id = $recordId";
    $sql2 = "DELETE FROM qualification WHERE user_id = $recordId";
    $sql3 = "DELETE FROM profile_images WHERE id = $recordId";
    $sql4 = "DELETE FROM login_table WHERE userid = '$recordId'";
    if ($conn->query($sql1) AND $conn->query($sql2) AND $conn->query($sql3) AND $conn->query($sql4)  === TRUE) {
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
        echo "Error deleting record: " . $conn->error;
    }
}
// Retrieve records from the database

?>


</body>
</html>
