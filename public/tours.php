<?php
require_once("../config/db.php");
require_once("header.php");

$stmt = $conn->query("SELECT * FROM routes ORDER BY price");


?>

<div class="content">
    <h1>Все туры</h1>
    <div class="cards">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="card">
                <img src="img/temp.jpg" alt="<?php echo htmlspecialchars($row['country'], ENT_QUOTES, 'UTF-8'); ?>">
                <h2><?php echo htmlspecialchars($row['country'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p>Климат: <?php echo htmlspecialchars($row['climate'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Отель: <?php echo htmlspecialchars($row['hotel'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Продолжительность: <?php echo htmlspecialchars($row['length'], ENT_QUOTES, 'UTF-8'); ?> дней</p>
                <p>Цена: <?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'); ?> руб.</p>
                <a href="tour_detail.php?id=<?php echo urlencode($row['id_routes']); ?>" class="btn">Подробнее</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
require_once("footer.php");
