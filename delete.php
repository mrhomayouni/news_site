<?php
$id = $_GET["id"];
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");
$statement = $conn->prepare("DELETE FROM `news` WHERE `id`=?");
$statement->execute([$id]);

header("Location:index1.php");