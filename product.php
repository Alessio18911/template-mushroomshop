<?php

require_once 'db/db.php';

if(isset($_GET['product'])) {
    $currentProduct = $_GET['product'];
    $product = $connect->query("SELECT * FROM products WHERE title = '$currentProduct'")->fetch(PDO::FETCH_ASSOC);

    if(!$product) {
        header("Location: index.php");
    }

    require_once 'parts/header.php';
}

?>

<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><?=$product['rus_name'] ?> (<?=$product['price'] ?> рублей)</h2>
    <div class="descr"><?=$product['description'] ?></div>
    <img width="300" src="img/<?=$product['img'] ?>" alt="<?=$product['rus_name'] ?>">
    <? require_once('parts/add-form.php') ?>
</div>
