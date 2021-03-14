<?php 
    if(isset($_GET['page']) == ""){
        header("location:index.php?page=upload");
    }
    if(isset($_SESSION['login']) == false){
        header("location:index.php");
    }
?>
<title>Upload</title>
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
<div class="col-md-6 offset-md-2">
    <h1 class="text-center">UPLOAD PHOTO</h1>
    <form action="proses/upload.php" method="post" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <!-- <label for="email" >Photo</label>
            <input type="file" name="foto" id="email" class="form-control"> -->
            <div class="box">
                    <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                    <label class="btn bg-primary text-white" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
            </div>

        </div>
        <div class="form-group">
            <label for="email" >Title</label>
            <input type="text" name="judul" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="cap">Caption</label>
            <textarea name="caption" id="cap" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Upload Photo</button>
    </form>
</div>
<script src="js/custom-file-input.js"></script>

<?php 
if (condition) {
    echo "button";
}
else{

 ?>}
