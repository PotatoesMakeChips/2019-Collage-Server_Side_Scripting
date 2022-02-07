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
  $userId = $_POST["userID"];
  echo $post;
  $sql = "INSERT INTO `dan`.`blog-posts` (`post-id`, `user-id`, `post-heading`, `post`) VALUES (NULL, '$userId', '$heading', '$post')";
  //run SQL query
  $result = $conn->query($sql);
}
#close connection
$conn->close();
header('location: posts.php');
?>
