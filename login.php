<!-- email : admin@gmail.com -->
<!-- pasword : admin -->

<?php 
    $notif = isset($_GET['notif']) ? $_GET : false;
    if(isset($_GET['page']) == ""){
        header("location:index.php?page=login");
    }
?>
<title>Login</title>
<div class="col-md-6 offset-md-2">
    <h1 class="text-center">LOGIN</h1>
    <?php if($notif == true) : ?>
    <div class="alert alert-danger">
        Email / password salah
    </div>
    <?php endif; ?>
    <form action="proses/proses_login.php" method="post" class="form">
        <div class="form-group">
            <label for="email" >Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="password" id="pass" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
