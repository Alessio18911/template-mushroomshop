<?
session_start();
require_once '../db/db.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $product = $connect->query("SELECT * FROM products WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'title' => $product['title'],
            'price' => $product['price'],
            'rus_name' => $product['rus_name'],
            'img' => $product['img'],
            'quantity' => 1
        ];
    }

    $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] += 1 : 1;
    $_SESSION['totalPrice'] = isset($_SESSION['totalPrice']) ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];
}

header("Location: {$_SERVER['HTTP_REFERER']}");