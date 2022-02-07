<?php
#data for conection
$dbServer = "172.20.1.1";
$dbUser = "dan";
$dbPass = "password";
$db = "dan";
#opens conection
$conn = new mysqli($dbServer, $dbUser, $dbPass, $db);
#tests conction
if ($conn->connect_error) {
  die("conection error: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $heading = $_POST["heading"];
  $post = $_POST["posting"];
  $postId = $_POST["postID"];
  echo $post;
  $sql = "UPDATE `dan`.`blog-posts` SET `post-heading` = '$heading', `post` = '$post' WHERE `blog-posts`.`post-id` = '$postId'";
  //run SQL query
  $result = $conn->query($sql);
}
#close connection
$conn->close();
header('location: posts.php');
?>
