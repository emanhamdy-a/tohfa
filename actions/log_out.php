<?php
    session_start();
    unset($_SESSION['logn']);
    header("location:../index.php");
 ?>