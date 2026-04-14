<?php
require_once("../config/db.php");
require_once("header.php");

$stmt = $conn->query("SELECT * FROM routes ORDER BY price LIMIT 3");

while ($row = $stmt->fetch()) {
    echo $row['country']."<br />\n";
}
?>

<div class="content">
    <div class="cards">
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 1</h2>
            <p>Описание карточки 1</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 2</h2>
            <p>Описание карточки 2</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 3</h2>
            <p>Описание карточки 3</p>
            <a href="#" class="btn">Подробнее</a>
        </div>

             <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 1</h2>
            <p>Описание карточки 1</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 2</h2>
            <p>Описание карточки 2</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 3</h2>
            <p>Описание карточки 3</p>
            <a href="#" class="btn">Подробнее</a>
        </div>

             <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 1</h2>
            <p>Описание карточки 1</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 2</h2>
            <p>Описание карточки 2</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
        <div class="card">
            <img src="../src/img/temp.jpg" alt="">
            <h2>Карточка 3</h2>
            <p>Описание карточки 3</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
    </div>
</div>

<?php
require_once("footer.php");