<?php
if (isset($_POST['name'])&&isset($_POST['pwd'])&&isset($_POST['pwd_confirm'])) {
    $username = "root";
    $password = "";
    $name=$_POST['name'];
    $pwd = $_POST['pwd'];
    $pwd_confirm = $_POST['pwd_confirm'];
//    $time = now();
    $content = '';
    session_start();
    if ($name == "" || $pwd == "" || $pwd_confirm == "") {
        $data = "请确认信息完整性";
        header(http_response_code(401));
        die(json_encode($data));
    } else {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=qknews", $username, $password);
            $pdo->exec("SET NAMES UTF8");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $data = "数据库连接失败" . $e->getMessage();
            header(http_response_code(500));
            die(json_encode($data));
        }
        $sql = "SELECT * FROM snaker_infor WHERE name = '$name'";
        $res = $pdo->prepare($sql);
        // $res->bindValue('id',$name);
        $res->execute();
        $result = $res->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $data = "用户名已存在";
            header(http_response_code(422));
            die(json_encode($data));
        } else {
            $sql = "INSERT INTO SNAKER_INFOR (`name`, `pwd`,`score`)
            VALUES ('$name','$pwd',0)";
            $pdo->exec($sql);
//            echo "zhu";
            $data = "注册成功";
            $_SESSION['name'] = $name;
            die(json_encode($data));
        }
    }
}
?>