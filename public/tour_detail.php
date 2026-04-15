<?php
require_once("../config/db.php");
require_once("header.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $conn->prepare("SELECT * FROM routes WHERE id_routes = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$tour = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="content">
    <?php if ($tour): ?>
        <div class="detail-card">
            <img src="img/temp.jpg" alt="<?php echo htmlspecialchars($tour['country'], ENT_QUOTES, 'UTF-8'); ?>">
            <h1><?php echo htmlspecialchars($tour['country'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <p><strong>Климат:</strong> <?php echo htmlspecialchars($tour['climate'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Продолжительность:</strong> <?php echo htmlspecialchars($tour['length'], ENT_QUOTES, 'UTF-8'); ?> дней</p>
            <p><strong>Отель:</strong> <?php echo htmlspecialchars($tour['hotel'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Цена:</strong> <?php echo htmlspecialchars($tour['price'], ENT_QUOTES, 'UTF-8'); ?> руб.</p>
            <a href="tours.php" class="btn">Вернуться к турам</a>
        </div>
    <?php else: ?>
        <div class="detail-card">
            <h1>Тур не найден</h1>
            <p>Пожалуйста, выберите другую путёвку из списка.</p>
            <a href="tours.php" class="btn">К списку туров</a>
        </div>
    <?php endif; ?>
</div>

<?php
require_once("footer.php");
