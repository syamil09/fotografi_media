<?php 
    session_start();
    // untuk include semua class sekaligus
    spl_autoload_register(function($class) {
        include('clases/'.$class.'.php');
    });
?>