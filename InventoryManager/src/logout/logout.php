<?php
include('../common/basicFunctions.php');

    session_destroy();
    redirect('../login/login.php');
?>