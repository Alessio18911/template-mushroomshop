<?
session_start();
require_once '../db/db.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $product = $connect->query("SELECT * FROM products WHERE id = '$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    // echo ('<pre>');
    // var_dump($product);
    // echo ('</pre>');

    //$_SESSION['cart'] = ;

    $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] += 1 : 1;
    $_SESSION['totalPrice'] = isset($_SESSION['totalPrice']) ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];
}

header("Location: /index.php");

// echo ('<pre>');
// var_dump($_SESSION);
// echo ('</pre>');