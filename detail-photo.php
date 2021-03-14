<?php 
    $id_photo = isset($_GET['id']) ? $_GET['id'] : false;
    $data = $db->fetch("foto,user","foto.id_user = user.id ")[0];
    $photo = $db->fetch("foto","id = $id_photo")[0];
    // var_dump($data);
?>
<title>Detail - photo</title>
<div class="row">
    <div class="col-md-10 offset-1 form">

        <div class="row">
            <div class="col-md-5">
                <img src="asset/images/upload/<?= $photo['img']; ?>" alt="Your Photo" width="400px">
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="title"><?= $photo['judul']; ?></div>
                <div class="caption">
                    <?= $photo['caption']; ?>
                </div>
                <h5 class="mt-3">Uploader : </h5>
                <?= $data['email']; ?>
                <!-- <div class="rate mt-3">
                    <h5>Rating</h5>
                    <div class='starrr' id='star1'></div>
                    <br />
                    <input type='text' name='rating' id='star2_input' readonly id="input-rate" style="border:none"/>
                </div>
                    <a href="" class="btn btn-primary btn-sm mt-2 ">Submit rate</a> -->
                </div>
            </div>
        </div>
        
    </div>
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
            $s2input.val(value).trigger('input');
            } else {
            $('.your-choice-was').hide();
            $s2input.val(value).trigger('input');
            }
            
        }
        });

        var $s2input = $('#star2_input');
        $('#star2').starrr({
        max: 5,
        rating: $s2input.val(),
        change: function (e, value) {
            $s2input.val(value).trigger('input');
        }
        });
  
</script>