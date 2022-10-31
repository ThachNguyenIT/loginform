<?php
    session_start();
?>
<?php
    include "index.php";
?>

<?php
    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username' 
                                        AND password = '$password' ";

        $user = mysqli_query($conn, $query);

        if (!$user){
            die('query failed');
        }
    
        while ($row = mysqli_fetch_array($user)) {
    
            $user_id = $row['id'];
            $user_name = $row['username'];
            $full_name = $row['fullname'];
            $user_password = $row['password'];
        }
        
        if ($user_name == $username  &&  $user_password == $password) {
     
        $_SESSION['id'] = $user_id;       // Storing the value in session
        $_SESSION['username'] = $user_name;   // Storing the value in session
        $_SESSION['fullname'] = $full_name; // Storing the value in session
        //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
        header('location: dashboard.php?user_id=' . $user_id);
      } else {
        header('location: login.php');
        }
    }
?>

<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">Sign In</h1>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter your username" autocomplete="off" required>

    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter your password" required>

    </div>
    <div class="mb-3">
      <input type="submit" name="signin" value="Sign In" class="btn btn-primary">
    </div>
  </form>
</div>  