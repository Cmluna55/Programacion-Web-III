<?php
    function conectarDB(){
        $db=mysqli_connect('localhost','root','','proyecto');
        return $db;
    }
?>