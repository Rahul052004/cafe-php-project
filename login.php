<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'partials/_dbconnect.php';
  $email = $_POST["email"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($conn,$sql);
  $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
  if($user)
  {
    if(password_verify($password,$user["password"])){
      session_start();
      $_SESSION["user"]="yes";
      $_SESSION['email']=$email;
      header("location: index.php");
      die();
    }
    else{
      echo "<script>alert('Password is incorrect!');</script>";
    }
  }
  else{
    echo "<script>alert('Invalid Email! Please give correct email.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
      <h2>Login</h2>
      <form action="/food/login.php" method="post">
        <div class="form-group">
          <input type="email" placeholder="Enter Email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Enter Password" name="password" class="form-control">
        </div>
        <div class="form-btn">
          <button type="submit">Login</button>
        </div>
      </form>
      <div class="options">
            <a href="forgot.php">Forgot Password?</a>
            <a href="signup.php">Sign Up</a>
      </div>
    </div>
</body>
</html>
