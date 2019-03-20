<?php

require_once 'parts/header.php';

if(isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];
    $products = $connect->query("SELECT * FROM products WHERE cat = '$currentCat'");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
} else {
    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
}

?>

<div class="main">
    <? foreach($products as $product) {?>
    <div class="card">
        <a href="product.php">
            <img src="img/<?= $product['img']?>" alt="<?= $product['rus_name']?>">
        </a>
        <div class="label"><?= $product['rus_name']?> (<?= $product['price']?>)</div>
        <button type="submit">Добавить в корзину</button>
    </div>
    <? } ?>
</div>

</body>
</html>
