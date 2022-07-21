<?php
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");

if (isset($_POST["send"])) {
     $name = $_POST["name"];
     $content = $_POST["content"];
     $writer = $_POST["writer"];
     $date = $_POST["date"];
    $statement = $conn->prepare("INSERT INTO `news`(`name`, `content`, `writer`, `date`) VALUES (?,?,?,?)");
    $statement->bindParam(1, $name);
    $statement->bindParam(2, $content);
    $statement->bindParam(3, $writer);
    $statement->bindParam(4, $date);
    $statement->execute();
}

?>

<form action="" method="post">
    <input type="text" name="name" placeholder="title of news" required> <br> <br>
    <input type="text" name="content" placeholder="content of news" required> <br><br>
    <input type="text" name="writer" placeholder="writer of news" required> <br><br>
    <input type="date" name="date"> <br><br>
    <input type="submit" value="send" name="send">

</form>
