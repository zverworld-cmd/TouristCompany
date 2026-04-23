<?php
session_start();
require_once("../config/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM tour WHERE id_routes = ?");
        $stmt->execute([$id]);
        header("Location: profile.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Что-то пошло не так. ID тура не указан.";
}
?>