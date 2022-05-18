<?php
session_start();
include('db.php');
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;

$pwd = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

$pwd = md5($pwd);


$sql = "SELECT * FROM users WHERE (`email` = '$email' and `password` = '$pwd') LIMIT 1";


$rs = mysqli_query($db, $sql);

$resData = array();
function RsArray($rs)
{
    if (!$rs) return false;
    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $smartyRs[] = $row;
    }
    return $smartyRs;
}
$rs = RsArray($rs);
if (isset($rs[0])) {
    $resData['success'] = 1;
    $resData['message'] = "получилось";
    $rs = $rs[0];
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
    $resData['message'] = "Проверте логин или пароль";
}
echo json_encode($resData);
