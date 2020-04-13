<?php
    require_once 'load.php';

    $authenticated = false;

    echo json_encode($authenticated);

    session_destroy();