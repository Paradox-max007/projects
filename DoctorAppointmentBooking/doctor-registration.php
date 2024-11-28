<?php




/*echo "<pre>";
print_r($_FILES['myimg']);
echo "</pre>";*/



if(isset($_POST['submit'])){
$name=$_POST['username'];
$email=$_POST['email'];
$med_id=$_POST['med-id'];
$place=$_POST['place'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$repasswd=$_POST['repassword'];

$upload_dir = 'uploads/';


if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

$file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

$file_path = $upload_dir . uniqid() . '_' . $file_name;

    if (move_uploaded_file($file_tmp, $file_path)) {
    	include('connection.php');

$dup=mysqli_query($con,"SELECT * FROM login_table WHERE email='$email' AND password='$password'" );
if (mysqli_num_rows($dup)> 0) {
	echo '<script>window.location.href="doc-login.php";alert("This Email Id is already registered. Please Login")</script>';
}
else{

if($password == $repasswd){

	$stmt = $con->prepare("INSERT INTO doctor_reg (docname, email, medical_id, place,mobile,profile) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssis", $name, $email, $med_id, $place, $mobile, $file_path);


	$sql="INSERT INTO login_table VALUES('$password','$email','$med_id')";
	mysqli_query($con,$sql);
	
	
    

	echo '<script>window.location.href="doc-login.php";alert("Doctor Record added Successfully")</script>';

}
else{
echo '<script>window.location.href="doc-registration.php"; alert("Password doesnot match")</script>';
}
}
}
$con->close();
}
?>
