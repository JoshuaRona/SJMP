<?php
session_start();
$conn = mysqli_connect('localhost','root','','links') or die ('Unable to connect');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="./styless.css">

</head>
<body>
<form method = "POST" action = "login.php">
  <div class="form_input">
    <input type="text" name= "user" placeholder="Enter Username..." />
  </div>
  
  <div class="form_input">
    <input type="password" name="password" placeholder="Enter Password...">
  </div>
  
  <div class="form_input">
    <button class="btn" name = "button" type="submit">Log in</button>
  </div>
</form>
  <?php
  if(isset($_POST['button']))
  {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $select = mysqli_query($conn,"SELECT * from login WHERE user = '$user' AND password = '$password' ");
    $row = mysqli_fetch_array($select);

    if(is_array($row))
    {
      $_SESSION["user"] = $row['user'];
      $_SESSION["pass"] = $row['pass'];
    }
    else
    {
      echo '<script>';
      echo 'alert("Invalid Username or Password!")';
      echo 'window.location.href = "login.php" ';
      echo '</script>';
    }

  }
  if(isset($_SESSION["user"]))
  {
    header("Location:index.php");
  }
  ?>
</body>
</html>