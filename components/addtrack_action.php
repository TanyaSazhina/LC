<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = array();
}
include('db.php');
if (isset($_FILES['src_track'])) {
    $expensions = array("mp3", "wav");
    $src_track =  $_FILES['src_track']['name'];
    $src_track_size = $_FILES['src_track']['size'];
    $src_track_tmp = $_FILES['src_track']['tmp_name'];
    $src_track_type = $_FILES['src_track']['type'];
    $src_track_ext = strtolower(end(explode('.', $src_track)));
    move_uploaded_file($src_tmp, "../tracks/" . $src_track);
}
if (isset($_FILES['cover'])) {
    $expensions = array("jpeg", "jpg", "png", "webp", "svg");
    $cover =  $_FILES['cover']['name'] ? $_FILES['cover']['name'] : NULL;
    $cover_size = $_FILES['cover']['size'];
    $cover_tmp = $_FILES['cover']['tmp_name'];
    $cover_type = $_FILES['cover']['type'];
    $cover_ext = strtolower(end(explode('.', $cover)));
    move_uploaded_file($cover_tmp, "../img/covers/" . $cover);
}
$name =  isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
$id_owner =  isset($_REQUEST['id_owner']) ? $_REQUEST['id_owner'] : NULL;
$tag1 =  isset($_REQUEST['tag1']) ? $_REQUEST['tag1'] : NULL;
$tag2 =  isset($_REQUEST['tag2']) ? $_REQUEST['tag2'] : NULL;
$tag3 =  isset($_REQUEST['tag3']) ? $_REQUEST['tag3'] : NULL;
$tag4 =  isset($_REQUEST['tag4']) ? $_REQUEST['tag4'] : NULL;
$resData = array();

$sql = "INSERT INTO `tracks`(`name`, `src`, `cover`, `id_owner`, `tag1`, `tag2`, `tag3`, `tag4`) VALUES ('$name','$src_track','$cover','$id_owner','$tag1','$tag2','$tag3','$tag4')";

$rs = mysqli_query($db, $sql);

$resData['success'] = $rs;
$resData['message'] = $_FILES['src_track'];
echo json_encode($resData);
header('Location: /profile.php?id=' . $id_owner);
