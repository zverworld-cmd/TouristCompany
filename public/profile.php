<?php
session_start();
require_once("header.php");
require_once("../config/db.php");

if (isset($_POST['login'])) {
    $phone = $_POST['phone'];
    $stmt = $conn->query("SELECT * FROM clients WHERE phone='$phone'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo "<p>Неверный номер телефона</p>";
        exit;
    } else {
        $_SESSION['user_phone'] = $row['phone'];
    }
}

if (isset($_SESSION['user_phone'])) {
    $userPhone = $_SESSION['user_phone'];

    $stmt = $conn->query("
        SELECT * FROM clients, tour, routes 
        WHERE phone='$userPhone' 
        AND tour.id_client = clients.id_client 
        AND tour.id_routes = routes.id_routes
    ");

    $tours = [];
    $totalPrice = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tours[] = $row;
        $totalPrice += $row['price'];
    }

    $countTours = count($tours);
    $discount = ($countTours >= 2) ? 0.05 : 0;
    $finalPrice = $totalPrice - ($totalPrice * $discount);

    echo "<div class='content'>
    <h1>Все туры</h1>
    <div class='cards'>";

    foreach ($tours as $row) {
        echo "<div class='card'>
            <img src='img/temp.jpg'>
            <h2>{$row['country']}</h2>
            <p>Дата начала: {$row['date_departure']}</p>
            <p>Цена: {$row['price']} тг.</p>
            <a href='delete_tour.php?id={$row['id_routes']}' class='btn btn-danger'>Удалить</a>
        </div>";
    }

    echo "</div>";

    // итог
    echo "<div style='margin-top:20px'>";
    echo "<p>Всего путёвок: $countTours</p>";
    echo "<p>Общая цена: $totalPrice тг.</p>";

    if ($discount > 0) {
        echo "<p>Скидка: 5%</p>";
    }

    echo "<p><strong>Итого: $finalPrice тг.</strong></p>";
    echo "</div>";

    echo "</div>";

} else {
    echo "<p>Пожалуйста, войдите</p>";
    echo "<form method='post'>
            <input type='text' name='phone' placeholder='Введите номер телефона' required>
            <input name='login' type='submit' value='Войти'>
          </form>";
}
?>

<a href="purchase.php" class="btn btn-primary">Купить</a>

<?php require_once("footer.php"); ?>