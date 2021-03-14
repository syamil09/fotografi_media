<?php 
    include('../classes/function.php');
    $db = new database();
    $gambar = $db->upload();
    if( !$gambar ) {
        return false;
    }
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;

    $data = [
        'id_user' => $id_user,
        'judul' => $_POST['judul'],
        'caption' => $_POST['caption'],
        'img' => $gambar
    ];
    $db->insert("foto",$data);
    echo "<script>alert('berhasil mengupload');document.location.href='../index.php';</script>";
?>