<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=qknews",$username,$password);
//    echo "zhu";
} catch (PDOException $e) {
//    echo "zhu";
    $data="数据库连接失败".$e->getMessage();
    header(http_response_code(500));
    die(json_encode($data));
}

session_start();

$name=$_POST['name'];
$pwd=$_POST['pwd'];
//echo "zhu";
if ($name == "" || $pwd == "") {
//    echo "zhu";
    $data="请确认信息完整性";
    header(http_response_code(401));
    die(json_encode($data));
}
else {
//    echo "zhu";
    $sql = "SELECT * FROM snaker_infor WHERE name = '$name'";
    $res=$pdo->prepare($sql);
    // $res->bindValue('id',$name);
    $res->execute();
    $result=$res->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        if ($pwd==$result['pwd']) {
            $data="登录成功";
            $_SESSION['name']=$name;
            echo json_encode($data);
        }
        else {
            $data="密码错误";
            header(http_response_code(422));
            die(json_encode($data));
        }
    }
    else {
//        echo "luo";
//        echo "shu";
        $data="用户名不存在";
        header(http_response_code(422));
        die(json_encode($data));
    }

}
// echo $data;
?>
