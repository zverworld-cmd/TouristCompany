<?php
session_start();
require_once("../config/db.php");
require_once("header.php");

// обработка добавления
if (isset($_POST['add_tour']) && isset($_SESSION['user_phone'])) {
    $route_id = intval($_POST['route_id']);
    $phone = $_SESSION['user_phone'];

    $stmtUser = $conn->prepare("SELECT id_client FROM clients WHERE phone = ?");
    $stmtUser->execute([$phone]);
    $client = $stmtUser->fetch(PDO::FETCH_ASSOC);

    if ($client) {
        $stmtInsert = $conn->prepare("
            INSERT INTO tour (id_client, id_routes, date_departure)
            VALUES (?, ?, NOW())
        ");
        $stmtInsert->execute([$client['id_client'], $route_id]);

        $success = "Путёвка добавлена!";
    }
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $conn->prepare("SELECT * FROM routes WHERE id_routes = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$tour = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="content">
    <?php if ($tour): ?>
        <div class="detail-card">
            <img src="img/temp.jpg">
            <h1><?php echo htmlspecialchars($tour['country']); ?></h1>
            <p><strong>Климат:</strong> <?php echo htmlspecialchars($tour['climate']); ?></p>
            <p><strong>Продолжительность:</strong> <?php echo htmlspecialchars($tour['length']); ?> дней</p>
            <p><strong>Отель:</strong> <?php echo htmlspecialchars($tour['hotel']); ?></p>
            <p><strong>Цена:</strong> <?php echo htmlspecialchars($tour['price']); ?> тг.</p>

            <?php if (isset($_SESSION['user_phone'])): ?>
                <form method="post">
                    <input type="hidden" name="route_id" value="<?php echo $tour['id_routes']; ?>">
                    <button name="add_tour" class="btn">Добавить путёвку</button>
                </form>
            <?php else: ?>
                <p>Войдите, чтобы добавить путёвку</p>
            <?php endif; ?>

            <?php if (isset($success)) echo "<p>$success</p>"; ?>

            <a href="tours.php" class="btn">Вернуться к турам</a>
        </div>
    <?php else: ?>
        <div class="detail-card">
            <h1>Тур не найден</h1>
            <a href="tours.php" class="btn">К списку туров</a>
        </div>
    <?php endif; ?>
</div>

<?php require_once("footer.php"); ?>