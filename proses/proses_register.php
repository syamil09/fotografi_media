<?php 
    include('../classes/function.php');
    $db = new database();
    $email = $_POST['email'];
    $cek = mysqli_query($db->conn,"SELECT * FROM user WHERE email='$email' ");
    if(mysqli_num_rows($cek) > 0){
        header("location:../index.php?page=register&notif=email");
    }else if($_POST['password'] != $_POST['repassword']) {
        header("location:../index.php?page=register&notif=pass");
    }

    $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $data = [
        'username' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $pass,
        'role' => $_POST['role']
    ];
    $db->insert("user",$data);
    echo "<script>alert('berhasil mendaftarkan user');document.location.href='../index.php';</script>";
?>