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
  <a class="link" href="feed.php">Home</a>
  <a class="active" href="posts.php">My Posts</a>
  <a class="link" href="login.php">Logout</a>

</div>

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
  ?>
  <h2>New Post</h2>
  <form action='newPost.php' method='post'>
    <label for='heading'>New Post Heading</label>
    <br><textarea name='heading'></textarea>
    <br>
    <label for='post'>New Post</label>
    <br><textarea name='posting'></textarea>
    <textarea style='display:none;' readonly name='userID'><?php  echo "$userId";  ?></textarea>
    <input id='submit' value='Post' type='submit'>
  </form>
  <h2>My Posts</h2>
  <br>
  <?php
  $sql = "SELECT * FROM `blog-posts` WHERE `user-id` = '$userId'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $postid = $row["post-id"];
    echo "<form action='modPost.php' method='post'>";
    echo "<label for='heading'>Post Heading</label>";
    echo "<br><textarea name='heading'>" . $row["post-heading"] . "</textarea>";
    echo "<br>";
    echo "<label for='post'>Post</label>";
    echo "<br><textarea name='posting'>" . $row["post"] . "</textarea>";
    echo "<textarea style='display:none;' readonly name='postID'>" . $postid . "</textarea>";
    echo "<input id='submit' value='Edit' type='submit'>";
    echo "</form>";



    echo "<form action='delPost.php' method='post'>";
    echo "<textarea style='display:none;' readonly name='postID'>" . $postid . "</textarea>";
    echo "<input id='submit' value='Delete' type='submit'>";
    echo "</form>";


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
