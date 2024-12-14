<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
?>
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    $existSql = "SELECT * FROM `user` WHERE email = '$email'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows>0){
      echo "<script>alert('Email already exists! Please try using another email.');</script>";
    }
    else{

        if(($password == $repeat_password)){
              $passwordHash = password_hash($password, PASSWORD_DEFAULT);
              $sql = "INSERT INTO user (full_name, email, password) VALUES(?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
              if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<script>alert('Signup successful! You can now log in.'); window.location.href = 'login.php';</script>";
              } 
              else {
                die("Something went wrong");
              }
        }
        else{
          echo "<script>alert('Passwword do not match !');</script>";
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>

  <div class="container">
      <h1 class="text-center">Signup to our website</h1>

        <form action="/food/signup.php" method="post">
        <div class="form-group">
          <input type="text" name="fullname" placeholder="Full Name" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <input type="password" name="repeat_password" placeholder="Confirm Password" required>
        </div>
            
        <button type="submit" class="btn btn-primary">Signup</button>
      </form>
        <a href="login.php">Already have an account? Login</a>
  </div>
  
</body>
</html>

