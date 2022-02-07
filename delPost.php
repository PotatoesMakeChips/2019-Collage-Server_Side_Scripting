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
  $postId = $_POST["postID"];
  echo $postId;
  $sql = "DELETE FROM `dan`.`blog-posts` WHERE `blog-posts`.`post-id` = '$postId' ";
  //run SQL query
  $conn->query($sql);
  #close connection

}
$conn->close();
header('location: posts.php');
?>
