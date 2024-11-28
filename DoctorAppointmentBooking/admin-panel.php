<?php
session_start();
if (isset($_SESSION['admin'])) {
$id=$_SESSION['admin'];

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'appointment';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * FROM login_table WHERE email='$id'";
$result=$conn->query($sql);

if($result->num_rows > 0){
    
        $name="Admin";
    }
    }
    else{
        header("location:admin-login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

nav {
    background-color: #333;
    color: #fff;
    padding: 20px; /* Increase the padding to increase the size */
    font-size: 18px;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav, ul, li, a {
    text-decoration: none;
    color: #fff;
}
ul li::hover{
    content: '';
    height: 3px;
    width: 0;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}

main {
    padding-top: 0px;
    padding-right: 20px;
    padding-left: 20px;
    padding-bottom: 20px;
}
.right{
    padding-left: 60%;
}

.card {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin: 20px 0;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card h2 {
    margin-bottom: 10px;
}

.card p {
    font-size: 24px;
    font-weight: bold;
    margin: 0;
    color: green;
}
.disp{
    color: black;
}

    </style>


</head>
<body>
    <div>
    <nav>
        
        <ul>

            <li><a href="admin-panel.php" >Dashboard</a></li>
            <li><a href="admin-view-users.php" >Users</a></li>
            <li><a href="admin-view-doc.php" >Doctors</a></li>
            <li><a class="right">Hello, <?php echo $name ?></a></li>
            <li><a href="logout.php">Logout</a></li>
             
        </ul>
       
    </nav>
    
    
</div>
    <main>
        <h1>Dashboard</h1>
        <div class="card">
           <a href="admin-view-users.php"> <h2 class="disp">Total Users</h2></a>
            <?php
            $sql = "SELECT COUNT(*) as count FROM user_reg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
    echo "<p> $count </p>";
} else {
    echo "<p> $count </p>";
}  ?>
        </div>
        <div class="card">
           <a href="admin-view-doc.php"> <h2 class="disp">Total Doctors</h2></a>
            <?php
            $sql = "SELECT COUNT(*) as count FROM doc_reg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
    echo "<p> $count </p>";
} else {
    echo "<p> $count </p>";
}  ?>
        </div>
        <div class="card">
            <h2>Total Bookings</h2>
            <?php
            $sql = "SELECT COUNT(*) as count FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
    echo "<p> $count </p>";
} else {
    echo "<p> $count </p>";
}  ?>
        </div>
    </main>
    
</body>
</html>
