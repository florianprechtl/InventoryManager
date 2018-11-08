<?php
include('../common/basicFunctions.php');

    session_reset();
    session_destroy();
    redirect('../login/login.php');
?>