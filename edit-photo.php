<?php
    if(!$_SESSION['login']) {
        header("location:index.php");
    }
    $id_photo = isset($_GET['id']) ? $_GET['id'] : false;
    $data = $db->fetch("foto","id = $id_photo")[0];
    if(isset($_POST['save'])) {
        $judul = @$_POST['judul'];
        $caption = @$_POST['caption'];
        $data2 = [
            'judul' => $judul,
            'caption' => $caption
        ];
        $db->update("foto",$data2,"id = $id_photo");
        echo "<script>alert('berhasil mengubah profile');document.location.href='index.php?page=galery';</script>";
    }
    
?>
<title>Edit - photo</title>
<div class="col-md-8 offset-md-2">
    <h1 class="text-center">Edit Photo</h1>

    <form action="" method="post" class="form">
        <div class="row">
            <div class="col-md-5">
                <img src="asset/images/upload/<?= $data['img']; ?>" alt="Your Photo" width="200px">
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="email" >Title</label>
                    <input type="text" name="judul" id="email" class="form-control" value="<?= $data['judul'];?>">
                </div>
                <div class="form-group">
                    <label for="pass">Caption</label>
                    <textarea name="caption" id="" cols="30" rows="5" class="form-control" ><?= $data['caption'];?></textarea>
                </div>
                <a href="index.php?page=galery" class="btn btn-secondary">Cancel</a>
                <button type="submit" name="save" class="btn btn-primary">Save Change</button>
            </div>
        </div>
        
    </form>
</div>