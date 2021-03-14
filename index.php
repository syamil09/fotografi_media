<?php 
    include('layout/header.php');
    include('classes/function.php');
    $db = new database();

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : false;

    // $data = 
?>

    <!-- navbar -->
    <nav id="sidebar" class="bg-primary">
        <!-- <div class="img-profile mt-3" style="background-image:url('asset/images/Chris Steele-Perkins.jpg')">
            
        </div> -->
        <div class="menu">
            <?php if(isset($_SESSION['login']) == true ) { ?>
                <p class="salam">Halo, <?= $_SESSION['role']; ?></p>
                <a href="proses/logout.php">Logout</a>
            <?php }else{ ?>
                <a href="index.php?page=login" <?php if($page == 'login'){echo 'class="active"';}?>>Login</a>
            <?php } ?>

            <?php if($role == "admin" || $role == "kurator" || $role == "fotografer") { ?>
            <a href="index.php?page=myprofile" <?php if($page == 'myprofile'){echo 'class="active"';}?>>My Profile</a>
            <?php } if($role == "fotografer") { ?>
            <a href="index.php?page=upload" <?php if($page == 'upload'){echo 'class="active"';}?>>Upload Foto</a>
            <a href="index.php?page=mygalery" <?php if($page == 'mygalery'){echo 'class="active"';}?>>My Gallery</a>
            <?php } if($role == "admin") { ?>
            <a href="index.php?page=register" <?php if($page == 'register'){echo 'class="active"';}?>>Register</a>
            <a href="index.php?page=user_data" <?php if($page == 'user_data'){echo 'class="active"';}?>>User</a>
            <?php } ?>
            
            
            <a href="index.php?page=galery" <?php if($page == 'galery'){echo 'class="active"';}?>>Public Gallery</a>
        </div>
        
    </nav>
    <!-- end navbar -->

    <!-- navbar mobile -->
    <nav id="nav-mobile" class="navbar navbar-expand-lg fixed-top bg-primary" style="z-index: 999">
        <a href="" class="navbar-brand bg-white salam">Halo, <?= $_SESSION['role']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#targetlist">
            <span class="navbar-toggler-icon text-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="targetlist">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php if(isset($_SESSION['login']) == true ) { ?>
                <p class="salam">Halo, <?= $_SESSION['role']; ?></p>
                <a href="proses/logout.php">Logout</a>
            <?php }else{ ?>
                <a href="index.php?page=login" <?php if($page == 'login'){echo 'class="active"';}?>>Login</a>
            <?php } ?>

            <?php if($role == "admin" || $role == "kurator" || $role == "fotografer") { ?>
            <a href="index.php?page=myprofile" <?php if($page == 'myprofile'){echo 'class="active"';}?>>My Profile</a>
            <?php } if($role == "fotografer") { ?>
            <a href="index.php?page=upload" <?php if($page == 'upload'){echo 'class="active"';}?>>Upload Foto</a>
            <a href="index.php?page=mygalery" <?php if($page == 'mygalery'){echo 'class="active"';}?>>My Gallery</a>
            <?php } if($role == "admin") { ?>
            <a href="index.php?page=register" <?php if($page == 'register'){echo 'class="active"';}?>>Register</a>
            <a href="index.php?page=user_data" <?php if($page == 'user_data'){echo 'class="active"';}?>>User</a>
            <?php } ?>
            
            
            <a href="index.php?page=galery" <?php if($page == 'galery'){echo 'class="active"';}?>>Public Gallery</a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- end navbar mobile -->


    <!-- container -->
    <div class="container">
        
        <div class="content col-md-12 ">
            <?php 
                // cek mygalery
                if($page == "mygalery"){
                    $page = "galery";
                }
                $filename = "$page.php";
                if(file_exists($filename)) {
                    include ($filename);
                }
                else{
                    include("galery.php");
                }
            ?>
        </div>

    </div>
    <!-- end container -->

<?php 
    include('layout/footer.php');
?>
