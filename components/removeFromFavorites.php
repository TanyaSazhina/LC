<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = array();
}
$itemId = isset($_GET['id']) ? intval($_GET['id']) : null; //получает ид из запроса
if (!$itemId) exit(); // прверка передается ли ключ

$resData = array(); // массив для вставки товаров в корзине, которые после будет передоваться в js
$key = array_search($itemId, $_SESSION['favorites']);
if ($key !== false) { // проверка существует ли сессия(массив с товарами) и имеет ли он уже такой товар внутри себя
    unset($_SESSION['favorites'][$key]); // удаление товара из массив
    $resData['success'] = 1; // удаление
} else {
    $resData['success'] = 0; // не удаление
};
echo json_encode($resData); // json массив для отправки в js