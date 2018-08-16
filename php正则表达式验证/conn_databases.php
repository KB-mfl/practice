<?php
    // echo "zhu";
    $db_pass="";
    try {
      $conn = new PDO('mysql:host=127.0.0.1;dbname=qknews','root', $db_pass);
      $conn->exec('SET NAMES UTFS');
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
      echo "connection faild:".$e->getMessage();
    }
    $result=$conn->prepare("select * from form1");
    if ($result->execute()) {
      $row=$result->fetchAll(PDO::FETCH_ASSOC);
      $i=0;
      foreach ($row as $value) {
        $arr[$i++]=[
          "username"=>$value['username'],
          "email"=>$value['email'],
          "phone"=>$value['phone'],
        ];
      }
      echo json_encode($arr);
    }
?>
