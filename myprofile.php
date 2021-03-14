<?php

    if(isset($_GET['page']) == ""){
        header("location:index.php?page=myprofile");
    }
    $notif = isset($_GET['notif']) ? $_GET : false;
    $data = $db->fetch("user","id = $id_user")[0];
    if(isset($_POST['save'])) {
        $nama = @$_POST['name'];
        $email = @$_POST['email'];
        $data = [
            'username' => $nama,
            'email' => $email
        ];
        $db->update("user",$data,"id = $id_user");
        echo "<script>alert('berhasil mengubah profile');document.location.href='index.php?page=myprofile';</script>";
    }

?>
<title>My profile</title>
<div class="col-md-6 offset-md-2">
<?php if($notif == "email") { ?>
    <div class="alert alert-danger">
        Email sudah terdaftar
    </div>
    <?php }else if ($notif == "pass") { ?>
    <div class="alert alert-danger">
    Password tidak sama
    </div>
    <?php } ?>
    <form action="" method="post" class="form">
        <div class="form-group">
            <label for="email" >Name</label>
            <input type="text" name="name" id="email" class="form-control" value="<?= $data['username'];?>">
        </div>
        <div class="form-group">
            <label for="email" >Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $data['email'];?>">
        </div>
        <button type="submit" name="save" class="btn btn-primary">Save Profile</button>
    </form>
</div>