<?php
$conn = new PDO("mysql:host=localhost;dbname=news-site2", "root", "");

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $content = $_POST["content"];
    $writer = $_POST["writer"];
    $date=$_POST["date"];
    $result = $conn->query("INSERT INTO `news`(`name`, `content`, `writer`,`date`) VALUES ('$name','$content','$writer','$date')");
}

?>

<form action="" method="post">
    <input type="text" name="name" placeholder="title of news" required> <br> <br>
    <input type="text" name="content" placeholder="content of news" required> <br><br>
    <input type="text" name="writer" placeholder="writer of news" required> <br><br>
    <input type="date" name="date"> <br><br>
    <input type="submit" value="send" name="send">

</form>
