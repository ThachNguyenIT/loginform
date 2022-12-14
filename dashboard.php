<?php 
    session_start();       // Start the session
    include "index.php" 
?>
<?php
    if (!isset($_SESSION['id'])) {         // condition Check: if session is not set. 
        header('location: login.php');   // if not set the user is sendback to login page.
    }
?>
<?php
if (isset($_POST['signout'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}
?>
<div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">Welcome, This your dashboard!! </h1>
  <hr>
  <h4> <?php echo $_SESSION['fullname']; ?> </h4>
 
  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Fullname</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> <?php echo $_SESSION['id']; ?></td>
        <td> <?php echo $_SESSION['username']; ?></td>
        <td> <?php echo $_SESSION['fullname']; ?></td>
      </tr>
    </tbody>
  </table>
 
  <form action="" method="post">
    <button type="submit" name='signout' class=" btn btn-warning mb-3"> Sign Out</button>
  </form>
</div>