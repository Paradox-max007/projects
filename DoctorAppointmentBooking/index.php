<?php session_start();
include('connection.php');
if (isset($_SESSION['name'])) {
$id=$_SESSION['name'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST["email"];
     $booking=$_SESSION['booking'];

 }
$sql="SELECT * FROM user_reg WHERE email='$id'";
$result=$con->query($sql);

if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        $name=$row['username'];
        $userid=$row['userid'];
    }}
}
 ?>



<html>
<head>
    <title>Home</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

.banner {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(homeeback.jpg);
    background-size: cover;
    background-position: center;

}

.navbar{
    width: 85%;
    margin: auto;
    padding: 25px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;

}

.logo{
    width: 120px;
    cursor: pointer;
    border-radius: 8px;
}

.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 0 10px;
    position: relative;
}

.navbar ul ,li, a{
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
    cuorsor: pointer;
}

.navbar ul li::after{
    content: '';
    height: 3px;
    width: 0;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 1s;
}

.navbar ul li:hover::after{
    width: 100%;
}

.content{
    width: 100%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align:center;
    color: #fff;
}

.content button a{
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
}

.content h1{
    font-size: 70px;
    margin-top: 80px;
}

.content p{
    margin: 20px auto;
    font-weight: 100;
    line-height: 25px;
}

button{
    width: 200px;
    padding: 15px 0;
    text-align: center;
    margin: 20px 10px;
    border-radius: 25px;
    font-weight: bold;
    border: 2px solid #009688;
    background: transparent;
    color: #fff;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

span{
    background: #009688;
    height: 100%;
    width: 0;
    border-radius: 25px;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: -1;
    transition: 0.5s;
}

button:hover span{
    width: 100%;
}

button:hover{
    border: none;
}

</style>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo.png" class="logo">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="about-us.html">ABOUT</a></li>
                <li><a href="departments.html">DEPARTMENTS</a></li>
                <li><a href="display_doc.php">DOCTORS</a></li>
                
               <li> <?php if (!isset($_SESSION["name"])) {
                    echo '<li><a href="login-main.php">LOGIN</a></li>';
                    echo '<li><a href="register.php">REGISTER</a></li>';
                    echo '<li><a href="admin-login.html">ADMIN</a></li>';

                    
                     
                    }
                    else{
                    echo '<li><a> Welcome, ' . $name  .'</a></li>';
                    
                    echo "<li><a href='user-view-booking.php?id=$userid'>Your Appointments</a></li>"; 
                
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                ?></li>
                
            </ul>
        </div>
        <div class="content">
            <h1>APPOINTMENT BOOKING</h1>
            <p>A hospital is a healthcare institution providing patient treatment with specialized health science and auxiliary 
            healthcare staff and medical equipment. The best-known type of hospital is the general hospital, which typically has 
            an emergency department to treat urgent health problems ranging from fire and accident victims to a sudden illness.A 
            reference to the services and specialties of the clinic with articles about all diseases, their symptoms and the current 
            therapeutic approaches along with the appropriate medical appointments</p>
            <div>
                <a href="display_doc.php"><button type="button"><span></span>APPOINTMENT</button>
                <a href="about-us.html"><button type="button"><span></span>LEARN MORE</button>
            </div>
        </div>

    </div>


</body>
</html>

