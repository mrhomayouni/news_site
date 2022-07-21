<?php
$id = $_GET["id"];
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");

$statement = $conn->prepare( "SELECT * FROM news WHERE `id`=:id" );
$statement->bindParam(':id', $id);
$statement->execute();
foreach( $statement->fetchAll() as $res ){
    $bname = $res["name"];
    $bcontent = $res["content"];
    $bwriter = $res["writer"];
    $bdate = $res["date"];
}
if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $content = $_POST["content"];
    $writer = $_POST["writer"];
    $date = $_POST["date"];
    $stmt = $conn->prepare("UPDATE `news` SET `name`=:name,`content`=:content,`writer`=:writer,`date`=:date  WHERE `id`=:id ");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':writer', $writer);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
?>
<form action="" method="post">
    <input type="text" name="name" placeholder="title of news" value="<?php echo $bname ?>" required> <br> <br>
    <input type="text" name="content" placeholder="content of news" value="<?php echo $bcontent ?>" required> <br><br>
    <input type="text" name="writer" placeholder="writer of news" value="<?php echo $bwriter ?>" required> <br><br>
    <input type="text" name="date" value="<?php echo $bdate ?>"> <br><br>
    <input type="submit" value="send" name="send">

</form>