<?php
session_start();
include('db.php');
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;

$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : NULL;

$passwordConfirm = isset($_REQUEST['passwordConfirm']) ? $_REQUEST['passwordConfirm'] : NULL;

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;

$resData = array();

$sql = "SELECT id FROM users WHERE `email` = $email";
$rs = mysqli_query($db, $sql);
$rs = mysqli_fetch_assoc($rs);
if ($rs) {
    $resData['success'] = 0;
    $resData['message'] = "Пользователь с такой почтой уже существует";
} else if (!$password) {
    $resData['success'] = 0;
    $resData['message'] = "Введите пароль";
} else {
    if ($password == $passwordConfirm) {
        $pwdMD5 = md5($password);
        $sql = "INSERT INTO `users`(`name`, `password`, `email`) VALUES ('$name', '$pwdMD5', '$email')"; // запрос на добавление в бд
        $rs = mysqli_query($db, $sql);
        if ($rs) {
            $sql = "SELECT * FROM users WHERE `email` = $email"; // запрос на добавление в бд
            $rs = mysqli_query($db, $sql);
            $rs = mysqli_fetch_assoc($rs);
            $resData['message'] = "Пользователь зарегестрован";
            $resData['success'] = 1;
            $_SESSION["user"]["id"] = $rs["id"];
            $_SESSION["user"]["name"] = $rs["name"];
            $_SESSION["user"]["email"] = $rs["email"];
            $_SESSION["user"]["userAvatar"] = $rs["userAvatar"];
            $_SESSION["user"]["profileHeader"] = $rs["profileHeader"];
            $_SESSION["user"]["yt"] = $rs["yt"];
            $_SESSION["user"]["twitter"] = $rs["twitter"];
            $_SESSION["user"]["instagram"] = $rs["instagram"];
            $_SESSION["user"]["spotify"] = $rs["spotify"];
            $_SESSION["user"]["facebook"] = $rs["facebook"];
            $_SESSION["user"]["telegram"] = $rs["telegram"];
            $_SESSION["user"]["biography"] = $rs["biography"];
            $_SESSION["user"]["site"] = $rs["site"];
            $_SESSION["user"]["loc"] = $rs["loc"];
        } else {
            $resData['success'] = 0;
            $resData['message'] = "не получилось";
        }
    } else {
        $resData['success'] = 0;
        $resData['message'] = "пароли не совподают";
    }
}


echo json_encode($resData);
