<?php
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");
$statement = $conn->prepare( "SELECT * FROM news" );
$statement->execute();
foreach( $statement->fetchAll() as $res ){
    echo "<a href='news.php?id=" . $res["id"] . "' >  ".$res["name"]." </a>";;
    echo "<a href='delete.php?id=" . $res["id"] . "' > delete </a>";
    echo "<a href='edit.php?id=" . $res["id"] . "' > edit </a>";

    echo "<br>";
}
echo "<a href='add.php'> add new news </a>";
