<?php
require_once("header.php");
?>

<div class="content">
    <section class="hero-banner">
        <div class="hero-banner-inner">
            <h1>Лучшие турыssssssssssssssssss, выгодные предложения и комфортный отдых в одном месте.</h1>
        </div>
    </section>
    <div class="cards">
        <div class="card card-clickable" data-href="tours.php">
            <img src="img/temp.jpg" alt="Лучшие направления">
            <h2>Лучшие направления 2026</h2>
            <p>Собрали для вас выгодные маршруты по Европе, Азии и России.</p>
            <a href="tours.php" class="btn">Перейти в каталог</a>
        </div>
        <div class="card card-clickable" data-href="tours.php">
            <img src="img/temp.jpg" alt="Комфортные отели">
            <h2>Комфортные отели</h2>
            <p>Только проверенные гостиницы с высоким рейтингом. Откройте страницу туров и выберите лучший вариант.</p>
            <a href="tours.php" class="btn">Перейти в каталог</a>
        </div>
        <div class="card card-clickable" data-href="tours.php">
            <img src="img/temp.jpg" alt="Горячие предложения">
            <h2>Горячие предложения</h2>
            <p>Эксклюзивные цены для раннего бронирования. Посмотрите весь каталог туров прямо сейчас.</p>
            <a href="tours.php" class="btn">Перейти в каталог</a>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.card-clickable').forEach(function(card) {
        card.addEventListener('click', function(event) {
            if (event.target.closest('.btn')) {
                return;
            }
            window.location.href = this.dataset.href;
        });
    });
</script>

<?php
require_once("footer.php");
