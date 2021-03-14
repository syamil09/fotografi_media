<?php 
    include('../classes/function.php');
    $db = new database();

    $id_photo = isset($_GET['id']) ? $_GET['id'] :  false;
    $db->delete("foto","id = $id_photo");
    echo "<script>alert('berhasil menghapus foto');document.location.href='../index.php';</script>";
?>