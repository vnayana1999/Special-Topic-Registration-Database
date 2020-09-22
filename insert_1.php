	<?php
$username = $_POST['username'];
$usn = $_POST['usn'];
$course_name = $_POST['course_name'];
$course_code = $_POST['course_code'];
$sem = $_POST['sem'];
$email = $_POST['email'];
$phone = $_POST['phone'];
if (!empty($username) || !empty($usn) || !empty($course_name) || !empty($course_code) || !empty($sem) || !empty($email)|| !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "student_1";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname); /*HERE*/
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From insert_1 Where email = ? Limit 1";
     $INSERT = "INSERT Into insert_1 (username, usn,course_name,course_code,sem,email, phone) values(?, ?, ?, ?, ?, ?, ?)";
     //$SELECT1 = "SELECT course_code, course_name From insert_1 Where email = ? Limit 1";
     //$INSERT1 = "INSERT Into insert_1 (username, usn,course_name,course_code,sem,email, phone) values(?, ?, ?, ?, ?, ?, ?)";
     
	 //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssisi", $username, $usn, $course_name , $course_code , $sem,$email, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already insert_1 using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>