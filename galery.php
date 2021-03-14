 <?php 
    $row = $db->fetch("foto");

    // pagination
    // $jumlahPerHalaman = 3;
    // $jumlahData = count($row);
    // $jumlahHalaman = ceil($jumlahData / $jumahPerHalaman);
    // $halamanAktif = (isset($_GET['pagenum'])) ? $_GET['pagenum'] : 1;
    // $awalData = ($jumahPerHalaman * $halamanAktif) - $jumahPerHalaman;


    // echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    // $q = mysqli_query($db->conn,"SELECT * FROM foto LIMIT $awalData,$jumlahPerHalaman ");
    $q = mysqli_query($db->conn,"SELECT * FROM foto");
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;

    if(isset($_GET['page'])) {
        // validasi masuk ke mygalery
        if($_GET['page'] == "mygalery") {
            // jika belum login maka harus login
            if(isset($_SESSION['login']) == ""){
                header("location:index.php?page=login");
            }else {
                $row = $db->fetch("foto","id_user = $id_user");
                $q = mysqli_query($db->conn,"SELECT * FROM foto WHERE id_user = $id_user");
            }
        }
        // masuk ke galery publik
        else{
            $q = mysqli_query($db->conn,"SELECT * FROM foto");
        }
    }
    
    $baris = mysqli_num_rows($q);
    $c=1;
    // echo date("d - "." M - "."Y")."<br>";
    // echo "Jumlah foto = ".$baris."<br>";
    // echo "Jumlah baris = ".ceil($baris/3)."<br>";

    // var_dump($row);
    // echo password_hash("admin", PASSWORD_DEFAULT);
    $n = 0;

 
?>
<title>Gallery</title>
<h1 class="text-center mr-3">Galery</h1>
<!-- navigasi -->
    <!-- <?php for($i = 1;$i <= $jumlahHalaman;$i++) : ?>
    <a href="?page=galery&pagenum=<?= $i; ?>"><?= $i ?></a>
    <?php endfor; ?> -->
<div class="row">
    
    <?php for($j=0;$j<3;$j++) : ?>
    <div class="col-md-4 col-sm-6">
    <?php for($i=$n;$i<$baris;$i++) : $n++; ?>
    
        <div class="card photo">
            <img src="asset/images/upload/<?= $row[$i]['img'];?>" alt="Foto" class="card-img-top">
            <div class="card-body">
                <div class="card-title"><?= $row[$i]['judul']; ?></div>
                <!-- <p><?= $row[$i]['id']; ?></p> -->
                <!-- <p><?= $row[$i]['caption']; ?></p> -->

                <?php if(isset($_SESSION['login'])) : ?>
                    <?php if($row[$i]['id_user'] == $_SESSION['id_user'] || $_SESSION['role'] == "admin") : ?>
                    <a href="index.php?page=edit-photo&id=<?= $row[$i]['id'];?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="proses/delete-photo.php?id=<?= $row[$i]['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin menghapus foto ini?');">Delete</a>
                    <?php endif; ?>
                    <a href="index.php?page=detail-photo&id=<?= $row[$i]['id'];?>" class="btn btn-primary btn-sm float-right">More Info</a>
                <?php endif; ?>
            </div>
        </div>
    
    <?php if($n % ceil($baris/3) == 0 ){break;} endfor; ?>
    </div>
<?php endfor; ?>
    
</div>



<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery-3.4.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/rate/dist/starrr.js"></script>
<script>
    
        $('#star1').starrr({
        change: function (e, value) {
            if (value) {
            $('.your-choice-was').show();
            $('.choice').text(value);
            } else {
            $('.your-choice-was').hide();
            }

            var $s2input = $('#star2_input');
        $('#star2').starrr({
        max: 10,
        rating: $s2input.val(),
        change: function (e, value) {
            $s2input.val(value).trigger('input');
        }
        });
        }
        });

        
  
</script>











<!-- <?php 
    $row = $db->fetch("foto");
    // echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    if(isset($_GET['page'])) {
        if($_GET['page'] == "mygalery") {
            $row = $db->fetch("foto","id_user = $id_user");
        }
    }
    $q = mysqli_query($db->conn,"SELECT * FROM foto");
    $baris = mysqli_num_rows($q);
    $c=1;
    echo "Jumlah foto = ".$baris."<br>";
    echo "Jumlah baris = ".ceil($baris/3)."<br>";
    for($i=1;$i<=3;$i++)
    {
        for($j=1;$j<=ceil($baris/3);$j++)
        {
            echo $c++."<br>";
        }
        echo "<br>";
    }
    
?>
<h1 class="text-center mr-3">Galery</h1>
<div class="row">
    
    <?php foreach($row as $data) : ?>
    <div class="col-md-4 photo">
        <div class="card">
            <img src="asset/images/upload/<?= $data['img'];?>" alt="Foto" class="card-img-top">
            <div class="card-body">
                <div class="card-title"><?= $data['judul']; ?></div>
                <p><?= $data['id_user']; ?></p>
                <p><?= $data['caption']; ?></p>

                <?php if(isset($_SESSION['login'])) : ?>
                    <?php if($data['id_user'] == $_SESSION['id_user'] || $_SESSION['role'] == "admin") : ?>
                    <a href="index.php?page=edit-photo&id=<?= $data['id'];?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="proses/delete-photo.php?id=<?= $data['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin menghapus foto ini?');">Delete</a>
                    <?php endif; ?>
                    <a href="index.php?page=detail-photo&id=<?= $data['id'];?>" class="btn btn-primary btn-sm float-right">More Info</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>



<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery-3.4.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/rate/dist/starrr.js"></script>
<script>
    
        $('#star1').starrr({
        change: function (e, value) {
            if (value) {
            $('.your-choice-was').show();
            $('.choice').text(value);
            } else {
            $('.your-choice-was').hide();
            }

            var $s2input = $('#star2_input');
        $('#star2').starrr({
        max: 10,
        rating: $s2input.val(),
        change: function (e, value) {
            $s2input.val(value).trigger('input');
        }
        });
        }
        });

        
  
</script> -->