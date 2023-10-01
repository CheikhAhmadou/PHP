<?php
    session_start();
    session_destroy();
    
    header('Location:login2-MD.php');
    
?>