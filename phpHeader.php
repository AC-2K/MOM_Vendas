<?php 
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: ".gmdate("D, d M Y H:i:s",time()+(-1*60))." GMT");
    session_start();
        if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"] == ''){
            // echo '<script type="text/javascript">';
            // echo 'alert("Sessao nao iniciada");';
            // echo 'window.location.href = "index.html";';
            // echo '</script>';
        }   
    ?>