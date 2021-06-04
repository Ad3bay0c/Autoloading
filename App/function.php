<?php

new \App\Library\Controller();
function sanitize($value) {
    $db = \App\Config\Database::connect();

    return mysqli_real_escape_string($db, $value);
}