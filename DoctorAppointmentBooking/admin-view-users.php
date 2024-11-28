<?php
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




$sql = "SELECT * FROM user_reg";
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
    
    .submit-button {
            margin-right: 10px; 
            background-color: #ff0000;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        }
    .submit-button:hover {
        background-color: #cc0000;
    }
    .update-button{
        margin-left: 10px; /* Adjust this value to increase or decrease the space */
            background-color: #4AB834;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
    .update-button:hover {
        background-color: #3F8A30;
    }

    
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
.heading {
            text-align: center;
        }
</style>

    <title>Display Records</title>
</head>
<body>
     <div class="heading">
        <h1><u>Patients List</u></h1>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Place</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['userid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['housename'] . "</td>";
                echo "<td>" . $row['place'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='record_id' value='" . $row['userid'] . "'>";
                echo "<button type='submit' onclick='deleteUser()' name='delete_record' class='submit-button'>Delete</button>";
                echo "</form>";
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

// Function to delete a record
if (isset($_POST['delete_record'])) {
    $id_to_delete = $_POST['record_id'];
    $sql1 = "DELETE FROM user_reg WHERE userid = '$id_to_delete'";
    $sql2 = "DELETE FROM login_table WHERE userid = '$id_to_delete'";
    $sql3 = "DELETE FROM bookings WHERE patient_id = '$id_to_delete'";
    if ($conn->query($sql1) AND $conn->query($sql2) AND $conn->query($sql3) === TRUE) {
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
