<?php
    session_start();
    require_once "progress/dbConnect.php";
    ob_start(); 
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        try
        {
          $sql = "SELECT * FROM users WHERE username like '".$username."' and password like '".$password."' LIMIT 1";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              echo '<h1 class="admin">'."hello ".$row['username'].'</h1>';
          }
          else
          {
              echo '<h2 class="error">'."Nhập sai rồi!!".'</h2>';
          }
        }
        catch(PDOException $e)
        {
            echo '<h2 class="error">'."Nhập sai rồi!!".'</h2>';
        }
    }//a' union select null,password,null from users where username like 'admin'#
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link rel="stylesheet" href="css\style.css"/>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <div class="title">UNION_BASE</div>
      <form class="login-form" action="#" method="post">
        <input type="text" placeholder="User Name" name="username"/>
        <input type="password" placeholder="Password" name="password"/>
        <div class="inputfield">
          <input type="submit" value="login" name="login" class="btn">
        </div>
      </form>
    </div>
  </div>
</body>
</html>