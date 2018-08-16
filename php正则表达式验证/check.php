<?php
//链接数据库
try {
  $conn = new PDO('mysql:host=127.0.0.1;dbname=qknews','root', $db_pass);//链接指定数据库
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
// $_POST['username']
// $data=json_encode($data,true);÷echo $data;
if (isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['phone'])
) {
  $username=$_POST['username'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $db_pass="";
  $ifsuccess = true;
  $message = array();
  $message["username"] = "username is right";
  $message["email"] = "email is right";
  $message["phone"] = "phone is right";
  if (!preg_match('#^[a-zA-Z]\w+$#',$username)) {
    $ifsuccess = false;
    $message["username"] = "username is wrong";
    // array_push($message, "username is wrong");
    // echo $hint;
    // die("输入的用户名的不正确");
    // $hint='username is wrong';
    //echo "ok2";
  }
  if (!preg_match('#^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$#i',$email)) {
    $ifsuccess = false;
    $message["email"] = "email is wrong";
    // $hint='email is wrong';
    // echo $hint;
    // die("输入的邮箱的不正确");
    // echo "ok3";
  }
  if (!preg_match('/^1[34578]\d{9}$/',$phone)) {
    $ifsuccess = false;
    $message["phone"] = "phone is wrong";
    // array_push($message, "phone is wrong");
    // $hint='phone is wrong';
    // echo $hint;
    // die("输入的电话不正确");
    //echo "ok3";
  }
  if($ifsuccess) {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO form1 (username, email, phone) VALUES ('$username','$email','$phone')";
    // VALUES ($username,$email,$phone)";
    $conn->exec($sql);
    echo json_encode(array("message" => "ok"));
  } else {
    header(http_response_code(403));
    die(json_encode(array("message" => $message)));
  }
  // echo "ok";
  // $hint='ok';
}















// $username=$_POST["username"];
// $email=$_POST["email"];
// $phone=$_POST["phone"];
//echo $phone;
// if (!preg_match('#^[a-zA-Z]\w+$#',$username)) {
//   die("输入的用户名的不正确");
//   //echo "ok2";
// }
// else if (!preg_match('#^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$#i',$email)) {
//   die("输入的邮箱的不正确");
//   // echo "ok3";
// }
// else if (!preg_match('/^1[34578]\d{9}$/',$phone)) {
//   die("输入的电话不正确");
//   //echo "ok3";
// }
// echo "ok";
?>
