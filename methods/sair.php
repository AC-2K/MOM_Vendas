<?php
    session_start();    
    session_unset();
    session_destroy();

    $userInfo = array('1');
    echo json_encode($userInfo);

