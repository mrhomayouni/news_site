<?php
$id = $_GET["id"];
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");
$statement = $conn->prepare( "SELECT * FROM news WHERE `id`=:id" );
$statement->bindParam(':id', $id);
$statement->execute();
foreach( $statement->fetchAll() as $res ){
    echo "<h1> $res[1] </h1>";
    echo "<p> $res[2] </p>";
    echo "writer is :" . $res[3];
}
if (isset($_POST["send"])) {
    $member_name = $_POST["name"];
    $comment = $_POST["comment"];
    $statement2 = $conn->prepare( "INSERT INTO `comment`( `member_name`, `comment` , `news_id` ) VALUES (:member_name,:comment,:id)");
    $statement2->bindParam(':member_name', $member_name);
    $statement2->bindParam(':comment', $comment);
    $statement2->bindParam(':id', $id);
    $statement2->execute();
}
$statement3 = $conn->prepare( "SELECT * FROM `comment` where `news_id`=:id" );
$statement3->bindParam(':id', $id);
$statement3->execute();
echo "<br>"."cmomments:"."<br>";
foreach ($statement3->fetchAll() as $res2 ){
    echo $res2["member_name"];
    echo "<br>";
    echo $res2["comment"];
    echo "<br>";
}
?>

<form action="" method="post">
    <input type="text" name="name" placeholder="your name">
    <input type="text" name="comment" placeholder="comment">
    <input type="submit" value="send" name="send">
</form>
