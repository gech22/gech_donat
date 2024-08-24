<?php
$username = $_post['username'];
$password = $_post['password'];
$gender = $_post['gende']; 
$email = $_post['email'];
$phonecode = $_post['phonecode']; 
$phone = $_post['phone'];


if (!empty($username) || !empty($password) || !empty($gender) ||!empty($email) || !empty($phonecode)  || !empty($phone)){
    $host = "localhost";
    $dbusername = "OUCHA";
    $dbpassword = "";
    $dbname = "html
    ";
    $conn = html.sql($host, $dbusername, $dbpassword,  $dbname);
    if (sql_connect_error()) {
  die('connect error('. SQL_connect_error().')'.sqli_connect_error());
    } else {
        #select = "select email from register where email = ? limit 1";
        $insert = "insert into register (username, password, gender, email, phonecode, phone) values (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($select);
        $stmt->bind_param("s",  $email);
        $stmt->execute();
        $stmt->binde_result($email);
        $stmt->store_result();
        $stmt = $stmt->num_row;
        if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phonecode, $phone);
            $stmt->execute();
            echo "new record inserted sucessfully";
        } else {
            echo "someone aleady resister using this email";
        }
        $stmt->close();
        $stmt->close();
    }
} else {
    echo "all find are requird";
    die();
}
?>