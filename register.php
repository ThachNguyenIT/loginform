<?php
    include "index.php";
?>

<?php
    if (isset($_POST['signup'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (username, fullname, password) VALUES ('$username', '$fullname', '$password')";
        $addUser = mysqli_query($conn, $query);

        if (!$addUser){
            echo "failed". mysqli_error($conn);
        }else{
            header('location: login.php');
            
        }
    }
?>

<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
    <h1 class="text-center">Sign Up</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Fullname</label>
            <input type="text" name="fullname" class="form-control" placeholder="Enter fullname" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            <small class="text-muted">Your email is safe with us.</small>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            <small class="text-muted">Do not share your password.</small>
        </div>

        <div class="mb-3">
            <input type="submit" name="signup" value="Sign Up" class="btn btn-primary">
        </div>
    </form>
</div>