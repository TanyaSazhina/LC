<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = array();
}
$itemId = isset($_GET['id']) ? intval($_GET['id']) : null; //получает ид из запроса
if (!$itemId) return false; // прверка передается ли ключ

$resData = array();
if (isset($_SESSION['favorites']) && in_array($itemId, $_SESSION['favorites']) === false) {
    $_SESSION['favorites'][] = $itemId; // добавление товара в массив
    $resData['success'] = 1; // добавился
} else {
    $resData['success'] = 0; // не добавился
};
echo json_encode($resData); // json массив для отправки в js
