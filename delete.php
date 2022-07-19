<?php
$id = $_GET["id"];
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");
$result = $conn->query("DELETE FROM `news` WHERE `id`= $id ");
header("Location:index1.php");