<?php

/*
 * To use, require this file and access the returned array to get the database connection settings.
 * For example:
 * $config = require 'settings.php';
 * $db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);
 */
return [
    // XAMPP runs the server locally, $user and $pwd are the default credentials for XAMPP's MySQL
    'host' => "localhost",
    'user' => "root",
    'pwd' => "",
    'sql_db' => "world_wide_travel_db"
];
