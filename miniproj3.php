<?php
$mp_name2 = $_POST['mp_name2'];

$username21 = $_POST['username21'];
$usn21 = $_POST['usn21'];
$sem21 = $_POST['sem21'];
$email21 = $_POST['email21'];
$phone21 = $_POST['phone21'];

$username22 = $_POST['username22'];
$usn22 = $_POST['usn22'];
$sem22 = $_POST['sem22'];
$email22 = $_POST['email22'];
$phone22 = $_POST['phone22'];

$username23 = $_POST['username23'];
$usn23 = $_POST['usn23'];
$sem23 = $_POST['sem23'];
$email23 = $_POST['email23'];
$phone23 = $_POST['phone23'];


if (!empty($mp_name2) ||!empty($username21) || !empty($usn21) ||!empty($sem21) || !empty($email21)|| !empty($phone21)||!empty($username22) || !empty($usn22) ||!empty($sem22) || !empty($email22)|| !empty($phone22)||!empty($username23) || !empty($usn23) ||!empty($sem23) || !empty($email23)|| !empty($phone23)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "student_1";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname); /*HERE*/
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email21 From miniproj2  Where email21 = ? Limit 1";
     $INSERT = "INSERT Into miniproj2 (mp_name2,username21, usn21,sem21,email21, phone21,username22, usn22,sem22,email22, phone22,username23, usn23,sem23,email23, phone23) values(?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email21);
     $stmt->execute();
     $stmt->bind_result($email21);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	 /*$stmt2 = $conn->prepare($SELECT);
     $stmt2->bind_param("s", $email22);
     $stmt2->execute();
     $stmt2->bind_result($email22);
     $stmt2->store_result();
     $rnum2 = $stmt2->num_rows;*/
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisissisissisi",$mp_name2, $username21, $usn21, $sem21,$email21, $phone21,$username22, $usn22, $sem22,$email22, $phone22, $username23, $usn23, $sem23,$email23, $phone23);
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