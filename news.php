<?php
$id = $_GET["id"];
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");
$result = $conn->query("SELECT * FROM `news` where `id`=$id");
foreach ($result as $res) {
    echo "<h1> $res[1] </h1>";
    echo "<p> $res[2] </p>";
    echo "writer is :" . $res[3];
}
if (isset($_POST["send"])) {
    $member_name = $_POST["name"];
    $comment = $_POST["comment"];
    $result2 = $conn->query("INSERT INTO `comment`( `member_name`, `comment` , `news_id` ) VALUES ('$member_name','$comment','$id')");
}
$result3 = $conn->query("SELECT * FROM `comment` where `news_id`=$id");
echo "<br>"."momments:"."<br>";
foreach ($result3 as $res2 ){
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
