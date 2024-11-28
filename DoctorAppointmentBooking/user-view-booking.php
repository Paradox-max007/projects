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

if (isset($_GET['id'])) {
    $recordId = $_GET['id'];

    // Prepare a SQL query to retrieve the record
    $sql = "SELECT * FROM bookings WHERE patient_id = '$recordId'";

    // Execute the query
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

    th, td ,tr{
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    .head{
        text-align: center;
    }

    /* Style the delete buttons */
    .delete-button {
            margin-right: 10px; /* Adjust this value to increase or decrease the space */
            background-color: #ff0000;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        }
    .delete-button:hover {
        background-color: #cc0000;
    }
    .book-button{
        background-color: blue;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        text-align: right;


    }
</style>

    <title>Bookings</title>
</head>
<body>
    <h2 class="head">YOUR APPOINTMENTS</h2>
    <table>
        <tr>
            <th>Email</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            
           
            <th>Action</th>
        </tr>
        <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        // Now, $record contains the data of the retrieved record
        $pname=$row['name'];
        $dname=$row['doc_name'];
        $emails=$row['email'];
        $id=$row['doc_id'];
        $date=$row['dates'];
        $time=$row['btime'];
        echo "<tr>";
                echo "<td>" . $emails. "</td>";
                echo "<td>" . $pname . "</td>";
                echo "<td>" . $dname . "</td>";
                echo "<td>" . $date . "</td>";
                echo "<td>" . $time . "</td>";
                
                
                echo "<td>";
                ?>
                <a href="delete-booking.php?name=<?= $row['email']; ?>" class="delete-button">Delete</a>

                <?php
                echo "</td>";
        echo "</tr>";
            

    }}
else{
    echo '<tr>';
    echo '<td></td>';
     echo '<td></td>';
      echo '<td></td>';
    echo '<td>';
    echo "You don't have any bookings yet  ";
    echo'<a href="display_doc.php" class="book-button">Book NOW</a>';
    echo '</td>';
     echo '<td></td>';
      echo '<td></td>';
       echo '<td></td>';
    echo '</tr>'; 
    
}
}
    ?>
</table>
</body>
</html>