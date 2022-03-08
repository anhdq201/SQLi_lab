<?php
    session_start();
    require_once "progress/dbConnect.php";
    ob_start(); 
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        try
        {
          if(stripos($username, "union") !== false){
            die("No union!!");
          }
          $sql = "SELECT * FROM users WHERE username like '".$username."' LIMIT 1";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
 
              if($password == $row['password'])
              {
                  echo '<h1 class="admin">'."hello ".$row['username'].'</h1>';
              }
          }
        }
        catch(PDOException $e)
        {
            //echo '<h2 class="error">'."username or password wrong!!".'</h2>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link rel="stylesheet" href="css\style.css"/>
</head>
<body style="background-color: pink;">
  <div class="login-page">
    <div class="form">
      <div class="title" style="color: pink;">TIME_BASE</div>
      <form class="login-form" action="#" method="post">
        <input type="text" placeholder="User Name" name="username"/>
        <input type="password" placeholder="Password" name="password"/>
        <div class="inputfield">
          <input type="submit" value="login" name="login" class="btn" style="background-color: pink;">
        </div>
      </form>
    </div>
  </div>
</body>
</html>