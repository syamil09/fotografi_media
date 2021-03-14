<?php
    // header("location:index.php?page=register");
    if(isset($_GET['page']) == ""){
        header("location:index.php?page=register");
    }
    $notif = isset($_GET['notif']) ? $_GET : false;

?>
<title>Register</title>
<div class="col-md-6 offset-md-2">
<h1 class="text-center">REGISTER</h1>
<?php if($notif == "email") { ?>
    <div class="alert alert-danger">
        Email sudah terdaftar
    </div>
    <?php }else if ($notif == "pass") { ?>
    <div class="alert alert-danger">
    Password tidak sama
    </div>
    <?php } ?>
    <form action="proses/proses_register.php" method="post" class="form">
        <div class="form-group">
            <label for="email" >Name</label>
            <input type="text" name="name" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" >Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="password" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <label for="pass">Re Type Password</label>
            <input type="password" name="repassword" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <label for="pass">Role</label>
            <select name="role" id="" class="form-control">
                <option value="">- SELECT -</option>
                <option value="admin">Admin</option>
                <option value="kurator">Kurator</option>
                <option value="fotografer">Fotografer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>