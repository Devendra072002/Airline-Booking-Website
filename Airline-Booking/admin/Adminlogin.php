<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="./Adminlogin.css" />


  <!-- fontawesome link -->

  <!-- end fontawesome link -->

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>

  <div class="container">
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3 style="font-size:x-large;">Airline <br> Booking Site</h3>
        </div>
      </div>
    </div>
    <div class="forms-container">
      <div class="signin-signup">
        <form action="Adminlogin.php" class="sign-in-form" method="POST">
          <h2 class="title">Welcome Admin</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="user id" name="userid" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <input type="submit" value="Login" class="btn solid" name="login" />
          <?php
          if (isset($_POST["login"])) {
            $login_id = $_POST["userid"];
            $password = $_POST["password"];
            if ($login_id == "Admin" && $password == "Admin54") {
              session_start();
              $_SESSION["userid"] = $login_id;
              header("location:Adminhome.php");
            } else {
              echo "<span style='color:red;font-size:small;'>Invalid AdminId and password</span>";
            }
          }
          ?>
        </form>

      </div>
    </div>


  </div>
</body>

</html>