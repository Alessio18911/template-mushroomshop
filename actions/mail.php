<?

require_once '../db/db.php';
session_start();

if(isset($_POST['order'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $connect->query("INSERT INTO userorder(username, email, phone) VALUES('$username', '$email', '$phone')");

    $lastId = $connect->query("SELECT MAX(id) FROM userorder WHERE email = '$email'")->fetch(PDO::FETCH_ASSOC);
    $lastId = $lastId['MAX(id)'];

    $message = "<h2>Здравствуйте, Ваш заказ под номером $lastId принят.</h2>";
    $message .= "<h3>Состав заказа:</h3>";
    foreach($_SESSION['cart'] as $product) {
        $message .= "<div>{$product['rus_name']} в количестве: {$product['quantity']} штук.</div>";
    }

    $message .= "<p>Сумма заказа: {$_SESSION['totalPrice']} рублей.</p>";

    echo $message;
}