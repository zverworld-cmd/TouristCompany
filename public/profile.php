<?php
session_start();
 // Установка тестового номера телефона для демонстрации
require_once("header.php");
require_once("../config/db.php");

if (isset($_POST['login'])) {
    $phone = $_POST['phone'];
    // Здесь должна быть проверка номера телефона в базе данных
    $stmt = $conn->query("SELECT * FROM clients WHERE phone='$phone'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        echo "<p>Неверный номер телефона. Пожалуйста, попробуйте снова.</p>";
        exit;
    }else {
        echo "<p>Добро пожаловать, {$row['name']}!</p>";
        $_SESSION['user_phone'] = $row['phone'];
    }
}


if (isset($_SESSION['user_phone'])) {
    $userPhone = $_SESSION['user_phone'];
    $stmt = $conn->query("SELECT * FROM clients, tour, routes WHERE phone='$userPhone' AND tour.id_client = clients.id_client AND tour.id_routes = routes.id_routes");
    
    echo "<div class='content'>
    <h1>Все туры</h1>
    <div class='cards'>";
      
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='card'>
            <img src='img/temp.jpg' alt='Тур'>
            <h2>{$row['country']}</h2>
            <p>Дата начала: {$row['date_departure']}</p>
        </div>";
    }       
    echo "</div></div>";

} else {
    echo "<p>Пожалуйста, войдите в систему, чтобы увидеть ваш профиль.</p>";
    echo "<form method='post'>\
            <input type='text' name='phone' placeholder='Введите номер телефона' required>
            <input name='login' type='submit' value='Войти'>
          </form>";
}
?>


<?php
require_once("footer.php");
?>