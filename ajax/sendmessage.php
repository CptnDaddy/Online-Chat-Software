<?php 
session_start();
if (isset($_POST['chattext'])) {
    echo "lol\n" . $_POST['chattext'];
}





?>