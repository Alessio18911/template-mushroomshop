<?php

require_once 'parts/header.php';

if(null !== $_SESSION['cart'] && count($_SESSION['cart']) == 0) { ?>
    <h2 class="cart-title">Ваша корзина пуста :(</h2>
    <a class="back" href="index.php">На главную</a>
<? } else {

foreach($_SESSION['cart'] as $key=>$product) {

?>

<div class="cart">
    <a href="product.php?product=<?=$product['title']?>">
        <img src="img/<?= $product['img'] ?>" alt="<?= $product['rus_name'] ?>">
    </a>
    <div class="cart-descr">
        <?= $product['rus_name'] ?> в количестве <?= $product['quantity'] ?> шт на сумму <?= $product['quantity'] * $product['price'] ?> рублей
    </div>
    <form action="actions/delete.php" method="post">
        <input type="hidden" name="delete" value="<?= $key ?>">
        <input type="submit" value="Удалить">
    </form>
</div>
<? } ?>
<hr>
<form class="order" action="actions/mail.php" method="post">
    <input type="text" name="username" placeholder="Ваше имя" required>
    <input type="text" name="phone" placeholder="Ваш телефон" required>
    <input type="email" name="email" placeholder="Ваш email" required>
    <input type="submit" name="order" value="Отправить заказ">
</form>
<? } ?>
<hr>

</body>
</html>
