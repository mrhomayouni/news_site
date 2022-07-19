<?php
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");
$result = $conn->query("SELECT * FROM `news`");
foreach ($result as $res) {
    echo "<a href='news.php?id=" . $res["id"] . "' > <?php ?> $res[1] </a>";;
    echo "<a href='delete.php?id=" . $res["id"] . "' > delete </a>";
    echo "<a href='edit.php?id=" . $res["id"] . "' > edit </a>";

    echo "<br>";
}
echo "<a href='add.php'> add new news </a>";
