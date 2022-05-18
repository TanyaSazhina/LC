<?php
session_start();
include('db.php');
$id =  $_REQUEST['id'];
$name =  isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
$yt =  isset($_REQUEST['yt']) ? $_REQUEST['yt'] : NULL;
$twitter =  isset($_REQUEST['twitter']) ? $_REQUEST['twitter'] : NULL;
$instagram =  isset($_REQUEST['instagram']) ? $_REQUEST['instagram'] : NULL;
$spotify =  isset($_REQUEST['spotify']) ? $_REQUEST['spotify'] : NULL;
$facebook =  isset($_REQUEST['facebook']) ? $_REQUEST['facebook'] : NULL;
$telegram =  isset($_REQUEST['telegram']) ? $_REQUEST['telegram'] : NULL;
$biography =  isset($_REQUEST['biography']) ? $_REQUEST['biography'] : NULL;
$site =  isset($_REQUEST['site']) ? $_REQUEST['site'] : NULL;
$loc =  isset($_REQUEST['loc']) ? $_REQUEST['loc'] : NULL;
$res = array();
if ($_FILES['userAvatar']['name'] || $_FILES['profileHeader']['name']) {
    $expemsions = array("jpeg", "jpg", "png", "webp", "svg");
    if ($_FILES['userAvatar']['name'] && $_FILES['profileHeader']['name']) {
        $userAvatar =  $_FILES['userAvatar']['name'] ? $_FILES['userAvatar']['name'] : NULL;
        $userAvatar_size = $_FILES['userAvatar']['size'];
        $userAvatar_tmp = $_FILES['userAvatar']['tmp_name'];
        $userAvatar_type = $_FILES['userAvatar']['type'];
        $userAvatar_ext = strtolower(end(explode('.', $userAvatar)));
        move_uploaded_file($userAvatar_tmp, "../img/avatars/" . $userAvatar);

        $profileHeader =  $_FILES['profileHeader']['name'] ? $_FILES['profileHeader']['name'] : NULL;
        $profileHeader_size = $_FILES['profileHeader']['size'];
        $profileHeader_tmp = $_FILES['profileHeader']['tmp_name'];
        $profileHeader_type = $_FILES['profileHeader']['type'];
        $profileHeader_ext = strtolower(end(explode('.', $profileHeader)));
        move_uploaded_file($profileHeader_tmp, "../img/profileHeaders/" . $profileHeader);
        $sql = "UPDATE `users` SET `name`='$name',`userAvatar`='$userAvatar',`profileHeader`='$profileHeader',`yt`='$yt',`twitter`='$twitter',`instagram`='$instagram',`spotify`='$spotify',`facebook`='$facebook',`telegram`='$telegram',`biography`='$biography',`site`='$site',`loc`='$loc' WHERE id=" . $id;
    } else {
        if ($_FILES['userAvatar']['name']) {
            $userAvatar =  $_FILES['userAvatar']['name'] ? $_FILES['userAvatar']['name'] : NULL;
            $userAvatar_size = $_FILES['userAvatar']['size'];
            $userAvatar_tmp = $_FILES['userAvatar']['tmp_name'];
            $userAvatar_type = $_FILES['userAvatar']['type'];
            $userAvatar_ext = strtolower(end(explode('.', $userAvatar)));
            move_uploaded_file($userAvatar_tmp, "../img/avatars/" . $userAvatar);
            $sql = "UPDATE `users` SET `name`='$name',`userAvatar`='$userAvatar',`yt`='$yt',`twitter`='$twitter',`instagram`='$instagram',`spotify`='$spotify',`facebook`='$facebook',`telegram`='$telegram',`biography`='$biography',`site`='$site',`loc`='$loc' WHERE id=" . $id;
        }
        if ($_FILES['profileHeader']['name']) {
            $profileHeader =  $_FILES['profileHeader']['name'] ? $_FILES['profileHeader']['name'] : NULL;
            $profileHeader_size = $_FILES['profileHeader']['size'];
            $profileHeader_tmp = $_FILES['profileHeader']['tmp_name'];
            $profileHeader_type = $_FILES['profileHeader']['type'];
            $profileHeader_ext = strtolower(end(explode('.', $profileHeader)));
            move_uploaded_file($profileHeader_tmp, "../img/profileHeaders/" . $profileHeader);
            $sql = "UPDATE `users` SET `name`='$name',`profileHeader`='$profileHeader',`yt`='$yt',`twitter`='$twitter',`instagram`='$instagram',`spotify`='$spotify',`facebook`='$facebook',`telegram`='$telegram',`biography`='$biography',`site`='$site',`loc`='$loc' WHERE id=" . $id;
        }
    }
} else {
    $sql = "UPDATE `users` SET `name`='$name',`yt`='$yt',`twitter`='$twitter',`instagram`='$instagram',`spotify`='$spotify',`facebook`='$facebook',`telegram`='$telegram',`biography`='$biography',`site`='$site',`loc`='$loc' WHERE id=" . $id;
}
$rs = mysqli_query($db, $sql);
$sql = "SELECT * FROM users WHERE `id` = $id";
$rs = mysqli_query($db, $sql);
$rs = mysqli_fetch_assoc($rs);
$_SESSION["user"] = array();
$_SESSION["user"]["id"] = $rs["id"];
$_SESSION["user"]["name"] = $rs["name"];
$_SESSION["user"]["email"] = $rs["email"];
$_SESSION["user"]["yt"] = $rs["yt"];
$_SESSION["user"]["twitter"] = $rs["twitter"];
$_SESSION["user"]["instagram"] = $rs["instagram"];
$_SESSION["user"]["spotify"] = $rs["spotify"];
$_SESSION["user"]["facebook"] = $rs["facebook"];
$_SESSION["user"]["telegram"] = $rs["telegram"];
$_SESSION["user"]["biography"] = $rs["biography"];
$_SESSION["user"]["site"] = $rs["site"];
$_SESSION["user"]["loc"] = $rs["loc"];
//echo json_encode($_SESSION["user"]);
header('Location: /profile.php?id=' . $id);
