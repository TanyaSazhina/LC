<?php
include('db.php');
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;

$resData = array();

$sql = "INSERT INTO `subscribe`(`email`) VALUES ('$email')";
$rs = mysqli_query($db, $sql);
if ($rs) {
    $resData['success'] = 1;
    $resData['message'] = "Подписка оформленна";
} else {
    $resData['success'] = 0;
    $resData['message'] = "Подписка не оформленна";
}


echo json_encode($resData);
