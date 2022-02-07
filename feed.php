<html>
<head>
  <?php session_start(); ?>
  <!-- Links to stylesheets and sets page title -->
  <link rel="stylesheet" type="text/css" href="styles/default.css">
  <title>Custom Motorcycles</title>
  <!-- meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Custom Motorcycles">
  <meta name="keywords" content="Bike,Bikes,Motobike,Motorcycle">
  <meta name="author" content="Daniel Clover">
</head>
<body>

<!-- Header -->
<div class="header">
    <h1>Super Amazzn'g Blog</h1>
</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a class="active" href="feed.php">Home</a>
  <a class="link" href="posts.php">My Posts</a>
  <a class="link" href="login.php">Logout</a>
</div>

<!-- Main -->
<div class="main">
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
  $username = $_SESSION["username"];
  $sql = "SELECT `user-id` FROM `blog-users` WHERE `username` = '$username'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $userId = $row["user-id"];
  }
  $sql = "SELECT * FROM `blog-posts`";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $postingUserId = $row["user-id"];
    $sql2 = "SELECT `username` FROM `blog-users` WHERE `user-id` = '$postingUserId'";
    $result2 = $conn->query($sql2);
    echo "<div class='post'>";
    echo "<h2>" . $row["post-heading"] . "</h2>";

    while ($row2 = $result2->fetch_assoc()) {
      echo "<h5> Posted by: " . $row2["username"] . "</h5>";
    }
    echo "<br>";
    echo "<p>" . $row["post"] . "</p>";
    echo "------";
    }
    #close connection
    $conn->close();
   ?>
</div>

<!-- Footer -->
<div class="footer">
  <h5>cc PHP4theWin ltd</h5>
</div>
</body>
</html>
